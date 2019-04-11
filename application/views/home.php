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
			<?php echo $this->session->flashdata('message');?>
			<?php echo form_open('home');?>
			<div class="form-label-group">
				<input type="text" id="icao_id" maxlength="4" name="icao_id" class="form-control" placeholder="ICAO Code" required>
			</div>
			
			</form>
		</div>
	</body>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>