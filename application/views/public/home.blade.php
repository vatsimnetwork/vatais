@extends('layout.app')
@section('content')
<div class="col-md-6 offset-md-3">
	<?php echo $this->session->flashdata('message');?>
	<?php echo form_open('');?>
	<div class="form-label-group">
		<input type="text" id="icao_id" maxlength="4" name="icao_id" class="form-control form-control-lg text-center" placeholder="ICAO Code" required>
	</div>
	</form>
</div>
@endsection