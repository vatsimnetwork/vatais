@extends('layout.app')
@section('content')
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
						<div class="content text-center">
								<a href="{{ site_url('auth/sso') }}" class="btn btn-success btn-lg">Login with VATSIM</a>
						</div>
				</div>
			</div>
		</div>
	</div>
@endsection
