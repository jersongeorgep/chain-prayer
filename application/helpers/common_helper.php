<?php 
//=========================
function isLogedUser(){
	$CI =& get_instance();
	if($CI->session->userdata('loggedin')== FALSE){
		redirect('login/login/logout');
	}
}

//========== get single Data ============
function getsingledata($model, $feild, $id){
	$CI =& get_instance();
	$data = $CI ->$model->get($id);
	if($data){
		$rslt = $data->$feild;
	}else{
		$rslt = "";
	}
	return($rslt);
}

//============getmanyby data =========
function getManybydata($model, $array, $id=NULL){
	$CI =& get_instance();
	if($id){
		$data = $CI->$model->order_by($id, 'DESC')->get_many_by($array);
	}else{
		$data = $CI->$model->get_many_by($array);
	}
	return $data;
}

//========== log report ============
function logoreport($title,$txtReport){
	$CI =& get_instance();
	$data['activity_title'] = $title; 
	$data['log_report'] = $txtReport ;
	$data['status'] = 1;
	$CI->Logreport_m->insert($data);
	return true;
}

//================== Get E_num Values ==========
function enum_select( $table , $field ){
	$CI =& get_instance();
    $type = $CI->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row(0)->Type;
    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
    $enum = explode("','", $matches[1]);
    return $enum;
}
//============= AutoNumber Prescriptions ==============
function auto_number($table, $numFeild, $prefix = null, $start = null){
	$CI =& get_instance();
	$separator = "_";
	$number = 0;
	$data = $CI->db->order_by('id', 'desc')->get($table)->row();
	if($data){
		$tempNum = explode("_", $data->$numFeild);
		$increment = $tempNum[1] + 1;
		$number = $tempNum[0].$separator.$increment;
	}else {
		$number = $prefix.$separator.$start;
	}
	return $number;
}

function updateOderStatus($orderId){
	$CI =& get_instance();
	$data['status'] = 2;
	$CI->db->where('id', $orderId);
	$CI->db->update('prescription_orders',$data);
	return true;
}

//======================== Number to word ===================
/*
function convertNumber($number)

 {
    list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer{0} == "-")
    {
        $output = "negative ";
        $integer    = ltrim($integer, "-");
    }
    else if ($integer{0} == "+")
    {
        $output = "positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer{0} == "0")
    {
        $output .= "zero";
    }
    else
    {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g)
        {
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
        }

        for ($z = 0; $z < count($groups2); $z++)
        {
            if ($groups2[$z] != "")
            {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11]{0} == '0'
                            ? " and "
                            : ", "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0)
    {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++)
        {
            $output .= " " . convertDigit($fraction{$i});
        }
    }

    return $output;
} */

function convertGroup($index)
{
    switch ($index)
    {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " trillion";
        case 3:
            return " billion";
        case 2:
            return " million";
        case 1:
            return " thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
    {
        return "";
    }

    if ($digit1 != "0")
    {
        $buffer .= convertDigit($digit1) . " hundred";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " and ";
        }
    }

    if ($digit2 != "0")
    {
        $buffer .= convertTwoDigit($digit2, $digit3);
    }
    else if ($digit3 != "0")
    {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0")
    {
        switch ($digit1)
        {
            case "1":
                return "ten";
            case "2":
                return "twenty";
            case "3":
                return "thirty";
            case "4":
                return "forty";
            case "5":
                return "fifty";
            case "6":
                return "sixty";
            case "7":
                return "seventy";
            case "8":
                return "eighty";
            case "9":
                return "ninety";
        }
    } else if ($digit1 == "1")
    {
        switch ($digit2)
        {
            case "1":
                return "eleven";
            case "2":
                return "twelve";
            case "3":
                return "thirteen";
            case "4":
                return "fourteen";
            case "5":
                return "fifteen";
            case "6":
                return "sixteen";
            case "7":
                return "seventeen";
            case "8":
                return "eighteen";
            case "9":
                return "nineteen";
        }
    } else
    {
        $temp = convertDigit($digit2);
        switch ($digit1)
        {
            case "2":
                return "twenty-$temp";
            case "3":
                return "thirty-$temp";
            case "4":
                return "forty-$temp";
            case "5":
                return "fifty-$temp";
            case "6":
                return "sixty-$temp";
            case "7":
                return "seventy-$temp";
            case "8":
                return "eighty-$temp";
            case "9":
                return "ninety-$temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}
//===========================================================
function get_opening_balance($date, $clinicId){
	$CI =& get_instance();
	$clinic = $CI->db->select('opening_balance')->from('clinics')->where('id', $clinicId)->get()->row();
    $invoiceData = $CI->db->select('SUM(a.total_amount) as total_invoice')->from('proforma_invoice as a')->join('prescription_orders as b', 'b.id=a.order_id', 'left')->where('b.clinic_id', $clinicId)->where('a.invoice_date <', $date)->get()->row();
    $receiptsData = $CI->db->select('SUM(receipt_amount) as total_receipts')->from('receipts')->where('clinic_id', $clinicId)->where('receipt_date <', $date)->get()->row();
    $balance = ((($invoiceData->total_invoice) + ($clinic->opening_balance))-$receiptsData->total_receipts);
	return $balance;
}

function code_generate($str){
    $str = str_replace( array( '\'', '"',',' ," ", ';', '<', '>' ), '', $str);
    $shuffle = str_shuffle($str);
    $a = substr($str, 0, 1);
    $b = substr($shuffle, 1, 1);
    $c = substr($shuffle, -2, 1);
    $d = substr($str, -1, 1);
    return strtoupper($a.$b.$c.$d);
}


function get_group_number($centerId, $timeId){
    $CI =& get_instance();
    // Get selected center data from setting table
    $settings   = $CI->db->select('*')->from('settings')->where('id', 1)->get()->row();
    $selected_centers = explode(",", $settings->group_center);

    // Default time data from prayer time table
    $default_time_data = $CI->db->select('*')->from('prayer_time')->where('id',$timeId)->get()->row();
    
    //get center details
    $center_fh = $CI->Centerfhs_m->get($centerId);

    //get time details
    $time_details  = $CI ->Times_m->get($timeId);

    //checking the center is selected group
    if(in_array($centerId, $selected_centers)){
        //get last group number data in member table
        $get_last_group_number_data = $CI->db->select('*')->from('members')->where('center_id',$centerId)->where('time_id',$timeId)->order_by('group_num', 'desc')->get()->row();
        //get maximum allowed member in the center separated timing.
        //if not get from default timing members from prayer timing page.
        $check_time_members = $CI->db->select('*')->from('centers_timing')->where('center_id', $centerId)->where('time_id',$timeId)->get()->row();
        if(!empty($check_time_members)){
            $max_allowed_person = $check_time_members->allowed_member;
            //checking group number is null or not
            if(!empty($get_last_group_number_data->group_num) && !empty($get_last_group_number_data->group_code)){
                // checking any vacant groups are available or not
                for($i=0; $i < $get_last_group_number_data->group_num; $i++){
                    $check_vacant = $CI->db->select('COUNT(group_num) as groupMembers')->from('members')->where('group_num', ($i + 1))->where('group_code', $get_last_group_number_data->group_code)->where('time_id', $timeId)->where('center_id', $centerId)->order_by("group_num", "desc")->group_by('group_num')->get()->row();
                    if ($check_vacant->groupMembers < $max_allowed_person){
                        $generated_group_no = $get_last_group_number_data->group_num;
                        $generated_group_code = $center_fh->center_code;
                        $generated_code = $generated_group_code . "-" . $generated_group_no;
                        return $generated_code; 
                        exit();
                    }
                }
                $generated_group_no = $get_last_group_number_data->group_num + 1;
                $generated_group_code = $center_fh->center_code;
                $generated_code = $generated_group_code . "-" . $generated_group_no;
                return $generated_code;
                exit();
            }else{
                $generated_group_no = 1;
                $generated_group_code = $center_fh->center_code;
                $generated_code = $generated_group_code . "-" . $generated_group_no;
                return $generated_code;
                exit();
            }
        }else{
            $max_allowed_person = $default_time_data->allowed_member;

            //checking group number is null or not
            if(!empty($get_last_group_number_data->group_num) && !empty($get_last_group_number_data->group_code)){
                // checking any vacant groups are available or not
                for($i=0; $i < $get_last_group_number_data->group_num; $i++){
                    $check_vacant = $CI->db->select('COUNT(group_num) as groupMembers')->from('members')->where('group_num', $i+1)->where('group_code', $get_last_group_number_data->group_code)->where('time_id', $timeId)->where('center_id', $centerId)->order_by("id", "asc")->group_by('group_num')->get()->row();
                    if($check_vacant->groupMembers < $max_allowed_person){
                        $generated_group_no = $get_last_group_number_data->group_num;
                        $generated_group_code = $center_fh->center_code;
                        $generated_code = $generated_group_code . "-" . $generated_group_no;
                        return $generated_code;
                        exit();
                    }
                }

                $generated_group_no = $get_last_group_number_data->group_num + 1;
                $generated_group_code = $center_fh->center_code;
                $generated_code = $generated_group_code . "-" . $generated_group_no;
                return $generated_code;
                exit();
                
            }else{
                $generated_group_no = 1;
                $generated_group_code = $center_fh->center_code;
                $generated_code = $generated_group_code . "-" . $generated_group_no;
                return $generated_code;
                exit();
            }
        }
    }else{
        //get last group number data in member table
        $get_last_group_number_data = $CI->db->select('*')->from('members')->where('time_id',$timeId)->where('group_code','OTH')->order_by('group_num', 'desc')->get()->row();

        $max_allowed_person = $default_time_data->allowed_member;
        
        //checking group number is null or not
        if(!empty($get_last_group_number_data->group_num) && !empty($get_last_group_number_data->group_code)){
            // checking any vacant groups are available or not
            for($i=0; $i < $get_last_group_number_data->group_num; $i++){
                $check_vacant = $CI->db->select('COUNT(group_num) as groupMembers')->from('members')->where('group_num', $i+1)->where('group_code', $get_last_group_number_data->group_code)->where('time_id', $timeId)->order_by("id", "asc")->group_by('group_num')->get()->row();
                if($check_vacant->groupMembers < $max_allowed_person){
                    $generated_group_no = $get_last_group_number_data->group_num;
                    $generated_group_code = 'OTH';
                    $generated_code = $generated_group_code . "-" . $generated_group_no;
                    return $generated_code;
                    exit();
                }
            }
            $generated_group_no = $get_last_group_number_data->group_num + 1;
            $generated_group_code = 'OTH';
            $generated_code = $generated_group_code . "-" . $generated_group_no;
            return $generated_code;
            exit();
        }else{
            $generated_group_no = 1;
            $generated_group_code = 'OTH';
            $generated_code = $generated_group_code . "-" . $generated_group_no;
            return $generated_code;
            exit();
        }
    }
}


function formate_time($timeVal){
    $timeValue = explode( "-", $timeVal);
    $timeValue1 = explode(" ", $timeValue[1]);
    
    $setValue = $timeValue[0].' - '.$timeValue1[0].' '.strtoupper($timeValue1[1]);  
    return $setValue;
}

function members_time_slot($group_id, $time_id, $lang_id){
    $CI =& get_instance();
    $lang = $CI->Languages_m->get($lang_id);
    if($lang){
        $select = 'm.'.$lang->lang_code.'_name as memberName';
    }

    $data = $CI->db->select('m.*,'.$select.',lf.localName, lf.code')->from('members as m')
        ->join('local_fhs as lf', 'lf.id = m.local_id', 'left')
       // ->where('m.center_id', $center_id)
        ->where('m.group_no', $group_id)
        ->where('m.time_id', $time_id)
        ->get()->result();
    return $data;
}

function get_name_on_lang($id){
    $CI =& get_instance();
    $member = $CI->Members->get($id);
    $lang = $CI->Languages_m->get($member->lang_id);
    if($lang){
        $select = $lang->lang_code.'_name';
    }
    return $member->$select;
}

function sendMail($to, $sub, $massage, $cc=NULL, $bcc = NULL){
    //sendgrid key
    //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
    $CI =& get_instance();
    require_once APPPATH."third_party/sendgrid/sendgrid-php.php";

    $email = new \SendGrid\Mail\Mail();

    $email->setFrom('chainprayertpm@gmail.com', 'Chain Payer');
    $email->setSubject($sub);
    $email->addTo($to);
    $email->addContent("text/html", $massage);
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        // print $response->statusCode() . "\n";
        // print_r($response->headers());
        // print $response->body() . "\n";
        return true;
    } catch (Exception $e) {
        // echo 'Caught exception: '. $e->getMessage() ."\n";
        return false;
    }
}

function update_time_division($center_id, $left_linit, $right_limit){
    $CI =& get_instance();
    $check_time_limit = $CI->db->select('*')->from('print_time_divisions')->where('center_id',$center_id)->get()->row();
    if(!empty($check_time_limit)){
        $id = $check_time_limit ->id;
        $data['center_id']    = $center_id;
        $data['left_limit']   = $left_linit;
        $data['right_limit']  = $right_limit;
        $CI->db->where('id', $id)->update('print_time_divisions', $data);
    }else{
        $data['center_id']    = $center_id;
        $data['left_limit']   = $left_linit;
        $data['right_limit']  = $right_limit;
        $CI->db->insert('print_time_divisions', $data);
    }
    return true;
}

function get_groups(){
    $CI =& get_instance();
    $groups = $CI->db->select('group_code, center_id')->from('members')->group_by('group_code')->get()->result();
    return $groups;
}

function get_groups_vacant($group_code, $center_id){
    $CI =& get_instance();
    $data = [];
    
    if($group_code == 'OTH'){
        $x = 0;
        $get_highest_group = $CI->db->select('group_num')->from('members')->where('group_code', $group_code)->order_by('group_num', 'desc')->get()->row();
        $time_details = $CI->db->select('*')->from('prayer_time')->get()->result();
        for($i =0; $i < $get_highest_group->group_num; $i++){
            $group_no = $group_code."-".($i+1);
            for($l=0; $l < count($time_details); $l++){
                $countMemberInTime = $CI->db->select('m.group_no, pt.prayer_time')->from('members as m')->join('prayer_time as pt', 'pt.id = m.time_id', 'left')->where('m.group_no', $group_no)->where('m.time_id', $time_details[$l]->id)->get()->result();
                if(count($countMemberInTime) < $time_details[$l]->allowed_member){
                   $data[$x]['group_no']        = (!empty($countMemberInTime[0]->group_no))? $countMemberInTime[0]->group_no : $group_no;
                   $data[$x]['time']            = (!empty($countMemberInTime[0]->prayer_time))? $countMemberInTime[0]->prayer_time : $time_details[$l]->prayer_time;
                   $data[$x]['max_members']     = $time_details[$l]->allowed_member;
                   $data[$x]['no_members']      = count($countMemberInTime);
                   $data[$x]['no_vacant']       = (($time_details[$l]->allowed_member) - (count($countMemberInTime)));
                   $x++;
                }
            }
        }
    }else{
        $k = 0;
        $get_highest_group = $CI->db->select('group_num')->from('members')->where('group_code', $group_code)->where('center_id', $center_id)->order_by('group_num', 'desc')->get()->row();
        $time_details = $CI->db->select('ct.*, pt.prayer_time')->from('centers_timing as ct')->join('prayer_time as pt', 'pt.id = ct.time_id', 'left')->where('ct.center_id', $center_id)->get()->result();
        for($i =0; $i < $get_highest_group->group_num; $i++){
            $group_no = $group_code."-".($i+1);
            for($j=0; $j < count($time_details); $j++){
                $countMemberInTime = $CI->db->select('m.group_no, pt.prayer_time')->from('members as m')->join('prayer_time as pt', 'pt.id =  m.time_id', 'left')->where('m.center_id', $center_id)->where('m.group_no', $group_no)->where('m.time_id', $time_details[$j]->time_id)->get()->result();
                if(count($countMemberInTime) < $time_details[$j]->allowed_member){
                   $data[$k]['group_no']        = (!empty($countMemberInTime[0]->group_no))? $countMemberInTime[0]->group_no : $group_no;
                   $data[$k]['time']            = (!empty($countMemberInTime[0]->prayer_time))? $countMemberInTime[0]->prayer_time : $time_details[$j]->prayer_time;;
                   $data[$k]['max_members']      = $time_details[$j]->allowed_member;
                   $data[$k]['no_members']      = count($countMemberInTime);
                   $data[$k]['no_vacant']       = (($time_details[$j]->allowed_member) - (count($countMemberInTime)));
                   $k++;
                }
            }
        }
    }
    
   return $data;
}

