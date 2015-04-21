<div class="modal fade" id="generate_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<!--Start of Header-->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Generate Account</h4>
			<!--End of Header-->
			</div>
			<div class="modal-body">
			<!--Start of Body-->
				<p>Details</p>
				<p>Instructions</p>
				<?= form_open('admin_control/generateUsername', array('id' => 'form_generate'));?>
				<!--<form method="post" action=''>-->
					<div class="form-group">
						<input class="login_inputf form-control" type = "text" name="generate_username" placeholder="employee id" size="27"/></br>
					</div>
				</form>
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
								'value'         => 'Generate',
								'class' 	 	=> "btn btn-primary",
								'onclick'       => "func_generate()"
							);
					echo form_input($attr);
				?>
			<!--End of Footer-->
			</div>
		</div>
	</div>
</div>

<script>
function func_generate() {
    document.getElementById("form_generate").submit();
}
</script>