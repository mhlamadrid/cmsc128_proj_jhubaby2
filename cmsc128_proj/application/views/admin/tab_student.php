<div role="tabpanel" class="tab-pane active" id="tab_student">
	<div class="panel panel-default" style="margin-top:10px">
		<div class="panel-body" id="result-students">    
		<!--Student tab HERE-->	
			No Students.
		<!--Student tab HERE-->	
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
				 
			//We are going to make the request to the method "list_dropdown" in the match controller
			url: '<?php echo site_url();?>/admin_control/get_students', 
				 
			//When the request is successfully completed, this function will be executed
			success: function(resp) { 
				//With the ".html()" method we include the html code returned by AJAX into the matches list
				$("#result-students").html(resp);
			},
			error: function(){						
				alert('Error while request..');
			}
		});
	});
	
	function search_student()
	{
		var search_input = $('input#inp_stud_search').val();
			
		if($("input#inp_stud_search").val().length<1) return false;
		$.ajax({
			type: 'POST',
				 
			//We are going to make the request to the method "list_dropdown" in the match controller
			url: '<?php echo site_url();?>/admin_control/search_student', 
				 
			//POST parameter to be sent with the tournament id
			data: { srch_param:search_input},
				 
			//When the request is successfully completed, this function will be executed
			success: function(resp) { 
				//With the ".html()" method we include the html code returned by AJAX into the matches list
				$('#result-students').html(resp);
			},
			error: function(){						
					alert('Error while request..');
			}
		});
	}
</script>