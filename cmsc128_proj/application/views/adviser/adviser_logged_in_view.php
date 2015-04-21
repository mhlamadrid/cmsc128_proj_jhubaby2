<!DOCTYPE html>
 <head>
   <title>Adviser Page</title>
   
<?Php 
	echo link_tag(base_url('css/bootstrap.css'));
	echo link_tag(base_url('css/common.css'));
	echo script_tag(base_url('js/jquery-1.11.2.min.js'));
	echo script_tag(base_url('js/bootstrap.js'));
?>

	<script>
		$(document).ready(function(){
			$(".drpSearch").hide();
			var sel = "#" + $( "select option:selected" ).val();
			$(sel).show();
			$("#selectCategory")
				.change(function() {
					$(".drpSearch").hide();
					var sel = "#" + $( "select option:selected" ).val();
					$(sel).show();
				 })
			  .trigger( "change" );
			
			$('.btn-search').click(function(){
			  $('#myTab a[href="#tab_search"]').tab('show');
			})
		});
	</script>

	<style>
		.adviser-info {
		  text-align: center;
		}
	</style>	
 </head>
 <body>	
	<!---Header--->
	<?Php $this->load->view('header_view');?>
	
	<!--MODAL--------------------------------------------->	
    <div>
		<?Php $this->load->view('adviser/student_modal');?>
    </div>
	  
	<div class="container">
		<div class="row">
			<div class="adviser-info">
				<h1 class="text-capitalize"><?=$username;?></h1>
				<p>Consultation hours: MWF 7-7 TTh 7-8</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3">
				<div class="row">
					<?Php $this->load->view('adviser/appointments_panel');?>
				</div>
				
				<div class="row">
					<?Php $this->load->view('adviser/filtered_search_panel');?>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-9 col-md-9">
			<!--TABS----------------------------------------------------------------------------------------------------->
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="nav nav-tabs" role="tablist" id="myTab">
						  <li role="presentation" class="active"><a href="#tab_acad" aria-controls="home" role="tab" data-toggle="tab"><?= heading("ACADEMIC STANDING", 4)?></a></li>
						  <li role="presentation"><a href="#tab_doc" aria-controls="profile" role="tab" data-toggle="tab"><?= heading("DOCUMENTS", 4)?></a></li>
						  <li role="presentation"><a href="#tab_search" aria-controls="messages" role="tab" data-toggle="tab"><?= heading("FILTERED SEARCH", 4)?></a></li>
						  <li role="presentation"><a href="#tab_sample" aria-contorls="sample" role="tab" data-toggle="tab"><?= heading("SAMPLE ADVISEE", 4)?></a></li>
						</ul>

						<div class="tab-content"> 
						<?Php 
							$this->load->view('adviser/tab_acad');
							$this->load->view('adviser/tab_doc');
							$this->load->view('adviser/tab_search');
							$this->load->view('adviser/tab_sample');
						?>
						</div>
					</div>
				</div>
			<!--TABS----------------------------------------------------------------------------------------------------->
			</div>
		</div>
		
    </div><!-- /.container -->
	
	<!---Footer--->
	<?Php $this->load->view('footer_view');?>
	
 </body>
</html>