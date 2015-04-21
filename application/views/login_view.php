<!DOCTYPE html>
<html>
<head>
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<title>Home: Jhubabies UI</title>

<?Php 
	echo link_tag(base_url('css/bootstrap.css'));
	echo link_tag(base_url('css/home.css'));
	echo script_tag(base_url('js/jquery-1.11.2.min.js'));
	echo script_tag(base_url('js/bootstrap.js'));
?>

</head>
<body>
	
	<!---Header--->
	<?Php $this->load->view('header_view');?>
	
	<!--Announcements-->
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    
			<?Php	
				$ctr=1;
				foreach($announcements as $row){ ?>
					<li data-target="#carousel-example-generic" data-slide-to="<?=$ctr++;?>"></li>
			<?Php 	}	?>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			
			<div class="item active">
			    <div class="carousel-caption">
					<h2>Defaul Announcement</h2>
					<br></br>
					<p>Details details details details details. Details details details details details. Details details details details details.</p>
			    </div>
		    </div>
			
			<?Php	foreach($announcements as $row){ ?>
						<div class="item">
							<div class="carousel-caption">
								<h2><?=$row->title;?></h2>
								<br></br>
								<p><?=$row->body;?></p>
							</div>
						</div>							
			<?Php 	}	?>

		</div><!--End of Slides-->
		
	</div><!--End of Carousel-->
		
	<!---Footer--->
	<?Php $this->load->view('footer_view');?>

	</body>
</html>