<div class="panel panel-primary">
	<!-- Default panel contents -->
	<div class="panel-heading">
		STUDENT YEAR
	</div>
	<div class="panel-body">
		Subjects:
		<ul>
			<a href=""><li>Subject 1</li></a>
			<a href=""><li>Subject 2</li></a>
			<a href=""><li>Subject 3</li></a>
		</ul>
		<?Php
			$attr = array(
				'type'          => 'button',
				'value'         => 'View Curriculum',
				'class' 	  => "btn btn-primary",
				'data-toggle' => "modal",
				'data-target' => "#curri_Modal",
				);
			echo form_input($attr);
		?>
	</div>
	
</div>