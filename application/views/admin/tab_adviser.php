<div role="tabpanel" class="tab-pane" id="tab_adviser">
	<div class="panel panel-default" style="margin-top:10px">
		<div class="panel-body" id="result-advisers">    
		<!--Adviser tab HERE-->	
			No Advisers.
		<!--Adviser tab HERE-->			
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$.ajax({
			type: 'POST',
				 
			//We are going to make the request to the method "list_dropdown" in the match controller
			url: '<?php echo site_url();?>/admin_control/get_advisers', 
				 
			//When the request is successfully completed, this function will be executed
			success: function(resp) { 
				//With the ".html()" method we include the html code returned by AJAX into the matches list
				$("#result-advisers").html(resp);
			},
			error: function(){						
				alert('Error while request..');
			}
		});
	});
	
	function search_adviser()
	{
		var search_input = $('input#inp_adv_search').val();
			
		if($("input#inp_adv_search").val().length<1) return false;
		$.ajax({
			type: 'POST',
				 
			//We are going to make the request to the method "list_dropdown" in the match controller
			url: '<?php echo site_url();?>/admin_control/search_adviser', 
				 
			//POST parameter to be sent with the tournament id
			data: { srch_param:search_input},
				 
			//When the request is successfully completed, this function will be executed
			success: function(resp) { 
				//With the ".html()" method we include the html code returned by AJAX into the matches list
				$('#result-advisers').html(resp);
			},
			error: function(){						
					alert('Error while request..');
			}
		});
	}
</script>