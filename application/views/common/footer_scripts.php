    <!-- Bootstrap Core JavaScript -->
    <script src="<?= site_url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    
	<!-- Data table JavaScript -->
	<script src="<?= site_url('assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js');?>"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="<?= site_url('assets/dist/js/jquery.slimscroll.js');?>"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="<?= site_url('assets/vendors/bower_components/moment/min/moment.min.js');?>"></script>
	<script src="<?= site_url('assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js');?>"></script>
	<script src="<?= site_url('assets/dist/js/simpleweather-data.js');?>"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="<?= site_url('assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js');?>"></script>
	<script src="<?= site_url('assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js');?>"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="<?= site_url('assets/dist/js/dropdown-bootstrap-extended.js');?>"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="<?= site_url('assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js');?>"></script>
	
	<!-- Owl JavaScript -->
	<script src="<?= site_url('assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js');?>"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="<?= site_url('assets/vendors/chart.js/Chart.min.js');?>"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="<?= site_url('assets/vendors/bower_components/raphael/raphael.min.js');?>"></script>
    <script src="<?= site_url('assets/vendors/bower_components/morris.js/morris.min.js');?>"></script>
    <script src="<?= site_url('assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js');?>"></script>
	
	<!-- Switchery JavaScript -->
	<script src="<?= site_url('assets/vendors/bower_components/switchery/dist/switchery.min.js');?>"></script>
	
	<!-- Init JavaScript -->
	<script src="<?= site_url('assets/dist/js/init.js');?>"></script>
	
	<script>
        $(function() {
            $('path').on("click", function(){
                var addHtml = "";
                var id = this.id;
                var positionValue = id.charAt(id.length - 1);
                if(id < 20 && id > 10){
                     addHtml = "<input type='hidden' name='position_tl[]' value='"+positionValue+"'/>"+positionValue;
                }
                if(id < 30 && id > 20){
                     addHtml = "<input type='hidden' name='position_tr[]' value='"+positionValue+"'/>"+positionValue;
                }
                if(id < 40 && id > 30){
                     addHtml = "<input type='hidden' name='position_br[]' value='"+positionValue+"'/>"+positionValue;
                }
                if(id < 50 && id > 40){
                     addHtml = "<input type='hidden' name='position_bl[]' value='"+positionValue+"'/>"+positionValue;
                }
                $("#pos_"+id).empty();
                $("#pos_"+id).append(addHtml);
            });
            
            $('.tooth-11').mouseover(function() {
                $('.tooth-11-parent').css('fill', '#ff8b15');
            });

            $('.tooth-11').mouseleave(function() {
                if($('#pos_11').is(':empty')) {
                    $('.tooth-11-parent').css('fill', 'none');
                }
            });

            $('#pos_11').click(function() {
                $(this).empty();
                $('.tooth-11-parent').css('fill', 'none');
            });

            $('.tooth-12').mouseover(function() {
                $('.tooth-12-parent').css('fill', '#ff8b15');
            });

            $('.tooth-12').mouseleave(function() {
                if($('#pos_12').is(':empty')) {
                    $('.tooth-12-parent').css('fill', 'none');
                }
            });

            $('#pos_12').click(function() {
                $(this).empty();
                $('.tooth-12-parent').css('fill', 'none');
            });

            $('.tooth-13').mouseover(function() {
                $('.tooth-13-parent').css('fill', '#ff8b15');
            });

            $('.tooth-13').mouseleave(function() {
                if($('#pos_13').is(':empty')) {
                    $('.tooth-13-parent').css('fill', 'none');
                }
            });

            $('#pos_13').click(function() {
                $(this).empty();
                $('.tooth-13-parent').css('fill', 'none');
            });

            $('.tooth-14').mouseover(function() {
                $('.tooth-14-parent').css('fill', '#ff8b15');
            });

            $('.tooth-14').mouseleave(function() {
                if($('#pos_14').is(':empty')) {
                    $('.tooth-14-parent').css('fill', 'none');
                }
            });

            $('#pos_14').click(function() {
                $(this).empty();
                $('.tooth-14-parent').css('fill', 'none');
            });

            $('.tooth-15').mouseover(function() {
                $('.tooth-15-parent').css('fill', '#ff8b15');
            });

            $('.tooth-15').mouseleave(function() {
                if($('#pos_15').is(':empty')) {
                    $('.tooth-15-parent').css('fill', 'none');
                }
            });

            $('#pos_15').click(function() {
                $(this).empty();
                $('.tooth-15-parent').css('fill', 'none');
            });

            $('.tooth-16').mouseover(function() {
                $('.tooth-16-parent').css('fill', '#ff8b15');
            });

            $('.tooth-16').mouseleave(function() {
                if($('#pos_16').is(':empty')) {
                    $('.tooth-16-parent').css('fill', 'none');
                }
            });

            $('#pos_16').click(function() {
                $(this).empty();
                $('.tooth-16-parent').css('fill', 'none');
            });

            $('.tooth-17').mouseover(function() {
                $('.tooth-17-parent').css('fill', '#ff8b15');
            });

            $('.tooth-17').mouseleave(function() {
                if($('#pos_17').is(':empty')) {
                    $('.tooth-17-parent').css('fill', 'none');
                }
            });

            $('#pos_17').click(function() {
                $(this).empty();
                $('.tooth-17-parent').css('fill', 'none');
            });

            $('.tooth-18').mouseover(function() {
                $('.tooth-18-parent').css('fill', '#ff8b15');
            });

            $('.tooth-18').mouseleave(function() {
                if($('#pos_18').is(':empty')) {
                    $('.tooth-18-parent').css('fill', 'none');
                }
            });

            $('#pos_18').click(function() {
                $(this).empty();
                $('.tooth-18-parent').css('fill', 'none');
            });

            

            $('.tooth-21').mouseover(function() {
                $('.tooth-21-parent').css('fill', '#ff8b15');
            });

            $('.tooth-21').mouseleave(function() {
                if($('#pos_21').is(':empty')) {
                    $('.tooth-21-parent').css('fill', 'none');
                }
            });

            $('#pos_21').click(function() {
                $(this).empty();
                $('.tooth-21-parent').css('fill', 'none');
            });

            $('.tooth-22').mouseover(function() {
                $('.tooth-22-parent').css('fill', '#ff8b15');
            });

            $('.tooth-22').mouseleave(function() {
                if($('#pos_22').is(':empty')) {
                    $('.tooth-22-parent').css('fill', 'none');
                }
            });

            $('#pos_22').click(function() {
                $(this).empty();
                $('.tooth-22-parent').css('fill', 'none');
            });

            $('.tooth-23').mouseover(function() {
                $('.tooth-23-parent').css('fill', '#ff8b15');
            });

            $('.tooth-23').mouseleave(function() {
                if($('#pos_23').is(':empty')) {
                    $('.tooth-23-parent').css('fill', 'none');
                }
            });

            $('#pos_23').click(function() {
                $(this).empty();
                $('.tooth-23-parent').css('fill', 'none');
            });

            $('.tooth-24').mouseover(function() {
                $('.tooth-24-parent').css('fill', '#ff8b15');
            });

            $('.tooth-24').mouseleave(function() {
                if($('#pos_24').is(':empty')) {
                    $('.tooth-24-parent').css('fill', 'none');
                }
            });

            $('#pos_24').click(function() {
                $(this).empty();
                $('.tooth-24-parent').css('fill', 'none');
            });

            $('.tooth-25').mouseover(function() {
                $('.tooth-25-parent').css('fill', '#ff8b15');
            });

            $('.tooth-25').mouseleave(function() {
                if($('#pos_25').is(':empty')) {
                    $('.tooth-25-parent').css('fill', 'none');
                }
            });

            $('#pos_25').click(function() {
                $(this).empty();
                $('.tooth-25-parent').css('fill', 'none');
            });

            $('.tooth-26').mouseover(function() {
                $('.tooth-26-parent').css('fill', '#ff8b15');
            });

            $('.tooth-26').mouseleave(function() {
                if($('#pos_26').is(':empty')) {
                    $('.tooth-26-parent').css('fill', 'none');
                }
            });

            $('#pos_26').click(function() {
                $(this).empty();
                $('.tooth-26-parent').css('fill', 'none');
            });

            $('.tooth-27').mouseover(function() {
                $('.tooth-27-parent').css('fill', '#ff8b15');
            });

            $('.tooth-27').mouseleave(function() {
                if($('#pos_27').is(':empty')) {
                    $('.tooth-27-parent').css('fill', 'none');
                }
            });

            $('#pos_27').click(function() {
                $(this).empty();
                $('.tooth-27-parent').css('fill', 'none');
            });

            $('.tooth-28').mouseover(function() {
                $('.tooth-28-parent').css('fill', '#ff8b15');
            });

            $('.tooth-28').mouseleave(function() {
                if($('#pos_28').is(':empty')) {
                    $('.tooth-28-parent').css('fill', 'none');
                }
            });
            $('#pos_28').click(function() {
                $(this).empty();
                $('.tooth-28-parent').css('fill', 'none');
            });

            $('.tooth-31').mouseover(function() {
                $('.tooth-31-parent').css('fill', '#ff8b15');
            });

            $('.tooth-31').mouseleave(function() {
                if($('#pos_31').is(':empty')) {
                    $('.tooth-31-parent').css('fill', 'none');
                }
            });

            $('#pos_31').click(function() {
                $(this).empty();
                $('.tooth-31-parent').css('fill', 'none');
            });

            $('.tooth-32').mouseover(function() {
                $('.tooth-32-parent').css('fill', '#ff8b15');
            });

            $('.tooth-32').mouseleave(function() {
                if($('#pos_32').is(':empty')) {
                    $('.tooth-32-parent').css('fill', 'none');
                }
            });
            $('#pos_32').click(function() {
                $(this).empty();
                $('.tooth-32-parent').css('fill', 'none');
            });

            $('.tooth-33').mouseover(function() {
                $('.tooth-33-parent').css('fill', '#ff8b15');
            });

            $('.tooth-33').mouseleave(function() {
                if($('#pos_33').is(':empty')) {
                    $('.tooth-33-parent').css('fill', 'none');
                }
            });
            $('#pos_33').click(function() {
                $(this).empty();
                $('.tooth-33-parent').css('fill', 'none');
            });

            $('.tooth-34').mouseover(function() {
                $('.tooth-34-parent').css('fill', '#ff8b15');
            });

            $('.tooth-34').mouseleave(function() {
                if($('#pos_34').is(':empty')) {
                    $('.tooth-34-parent').css('fill', 'none');
                }
            });

            $('#pos_34').click(function() {
                $(this).empty();
                $('.tooth-34-parent').css('fill', 'none');
            });

            $('.tooth-35').mouseover(function() {
                $('.tooth-35-parent').css('fill', '#ff8b15');
            });

            $('.tooth-35').mouseleave(function() {
                if($('#pos_35').is(':empty')) {
                    $('.tooth-35-parent').css('fill', 'none');
                }
            });

            $('#pos_35').click(function() {
                $(this).empty();
                $('.tooth-35-parent').css('fill', 'none');
            });

            $('.tooth-36').mouseover(function() {
                $('.tooth-36-parent').css('fill', '#ff8b15');
            });

            $('.tooth-36').mouseleave(function() {
                if($('#pos_36').is(':empty')) {
                    $('.tooth-36-parent').css('fill', 'none');
                }
            });
            $('#pos_36').click(function() {
                $(this).empty();
                $('.tooth-36-parent').css('fill', 'none');
            });

            $('.tooth-37').mouseover(function() {
                $('.tooth-37-parent').css('fill', '#ff8b15');
            });

            $('.tooth-37').mouseleave(function() {
                if($('#pos_37').is(':empty')) {
                    $('.tooth-37-parent').css('fill', 'none');
                }
            });
            $('#pos_37').click(function() {
                $(this).empty();
                $('.tooth-37-parent').css('fill', 'none');
            });

            $('.tooth-38').mouseover(function() {
                $('.tooth-38-parent').css('fill', '#ff8b15');
            });

            $('.tooth-38').mouseleave(function() {
                if($('#pos_38').is(':empty')) {
                    $('.tooth-38-parent').css('fill', 'none');
                }
            });
            $('#pos_38').click(function() {
                $(this).empty();
                $('.tooth-38-parent').css('fill', 'none');
            });

            

            $('.tooth-41').mouseover(function() {
                $('.tooth-41-parent').css('fill', '#ff8b15');
            });

            $('.tooth-41').mouseleave(function() {
                if($('#pos_41').is(':empty')) {
                    $('.tooth-41-parent').css('fill', 'none');
                }
            });

            $('#pos_41').click(function() {
                $(this).empty();
                $('.tooth-41-parent').css('fill', 'none');
            });

            $('.tooth-42').mouseover(function() {
                $('.tooth-42-parent').css('fill', '#ff8b15');
            });

            $('.tooth-42').mouseleave(function() {
                if($('#pos_42').is(':empty')) {
                    $('.tooth-42-parent').css('fill', 'none');
                }
            });

            $('#pos_42').click(function() {
                $(this).empty();
                $('.tooth-42-parent').css('fill', 'none');
            });

            $('.tooth-43').mouseover(function() {
                $('.tooth-43-parent').css('fill', '#ff8b15');
            });

            $('.tooth-43').mouseleave(function() {
                if($('#pos_43').is(':empty')) {
                    $('.tooth-43-parent').css('fill', 'none');
                }
            });
            $('#pos_43').click(function() {
                $(this).empty();
                $('.tooth-43-parent').css('fill', 'none');
            });

            $('.tooth-44').mouseover(function() {
                $('.tooth-44-parent').css('fill', '#ff8b15');
            });


            $('.tooth-44').mouseleave(function() {
                if($('#pos_44').is(':empty')) {
                    $('.tooth-44-parent').css('fill', 'none');
                }
            });
            $('#pos_44').click(function() {
                $(this).empty();
                $('.tooth-44-parent').css('fill', 'none');
            });

            $('.tooth-45').mouseover(function() {
                $('.tooth-45-parent').css('fill', '#ff8b15');
            });

            $('.tooth-45').mouseleave(function() {
                if($('#pos_45').is(':empty')) {
                    $('.tooth-45-parent').css('fill', 'none');
                }
            });
            $('#pos_45').click(function() {
                $(this).empty();
                $('.tooth-45-parent').css('fill', 'none');
            });

            $('.tooth-46').mouseover(function() {
                $('.tooth-46-parent').css('fill', '#ff8b15');
            });

            $('.tooth-46').mouseleave(function() {
                if($('#pos_46').is(':empty')) {
                    $('.tooth-46-parent').css('fill', 'none');
                }
            });
            $('#pos_46').click(function() {
                $(this).empty();
                $('.tooth-46-parent').css('fill', 'none');
            });

            $('.tooth-47').mouseover(function() {
                $('.tooth-47-parent').css('fill', '#ff8b15');
            });

            $('.tooth-47').mouseleave(function() {
                if($('#pos_47').is(':empty')) {
                    $('.tooth-47-parent').css('fill', 'none');
                }
            });
            $('#pos_47').click(function() {
                $(this).empty();
                $('.tooth-47-parent').css('fill', 'none');
            });

            $('.tooth-48').mouseover(function() {
                $('.tooth-48-parent').css('fill', '#ff8b15');
            });

            $('.tooth-48').mouseleave(function() {
                if($('#pos_48').is(':empty')) {
                    $('.tooth-48-parent').css('fill', 'none');
                }
            });
            $('#pos_48').click(function() {
                $(this).empty();
                $('.tooth-48-parent').css('fill', 'none');
            });
            
        });
    </script>