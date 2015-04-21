<div class="modal fade" id="add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<!--Start of Header-->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Curriculum</h4>
			<!--End of Header-->
			</div>
			<div class="modal-body">
			<!--Start of Body-->
				<?= form_open_multipart('admin_control/add_announcement', array('class' => 'form-horizontal', 'id' => 'form_add'));?>	
							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
						<?Php
									$data = array(
											  'class'       => "form-control",
											  'id'			=> 'title',
											  'name'        => 'title',
											  'value'       => set_value('title'),
											  'maxlength'   => '20'
											);
									echo form_input($data);
						?>
								</div>
							</div>

							<div class="form-group">
								<label for="date" class="col-sm-2 control-label">Date</label>
								<div class="col-sm-10">
									<?Php	
												$data = array(
														  'type'	 	=> 'date',
														  'class'       => "form-control",
														  'id'			=> 'date',
														  'name'        => 'date',
														  'value'       => set_value('date'),
														);
												echo form_input($data);
									?>
								</div>
							</div>

							<div class="form-group">
								<label for="details" class="col-sm-2 control-label">Details</label>
								<div class="col-sm-10">
									<?Php
												$data = array(
														  'class'       => "form-control",
														  'id'			=> 'details',
														  'name'        => 'details',
														  'style'       => "resize:none",
														  'value'       => set_value('details'),
														);
												echo form_textarea($data);
									?>
								</div>
							</div>
						<?= form_close();?>
			<!--End of Body-->
			</div>
			<div class="modal-footer">
			<!--Start of Footer-->
				<?Php
					$attr = array(
								'type'         	=> 'button',
								'data-dismiss'	=> 'modal',
								'value'         => 'Close',
								'class' 	 	=> "btn btn-default",
							);
					echo form_input($attr);
					
					$attr = array(
								'type'          => 'button',
								'value'         => 'Add Announcement',
								'class' 	 	=> "btn btn-primary",
								'onclick'       => "func_add()"
							);
					echo form_input($attr);
				?>
			<!--End of Footer-->
			</div>
		</div>
	</div>
</div>

<script>
function func_add() {
    document.getElementById("form_add").submit();
}
</script>