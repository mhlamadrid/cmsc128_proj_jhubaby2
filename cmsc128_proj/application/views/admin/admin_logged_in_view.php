<!DOCTYPE html>
 <head>
   <title>Admin Page</title>
   
<?Php 
	echo link_tag(base_url('css/bootstrap.css'));
	echo link_tag(base_url('css/common.css'));
	echo script_tag(base_url('js/jquery-1.11.2.min.js'));
	echo script_tag(base_url('js/bootstrap.js'));
?>
	<script>
		$(document).ready(function(){		 
			$('#myTab a:first').tab('show');
			$('.pop-overs').popover('show');
			$('.pop-overs').popover('hide');
			
			$('.tool-tip').tooltip('show');
			$('.tool-tip').tooltip('hide');
		<?Php	if ($advisers != null){	?>	
			$("#adviser_sort_by")
				.change(function() {
					if ($( "select option:selected" ).val() == "adviser_sort_alphabetically"){
					
					}else{
					
					}
				 })
			  .trigger( "change" );
		<?Php	}
				if ($students != null){	?>	  
			$("#student_sort_by")
				.change(function() {
					if ($( "select option:selected" ).val() == "student_sort_alphabetically"){
					
					}else if ($( "select option:selected" ).val() == "student_sort_by_advisers"){
					
					}else{
					
					}
				 })
			  .trigger( "change" );
		<?Php	}	?>
		});
	</script>
	
	<style>
		.admin-info {
		  text-align: center;
		}
	</style>
 </head>
 <body>	
	<!---Modals--->
	<?Php $this->load->view('admin/announce_add_modal');?>
	<?Php $this->load->view('admin/announce_edit_modal');?>
	<?Php $this->load->view('admin/generate_account_modal');?>
	
	<!---Header--->
	<?Php $this->load->view('header_view');?>

	<div class="container">
		<div class="row">
			<div class="admin-info">
				<h1 class="text-capitalize"><?=$username;?></h1>
				<p>admin info...</p>
			</div>
		</div>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-body">
					<ul class="nav nav-tabs nav-justified" role="tablist" id="myTab">
					  <li role="presentation" class="active"><a href="#tab_student" aria-controls="home" role="tab" data-toggle="tab"><?= heading("STUDENT", 4)?></a></li>
					  <li role="presentation"><a href="#tab_adviser" aria-controls="profile" role="tab" data-toggle="tab"><?= heading("ADVISER", 4)?></a></li>
					  <li role="presentation"><a href="#tab_announcement" aria-controls="messages" role="tab" data-toggle="tab"><?= heading("ANNOUNCEMENTS", 4)?></a></li>
					</ul>

					<div class="tab-content"> 
					<?Php 
						$this->load->view('admin/tab_student');
						$this->load->view('admin/tab_adviser');
						$this->load->view('admin/tab_announce');
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!---Footer--->
	<?Php $this->load->view('footer_view');?>
	
 </body>
</html>