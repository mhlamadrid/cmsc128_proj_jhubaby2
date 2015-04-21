<div class="panel-heading">
	Searching <?Php if ($search_param != null) echo "<em>{$search_param}</em>..." ;?>
</div>
<div class="panel-body">
<?Php	if ($search_results != null){	?>
			<table class="table table-hover table-striped">
				<th>Student Number</th>
				<th>Name</th>
				<th>Classification</th>
				<th>Status</th>
				<th>Email Address</th>
				<th>Contact No.</th>
				<th></th>
	
	<?Php	foreach ($search_results as $row){
				echo form_open('');?>
				<tr>
					<td>
						<?= $row->stud_no;?>
					</td>
					
					<td>
						<?Php
							$attr = array(
								'data-toggle' => "modal",
								'data-target' => "#view_Modal",
								'data-id' => $row->stud_no,
								'data-name' => $row->name,
								'data-classification' => $row->classification,
								'data-status' => $row->status,
								'data-email_add' => $row->email_add,
								'data-contact_no' => $row->contact_no
								);
							echo anchor('view_Modal', "Name: {$row->name}", $attr);
						?>
					</td>
					
					<td>
						<?= $row->classification;?>
					</td>
					
					<td>
						<?= $row->status;?>
					</td>
					
					<td>
						<?= $row->email_add;?>
					</td>
					
					<td>
						<?= $row->contact_no;?>
					</td>
				
					<td>
				<?php	
					echo "<div class='btn-group btn-block'>";
								echo "<input type='hidden' id='hide' value='".$row->stud_no."'/>";
								$attr = array(
										'id' => $row->stud_no,
										'class' => "btn btn-default",
										'value' =>  "Request Contact Info",
										'onclick' => 'request_contact();request_sent()'
									);
								echo form_input($attr);
								echo form_close();
					echo "</div>";
					echo "</td>";
				?>
				</tr>
	<?Php	}	?>
					</table>
<?Php	}else	echo "No Students Found.";	?>
</div>
<script>
	function request_contact()
	{
		var student_num = $('input#hide').val();
			
		if($("input#hide").val().length<1) return false;
			$.ajax({
				type: 'POST',
				 
				//We are going to make the request to the method "list_dropdown" in the match controller
				url: '<?php echo site_url();?>/adviser_control/adviserRequest', 
				 
				//POST parameter to be sent with the tournament id
				data: { stud_num:student_num },
				 
				//When the request is successfully completed, this function will be executed
				// success: function(resp) { 
				// 	//With the ".html()" method we include the html code returned by AJAX into the matches list
				// 	$('#search-results').html(resp);
				// },
				error: function(){						
					alert('Error while request..');
			}
		});
	}
</script>

<script>
	function request_sent(){
		alert("Request Sent!");
	}
</script>