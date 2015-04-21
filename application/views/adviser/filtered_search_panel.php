<div class="panel panel-primary">
<!-- Default panel contents -->
	<div class="panel-heading">FILTERED SEARCH</div>
						
	<div class="panel-body">
		<p>Description of filtered search</p>
							
		<div class="form-group">
			<select id="selectCategory" class="form-control">
				<option value="searchStudent">Student</option>
				<option value="searchRegistered">Registered</option>
				<option value="searchGraduated">Graduated</option>
				<option value="searchPrevious">Previous</option>
				<option value="searchDismissed">Dismissed</option>
			</select>
		</div>		
	
		<!--SEARCH BY NAME-->
		<div class="drpSearch" id="searchStudent">	
			<div class="form-group">
			<?Php
				$data = array(
					'class'     => "form-control",
					'id'		=> 'title',
					'name'      => 'title',
					'placeholder' => 'search student',
					'maxlength'   => '20'
					);
				echo form_input($data);
			?>
			</div>

			<div class="form-group">
			<?Php
				$attr = array(
					'type'		=> 'button',
					'value'     => 'Search',
					'class' 	=> "btn btn-primary btn-search",
					'onclick'	=> 'search_by_name()',
					);
				echo form_input($attr);
			?>			
			</div>
		</div>
				
		<!--View Registered-->
		<div class="drpSearch" id="searchRegistered">
			<?Php
				$attr = array(
					'type'		=> 'button',
					'value'     => 'View All',
					'class' 	=> "btn btn-primary btn-search",
					'onclick'	=> 'search_registered()',
					);
				echo form_input($attr);
			?>
		</div>

		<!--SEARCH BY Graduation sem-->
		<div class="drpSearch" id="searchGraduated">
		<?Php	if ($graduate_years != null){	?>
					<div class="form-group">
						<select id="selectYear" class="form-control">
						<?Php	foreach ($graduate_years as $row){ ?>
									<option value="<?= $row?>"><?= $row?></option>
						<?Php	}?>
						</select>
					</div>
		<?Php	}
			
				$attr = array(
						'type'		=> 'button',
						'value'     => 'View All',
						'class' 	=> "btn btn-primary btn-search",
						'onclick'	=> 'search_graduated()',
						);
				echo form_input($attr);
		?>
		</div>

		<!--View Previous-->
		<div class="drpSearch" id="searchPrevious">
			<?Php
				$attr = array(
					'type'		=> 'button',
					'value'     => 'View All',
					'class' 	=> "btn btn-primary btn-search",
					'onclick'	=> 'search_previous()',
					);
				echo form_input($attr);
			?>	
		</div>

		<!--View Dismissed-->
		<div class="drpSearch" id="searchDismissed">
			<?Php
				$attr = array(
					'type'		=> 'button',
					'value'     => 'View All',
					'class' 	=> "btn btn-primary btn-search",
					'onclick'	=> 'search_dismissed()',
					);
				echo form_input($attr);
			?>	
		</div>
	</div>
</div>

<script>
	function search_by_name()
	{
		var adviser_id = 12;
		var search_input = $('input#title').val();
			
		if($("input#title").val().length<1) return false;
			$.ajax({
				type: 'POST',
				 
				//We are going to make the request to the method "list_dropdown" in the match controller
				url: '<?php echo site_url();?>/adviser_control/search_by_name', 
				 
				//POST parameter to be sent with the tournament id
				data: { adv_id:adviser_id, srch_param:search_input},
				 
				//When the request is successfully completed, this function will be executed
				success: function(resp) { 
					//With the ".html()" method we include the html code returned by AJAX into the matches list
					$('#search-results').html(resp);
				},
				error: function(){						
					alert('Error while request..');
			}
		});
	}
	
	function search_registered()
	{
		var adviser_id = 12;
		
		$.ajax({
			type: 'POST',
				 
			//We are going to make the request to the method "list_dropdown" in the match controller
			url: '<?php echo site_url();?>/adviser_control/search_registered', 
				 
			//POST parameter to be sent with the tournament id
			data: { adv_id:adviser_id },
				 
			//When the request is successfully completed, this function will be executed
			success: function(resp) { 
				//With the ".html()" method we include the html code returned by AJAX into the matches list
				$('#search-results').html(resp);
			},
			error: function(){						
				alert('Error while request..');
			}
		});
	}
	
	function search_graduated()
	{
		var adviser_id = 12;
		var sr_yr = $("select#selectYear option:selected").val();
			
		$.ajax({
			type: 'POST',
				 
			//We are going to make the request to the method "list_dropdown" in the match controller
			url: '<?php echo site_url();?>/adviser_control/search_graduated', 
				 
			//POST parameter to be sent with the tournament id
			data: { adv_id:adviser_id, srch_param:sr_yr},
				 
			//When the request is successfully completed, this function will be executed
			success: function(resp) { 
				//With the ".html()" method we include the html code returned by AJAX into the matches list
				$('#search-results').html(resp);
			},
			error: function(){						
				alert('Error while request..');
			}
		});
	}
	
	function search_previous()
	{
		var adviser_id = 12;
		
		$.ajax({
			type: 'POST',
				 
			//We are going to make the request to the method "list_dropdown" in the match controller
			url: '<?php echo site_url();?>/adviser_control/search_previous', 
				 
			//POST parameter to be sent with the tournament id
			data: { adv_id:adviser_id },
				 
			//When the request is successfully completed, this function will be executed
			success: function(resp) { 
				//With the ".html()" method we include the html code returned by AJAX into the matches list
				$('#search-results').html(resp);
			},
			error: function(){						
				alert('Error while request..');
			}
		});
	}
	
	function search_dismissed()
	{
		var adviser_id = 12;
		
		$.ajax({
			type: 'POST',
				 
			//We are going to make the request to the method "list_dropdown" in the match controller
			url: '<?php echo site_url();?>/adviser_control/search_dismissed', 
				 
			//POST parameter to be sent with the tournament id
			data: { adv_id:adviser_id },
				 
			//When the request is successfully completed, this function will be executed
			success: function(resp) { 
				//With the ".html()" method we include the html code returned by AJAX into the matches list
				$('#search-results').html(resp);
			},
			error: function(){						
				alert('Error while request..');
			}
		});
	}
</script>