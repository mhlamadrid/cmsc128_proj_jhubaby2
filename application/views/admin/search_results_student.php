			<div class="col-md-3">
				<?Php	if ($students != null){	?>
							<div class="form-group">
								<select id="student_sort_by" class="form-control">
									<option value="student_sort_alphabetically">Sort alphabetically</option>
									<option value="student_sort_by_advisers">Sort by advisers</option>
									<option value="student_sort_by_classification">Sort by classification</option>
								</select>
							</div>
				<?Php	}	?>
			</div><!-- /.col-lg-3 -->
			<div class="col-md-3">
				<!-- Blank space -->
			</div>
			<div class="col-lg-6">
				<div class="input-group">
					<input id="inp_stud_search" name="search_student_text" type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-default" onclick="search_student()">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</span>
				</div>
			</div><!-- /.col-lg-6 -->
	<p>
	<?Php 
			if($search_param!=null){
				echo br(2);
				echo heading("Searching <em>{$search_param}</em>...",4);
			}
	?>
	</p>
<?Php
	if ($students != null){	?>
		<table class="table table-hover table-striped">
			<th>Student Number</th>
			<th>Name</th>
			<th>Classification</th>
			<th>Status</th>
			<th>Email Address</th>
			<th>Contact No.</th>
			<th></th>
<?Php	foreach ($students as $row){
				
			echo form_open('');		?>
				<tr>
					<td>
						<?= $row->stud_no;?>
					</td>
							
					<td>
						<?= $row->name;?>
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
						<div class="btn-group btn-block">
						<?Php						
							$attr = array(
									'value'       => 'Do Something',
									'class' 	  => "btn btn-primary",
									);
							echo form_submit($attr);
							echo form_close();
						?>
						</div>
					</td>
				</tr>
<?Php	}	?>
			</table>
<?Php	}else echo heading("No Advisers.",4);	?>