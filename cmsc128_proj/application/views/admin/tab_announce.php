<div role="tabpanel" class="tab-pane" id="tab_announcement">
	<div class="panel panel-default" style="margin-top:10px">
		<div class="panel-body" id="result-announcements">    
		<!--announcements tab HERE-->
			No announcements.
		<!--announcements tab HERE-->		
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
				 
			//We are going to make the request to the method "list_dropdown" in the match controller
			url: '<?php echo site_url();?>/admin_control/get_announcements', 
				 
			//When the request is successfully completed, this function will be executed
			success: function(resp) { 
				//With the ".html()" method we include the html code returned by AJAX into the matches list
				$("#result-announcements").html(resp);
			},
			error: function(){						
				alert('Error while request..');
			}
		});
	});
</script>