<!doctype html>
<html lang="en">
   	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="#">
		<title>VATSIM AIS | VATSIM</title>
		<!-- Bootstrap core CSS -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
      
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url();?>assets/css/flag-icon.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    </head>
    
    <body>
        <div class="col-md-6 offset-md-3">
			<div class="text-center">
				<img class="mb-4" src="https://www.vatsim.net/sites/default/files/vatsim_0.png">
				<h1 class="h3 mb-3 font-weight-normal">VATSIM Aeronautical Information Service</h1>
				<p class="alert alert-danger">This data service is provided by VATSIM and is intended for flight simulation use ONLY.</p>
			</div>
			<hr />
		</div>
		<div class="col-md-10 offset-md-1">
			<div class="jumbotron">
				<h3><span class="flag-icon flag-icon-<?php echo strtolower($airportInfo['iso_country']);?>"></span> <?php echo $airportInfo['name'];?> (<?php echo $airportInfo['ident'];?>)<span class="float-right badge badge-dark">CTAF: <?php echo $ctafFreq;?> Mhz</span></h3>
				<p class="lead">Elevation: <?php echo $airportInfo['elevation_ft'];?> FT</p>
				<p class="lead">METAR YSTW 210530Z AUTO 24005KT 180V280 9999 // BKN081 32/09 Q1012</p>
			</div>
			<a href="<?php echo base_url();?>" role="button" class="btn btn-info float-right">Search again!</a>
		</div>
	</body>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>