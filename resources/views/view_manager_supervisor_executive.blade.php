<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Makboss </title>
	@include('partials.header_files')
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        	@include('partials.header')
        	@include('partials.side_menu')
        </nav>	
		<div id="page-wrapper">
			<div class="header"> 
				<ol class="breadcrumb">
					<li><a href="home">Home</a></li>
					<li><a href="users">Users</a></li>
					<li><a href="users">managers</a></li>
					<li><a>manager name</a></li>
					<li><a>supervisors</a></li>
					<li><a>"supervisor name"</a></li>
					<li><a>Executives</a></li>
					<li class="active">"executive name"</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							executive name
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="profile-header-container">   
									<div class="profile-header-img">
										<img  class="img-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=100" >
									</div>
								</div> 
							</div><br>
							<div class="table-responsive">
								<table class=" table">
									<thead>
										<tr>
											<th>Firstname</th>
											<td></td>
										</tr>
										<tr>
											<th>Lastname</th>
											<td></td>
										</tr>
										<tr>
											<th>Email</th>
											<td></td>
										</tr>
										<tr>
											<th>Telephone</th>
											<td></td>
										</tr>
										<tr>
											<th>Mobile</th>
											<td></td>
										</tr>
										<tr>
											<th>Address</th>
											<td></td>
										</tr>
									</thead>
								</table>
							</div>
							<div class="span3">
								<a class="btn btn-primary btn-sm" href="edit_user">edit</a>
								<a class="btn btn-primary btn-sm">remove</a>
								<a class="btn btn-primary btn-sm">block</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Linked Customers
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table ">
									<thead>
										<tr>
											<th>Sl.no</th>
											<th>Customer</th> 
											<th>Contact</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td><a href="view_customer" class="btn btn-primary btn-sm">view</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Target History
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="col-lg-8">
							<div class="form-group" style="margin-top:25px;">
								<label>From:</label>
								<input type="text" id="datepicker" name="date" required="">
								<label>To:</label>
								<input type="text" id="datepicker" name="date" required="">
								<a class="btn btn-primary btn-sm">view</a>
							</div>
						</div>
						<div class="row">  
							<div class="col-lg-12">
								<div class="table-responsive">
									<table class="table ">
										<thead>
											<tr>
												<th>Sl.no</th>
												<th>Date</th> 
												<th>Target Amount</th>
												<th>Actual Sale</th>
												<th>Achievement %</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td><a class="btn btn-primary btn-sm">remove</a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
						<div class="panel panel-primary">
							<div class="panel-heading">
								Target Progress
							</div>
						</div>
						<div class="panel panel-default" style="margin-top:-15px;">
							<div class="panel-body">
							<div id="morris-bar-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="258.5333557128906" version="1.1" width="100%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.366667px; top: -0.666667px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="32.515625" y="326.06982421875" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.26513671875" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,326.06982421875H620.800048828125" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.515625" y="250.8023681640625" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.2633056640625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,250.8023681640625H620.800048828125" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.515625" y="175.534912109375" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.261474609375" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,175.534912109375H620.800048828125" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.515625" y="100.2674560546875" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.2596435546875" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,100.2674560546875H620.800048828125" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.515625" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.2578125" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#aaaaaa" d="M45.015625,25H620.800048828125" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="579.672589983259" y="338.56982421875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.3984)"><tspan dy="4.26513671875" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><text x="497.4176722935268" y="338.56982421875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.3984)"><tspan dy="4.26513671875" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan></text><text x="415.16275460379467" y="338.56982421875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.3984)"><tspan dy="4.26513671875" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan></text><text x="332.9078369140625" y="338.56982421875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.3984)"><tspan dy="4.26513671875" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan></text><text x="250.65291922433036" y="338.56982421875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.3984)"><tspan dy="4.26513671875" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan></text><text x="168.39800153459822" y="338.56982421875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.3984)"><tspan dy="4.26513671875" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2007</tspan></text><text x="86.14308384486607" y="338.56982421875" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.3984)"><tspan dy="4.26513671875" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2006</tspan></text><rect x="55.297489711216514" y="25" width="29.345594133649552" height="301.06982421875" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="87.64308384486607" y="55.10698242187499" width="29.345594133649552" height="270.962841796875" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="137.55240740094865" y="100.2674560546875" width="29.345594133649552" height="225.8023681640625" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="169.89800153459822" y="130.37443847656252" width="29.345594133649552" height="195.69538574218748" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="219.8073250906808" y="175.534912109375" width="29.345594133649552" height="150.534912109375" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="252.15291922433033" y="205.64189453125" width="29.345594133649552" height="120.42792968750001" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="302.062242780413" y="100.2674560546875" width="29.345594133649552" height="225.8023681640625" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="334.40783691406256" y="130.37443847656252" width="29.345594133649552" height="195.69538574218748" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="384.3171604701451" y="175.534912109375" width="29.345594133649552" height="150.534912109375" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="416.66275460379467" y="205.64189453125" width="29.345594133649552" height="120.42792968750001" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="466.5720781598772" y="100.2674560546875" width="29.345594133649552" height="225.8023681640625" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="498.9176722935268" y="130.37443847656252" width="29.345594133649552" height="195.69538574218748" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="548.8269958496094" y="25" width="29.345594133649552" height="301.06982421875" rx="0" ry="0" fill="#0b62a4" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="581.172589983259" y="55.10698242187499" width="29.345594133649552" height="270.962841796875" rx="0" ry="0" fill="#7a92a3" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg>
								<div class="morris-hover morris-default-style" style="left: 535.656px; top: 144px; display: none;"><div class="morris-hover-row-label">2012</div>
									<div class="morris-hover-point" style="color: #ff7e00">
										Series A:
										100
									</div>
									<div class="morris-hover-point" style="color: #7a92a3">
										Series B:
										90
									</div>
								</div>
							</div>
							</div>
						</div>
						<a class="btn btn-primary btn-xs">Export excel</a>
				</div>
				<div class="col-lg-5">
					<div class="panel panel-primary">
							<div class="panel-heading">
								Total Review
							</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table ">
									<thead>
										<tr>
											<th>Total Target Amount</th> 
											<td></td>
										</tr>
									</thead>	
										<tr>
											<th>Total Actual Sale</th>
											<td></td>
										</tr>
										<tr>
											<th>Total Achievement %</th>
											<td></td>
										</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    @include('partials.footer_scripts')
</body>
</html>		