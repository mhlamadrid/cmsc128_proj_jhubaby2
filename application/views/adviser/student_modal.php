<div class="modal fade" id="view_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
		<!--Start of Header-->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Student Information</h4>
		<!--End of Header-->
			</div>
			<div class="modal-body">
				<!--Start of Body-->
				<p id="pStudNo"></p>
				<p id="pName"></p>
				<p id="pClassification"></p>
				<p id="pStatus"></p>
				<p id="pEmailAdd"></p>
				<p id="pContactNo"></p>
				<!--End of Body-->
			</div>
			<div class="modal-footer">
				<!--Start of Footer-->
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<!--End of Footer-->
			</div>
		</div>
	</div>
</div>

<script>
$('#view_Modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var name = button.data('name')
  var classification = button.data('classification')
  var status = button.data('status')
  var email_add = button.data('email_add')
  var contact_no = button.data('contact_no') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Student Information ')
  modal.find('.modal-body #pStudNo').text("ID: " + id)
  modal.find('.modal-body #pName').text("Name: " + name)
  modal.find('.modal-body #pClassification').text("Classification: " + classification)
  modal.find('.modal-body #pStatus').text("Status: " + status)
  modal.find('.modal-body #pEmailAdd').text("Email Address: " + email_add)
  modal.find('.modal-body #pContactNo').text("Contact No.: " + contact_no)
})
</script>