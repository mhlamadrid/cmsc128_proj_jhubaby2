<div class="modal fade" id="edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
<!--Start of Header-->

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Announcement</h4>
		
<!--End of Header-->
      </div>
      
	  <div class="modal-body">
<!--Start of Body-->

<?= form_open_multipart('admin_control/edit_announcement', array('class' => 'form-horizontal', 'id' => 'form_edit'));?>	
	<div class="form-group">
		<label for="title" class="col-sm-2 control-label">Title</label>
		<div class="col-sm-10">
<?Php
			$data = array(
					  'class'       => "form-control",
					  'id'			=> 'title',
					  'name'        => 'title',
					  'value'       => '',
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
					  'value'       => ''
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
					  'value'       => '',
					);
			echo form_textarea($data);
			
			echo form_hidden('id', '');
	echo form_close();
	
	echo form_open('admin_control/del_announcement', array( 'id' => 'form_del'));
		echo form_hidden('id', '');
	echo form_close();
?>
		</div>
	</div>
	
<!--End of Body-->

	</div>
	
    <div class="modal-footer">
<!--Start of Footer-->

<?Php
		$attr = array(
					'type'         => 'button',
					'value'         => 'Delete Announcement',
					'class' 	 	=> "btn btn-default",
					'onclick'       => "func_delete()"
				);
		echo form_input($attr);
		
		$attr = array(
					'type'          => 'button',
					'value'         => 'Edit Announcement',
					'class' 	 	=> "btn btn-primary",
					'onclick'       => "func_edit()"
				);
		echo form_input($attr);
?>

<!--End of Footer-->
    </div>
	</div>
  </div>
</div>

<script>
function func_edit() {
    document.getElementById("form_edit").submit();
}

function func_delete() {
    document.getElementById("form_del").submit();
}

$('#edit_Modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var date = button.data('date')
  var title = button.data('title')
  var body = button.data('body') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Edit Annoucement ')
  modal.find('.modal-body input').val(id)  
  modal.find('.modal-body #date').val(date)
  modal.find('.modal-body #title').val(title)
  modal.find('.modal-body #details').val(body)  

})
</script>