<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Excel_import extends Admin_Controller {
	function __construct()
		{
			parent::__construct();
			$this->data['page_menu'] = 'Chain Prayer';
			isLogedUser();	
		}
	public function index(){
		$this->data['page_title'] = 'Excel Import';
		//$this->data['centerfhs'] = $this->Centerfhs_m->order_by('id', 'desc')->get_all();
		$this->data['center_fh'] = $this->Centerfhs_m->get_all();
		$this->data['times'] = $this->Times_m->get_all();
		$this->data['load_page'] = "prayerchain/excel-import/excel_import_list";
		$this->template->admintemplate($this->data);
	}
	public function get_excel_data(){
		$file = $_FILES;
		$ext = pathinfo($_FILES["excel_file"]["name"])['extension'];
        $fileName = $_FILES["excel_file"]["tmp_name"];
		if ($_FILES["excel_file"]["size"] > 0 && ($ext == 'csv' || $ext == 'CSV')) {
			header('Content-Type: text/html; charset=UTF-8');
			$file = fopen($fileName, "r");
			//$file = file_get_contents($fileName);
			$i = 0;
			$dataArray = array();
			while (($column = fgetcsv($file, 10000, ",")) !== false) {
				if ($i++ == 0) {
					continue;
				}
				$dataArray[] = array(
					"center_id" => $column[0],
					"local_id"  => $column[1],
					"lang_id"  	=> $column[2],
					"time_id"  	=> $column[3],
					"bro_sis"  	=> $column[4],
					"eng_name"  => $column[5],
					"mal_name"  => $column[6],
					"tam_name"  => $column[7],
					"tel_name"  => $column[8],
					"hin_name"  => $column[9],
					"kan_name"  => $column[10],
					"mobile"  => $column[11]
					);
			}
			$data = $dataArray;
		}
		$html = "";
		$slno = 0;
		for ($i=0; $i < count($data); $i++) { 
			$slno++;
			$html .='<tr>';
			$html .='<td class="text-center">'.$slno.'</td>';
			$html .='<td><input type="text" name="center_code[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['center_id'].'" /></td>';
			$html .='<td><input type="text" name="local_name[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['local_id'].'" /></td>';
			$html .='<td><input type="text" name="lang_code[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['lang_id'].'" /></td>';
			$html .='<td><input type="text" name="prayer_time[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['time_id'].'" /></td>';
			$html .='<td><input type="text" name="bro_sis[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['bro_sis'].'" /></td>';
			$html .='<td><input type="text" name="eng_name[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['eng_name'].'" /></td>';
			$html .='<td><input type="text" name="mal_name[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['mal_name'].'" /></td>';
			$html .='<td><input type="text" name="tam_name[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['tam_name'].'" /></td>';
			$html .='<td><input type="text" name="tel_name[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['tel_name'].'" /></td>';
			$html .='<td><input type="text" name="hin_name[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['hin_name'].'" /></td>';
			$html .='<td><input type="text" name="kan_name[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['kan_name'].'" /></td>';
			$html .='<td><input type="text" name="mobile[]" class="form-control form-control-sm text-xs" value="'.$data[$i]['mobile'].'" /></td>';
			$html .='</tr>';
		}
		echo $html;
	}

	public function save_bulk_data(){
		ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');

		$centerCode = $this->input->post('center_code');
		$localName 	= $this->input->post('local_name');
		$langCode 	= $this->input->post('lang_code');
		$prayerTime	= $this->input->post('prayer_time');
		$broSis 	= $this->input->post('bro_sis');
		$engName 	= $this->input->post('eng_name');
		$malName 	= $this->input->post('mal_name');
		$tamName 	= $this->input->post('tam_name');
		$telName 	= $this->input->post('tel_name');
		$hinName 	= $this->input->post('hin_name');
		$kanNmae 	= $this->input->post('kan_name');
		$mobile		= $this->input->post('mobile');

		for ($i=0; $i < count($centerCode); $i++) { 
			
			$prayer_time = formate_time($prayerTime[$i]);
			$data_center	= $this->db->select('c.*')->where('center_code',trim($centerCode[$i])) ->get('center_fhs as c')->row();
			$data_local		= $this->db->select('l.*')->where('localName', $localName[$i])->get('local_fhs as l')->row();
			$data_lang		= $this->db->select('lg.*')->where('lang_code', trim($langCode[$i]))->get('languages as lg')->row();
			$data_time		= $this->db->select('t.*')->where('prayer_time', $prayer_time)->get('prayer_time as t')->row();
			
			$group_no = get_group_number($data_center->id, $data_time->id);

			$data['center_id']	= (isset($data_center->id))? $data_center->id : "no";
			$data['local_id']	= (isset($data_local->id))? $data_local->id : "no";
			$data['lang_id']	= (isset($data_lang->id)) ? $data_lang->id : "no";
			$data['time_id']	= (isset($data_time->id))? $data_time->id : "no";
			$data['bro_sis']	= $broSis[$i];
			$data['eng_name']	= $engName[$i];
			$data['mal_name']	= $malName[$i];
			$data['tam_name']	= $tamName[$i];
			$data['tel_name']	= $telName[$i];
			$data['hin_name']	= $hinName[$i];
			$data['kan_name']	= $kanNmae[$i];
			$data['mobile']		= $mobile[$i];
			$data['group_no']	= $group_no;
			$data['status']		= 1; 
			$check = $this->db->where('center_id', $data_center->id)->where('local_id', $data_local->id)-> where('eng_name',$engName[$i])->get('members')->row();
			if(!empty($check)){
				$id = $check->id;
				$this->Members_m->update($id, $data);
			}else{
				$this->Members_m->insert($data);
			}
		}

		$this->session->set_flashdata("success", "Data saved successfully");
		redirect('prayerchain/excel_import');
	}

}
