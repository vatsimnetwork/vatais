@extends('layout.app')
@section('content')
		<div class="col-md-10 offset-md-1">
			<div class="jumbotron">
				<!-- <span class="flag-icon flag-icon-COUNTRY"></span> -->
				<h3><?php echo $airportInfo['name'];?> ({{ $airportInfo['icao'] }})<span class="float-right badge badge-dark">CTAF: 122.8 Mhz</span></h3>
				<p class="lead">Elevation: {{ $airportInfo['elevation_ft'] }} FT</p>
				<p class="lead"><?php echo $metar ;?></p>
			</div>
			<a href="<?php echo base_url();?>" role="button" class="btn btn-info float-right">Search again!</a>
		</div>
@endsection