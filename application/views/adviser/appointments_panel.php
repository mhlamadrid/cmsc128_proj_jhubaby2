<div class="panel panel-primary">
	<!-- Default panel contents -->
	<?Php
		$ctr=0;
		if ($appointments) foreach($appointments as $row) $ctr++;
	?>
	<div class="panel-heading">
		APPOINTMENTS &nbsp 
		<?Php if ($ctr>0){?>
			<span class="badge"><?=$ctr;?></span>
		<?Php }?>
	</div>
	
	<div class="panel-body">
		<?Php if ($appointments){?> <p>Description of appointments</p>
		<?Php }else echo "No Appointments.";?>
	</div>
	<!-- List group -->
	<?Php if ($appointments){?>
			<ul class="list-group">
				<?Php	foreach($appointments as $row){ ?>
							<a href="#"><li class="list-group-item"><?=$row;?></li></a>
				<?Php 	}?>
			</ul>
	<?Php }?>
	
</div>