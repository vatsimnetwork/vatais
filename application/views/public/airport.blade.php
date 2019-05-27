@extends('layout.app')
@section('content')
		<div class="col-md-10 offset-md-1">
			<div class="jumbotron">
				<!-- <span class="flag-icon flag-icon-COUNTRY"></span> -->
				<h3><?php echo $airportInfo['name'];?> ({{ $airportInfo['icao'] }})<span class="float-right badge badge-dark">CTAF: 122.8 Mhz</span></h3>
				<p class="lead">Elevation: {{ $airportInfo['elevation_ft'] }} FT</p>
			</div>
			@if ($this->session->userdata('logged_in'))
				@php
					if($this->Database_model->getAwis($airportInfo['icao']) !== false) {
						$awisInfo = $this->Database_model->getAwis($airportInfo['icao']);
					}
				@endphp


				<button type="button" class="btn btn-warning float-left" data-toggle="modal" data-target="#exampleModal">
					AWIS Edit
				</button>

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<form action="{{ site_url('airport/save_awis/'.$airportInfo['icao']) }}" method="POST">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">AWIS Edit</h5>
							</div>
							<div class="modal-body">
								<div class="alert alert-warning">
									<p>I can't be bothered to write an update function. If you make a mistake, disable and then enable the ATIS.</p>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Frequency (with 3 decimal places):</label>
									<input type="text" name="freq" required id="freq" class="form-control" id="exampleFormControlInput1" placeholder="126.250" @if (isset($awisInfo)) value="{{ $awisInfo['freq'] }}" @endif>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Enable or Disable:</label>
									<select class="form-control" name="status" id="status">
										<option value="enable" @if (isset($awisInfo)) selected @endif>Enable</option>
										<option value="disable" @if (!isset($awisInfo)) selected @endif>Disable</option>
									</select>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
						</div>
					</div>
				</div>
			@endif

			<a href="<?php echo base_url();?>" role="button" class="btn btn-info float-right">Search again!</a>
		</div>
@endsection