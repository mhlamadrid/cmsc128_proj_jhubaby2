<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
    <div class="container" id="navbar_container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			<a class="navbar-brand" href="#">
			<?Php 
				$image_properties = array(
						'src'   => base_url('img/logo.png'),
						'alt'   => '128 AB-4L',
						'class' => 'post_images',
						'width' => '80',
						'height'=> '80',
						'title' => 'Logo',
				);

				echo img($image_properties);
			?>
			</a>  
        </div>
<?Php
	//IF LOGGED IN, navbar contain notifs and account mgt
	if($this->session->userdata('logged_in'))
	{
?>       
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?Php if ($notifications){?>
					<li class="dropdown nav">
						<?Php
							$ctr=0;
							foreach($notifications as $row) $ctr++;
						?>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class="glyphicon glyphicon-envelope"></span>
							<?Php if ($ctr>0){?>
								<span class="badge"><?=$ctr;?></span>
							<?Php }?>	
							&nbsp <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<?Php	foreach($notifications as $row){ ?>
								<li><a href="#"><?=$row;?></a></li>
							<?Php 	}?>
						</ul>			
					</li>
				<?Php }?>
				<li class="dropdown nav">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<span class="glyphicon glyphicon-user"></span>
						&nbsp <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#">
							<?Php 
								$image_properties = array(
										'src'   => base_url('img/prof_pic.jpg'),
										'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
										'class' => 'post_images img-thumbnail',
										'width' => '120',
										'height'=> '90',
										'title' => 'That was quite a night',
										'rel'   => 'lightbox'
								);
									echo img($image_properties);
							?>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<?= form_open('main_control/logout');?>
							<!--<form method="post" action=''>-->
							<div class="col-md-12">
								<input class="btn btn-link form-control" type="submit" name="logout" value="logout"/>
							</div>
							</form>						
						</li>
					</ul>			
				</li>
          </ul>
        </div><!--/.nav-collapse -->
<?Php
	//IF NOT LOGGED IN, navbar contains login form
	}
	else
	{	
?>
		<div id="navbar" class="collapse navbar-collapse">
			<?= form_open('main_control/login', array( 'class' => "navbar-form navbar-right pull-right"));?>
				<div class="input-group input-group-sm">
					<span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span><input type="text" class="form-control" aria-describedby="sizing-addon3" name = "username">
				</div>
				<div class="input-group input-group-sm">
					<span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"></span><input type="password" class="form-control" aria-describedby="sizing-addon3" name = "password">
				</div>
					<button type = "submit" class = "btn btn-default btn-sm">LOG IN</button>
			</form>
		</div><!--/.nav-collapse -->
<?Php
	}
?>		
    </div>
</nav>
	
	