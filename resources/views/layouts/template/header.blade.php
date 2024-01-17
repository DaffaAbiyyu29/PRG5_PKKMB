<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>PKKMB Politeknik Astra</title>
	<link rel="icon" href="{{ asset('resources/assets/Images/logo/astratech.ico') }}" />
	<link rel="shortcut icon" href="{{ asset('resources/assets/Images/logo/astratech.ico') }}" />
	<link href="{{ asset('resources/assets/Plugins/MDB-Pro_4.14.1/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('resources/assets/Plugins/MDB-Pro_4.14.1/css/mdb.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('resources/assets/Plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('resources/assets/Plugins/fontawesome-free-5.11.2-web/css/fontawesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('resources/assets/Plugins/fontawesome-free-5.11.2-web/css/solid.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('resources/assets/Plugins/fontawesome-free-5.11.2-web/css/regular.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('resources/assets/Plugins/fontawesome-free-5.11.2-web/css/brands.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('resources/assets/Content/themes/base/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('resources/assets/Styles/Style.css') }}" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
	<script src="{{ asset('resources/assets/Scripts/jquery-ui-1.13.2.min.js') }}"></script>
	<script src="{{ asset('resources/assets/Plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('resources/assets/Plugins/fontawesome-free-5.11.2-web/js/fontawesome.min.js') }}"></script>
	<script src="{{ asset('resources/assets/Plugins/MDB-Pro_4.14.1/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('resources/assets/Plugins/MDB-Pro_4.14.1/js/mdb.min.js') }}"></script>
	<script src="{{ asset('resources/assets/Plugins/Highcharts-7.2.1/code/highcharts.js') }}"></script>
	<script src="{{ asset('resources/assets/Plugins/Highcharts-7.2.1/code/highcharts-more.js') }}"></script>
	<form id="form1" runat="server" enctype="multipart/form-data">
		<nav class="navbar navbar-expand-lg navbar-light light">
			<a class="navbar-brand" style="padding: 5px 15px;">
				<img src="{{ asset('resources/assets/Images/logo/astratech.png') }}" alt="Logo Politeknik Astra" style="height: 45px;" />
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent-555">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mr-2 login">
						<a href="" class="nav-link font-weight-bold waves-effect waves-light white-text rounded-3" style="padding: 8px 15px; background-color: #0059AB;"><b style="font-weight: bold;">Login</b></a>
					</li>
				</ul>
			</div>
		</nav>
	</form>
</head>

