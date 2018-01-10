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
					<li><a href="manage_admin">Manage Admin</a></li>
					<li class="active">admin name</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							 Admin Profile
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
								<table class=" table">
									<tr>
										<th>Account no.</th>
										<td></td>
									</tr>
									<tr>
										<th>Company Name</th>
										<td></td>
									</tr>
									<tr>
										<th>Company Type</th>
										<td></td>
									</tr>
									<tr>
										<th> Website</th>
										<td></td>
									</tr>
									<tr>
										<th> Applicant name</th>
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
										<th>Country</th>
										<td></td>
									</tr>
									<tr>
										<th>State</th>
										<td></td>
									</tr>
									<tr>
										<th>Address</th>
										<td></td>
									</tr>
									<tr>
										<th>Profile Created on</th>
										<td></td>
									</tr>
									<tr>
										<th>Last Profile updated on</th>
										<td></td>
									</tr>
								</table>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							 User Information
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
								<table class=" table">
									<tr>
										<th>Users Quota</th>
										<td></td>
									</tr>
									<tr>
										<th>Users Occupied</th>
										<td></td>
									</tr>
									<tr>
										<th>Users Balance</th>
										<td></td>
									</tr>
									<tr>
										<th>Users Quota Last updated on</th>
										<td></td>
									</tr>
									<tr>
										<th>Last User added on</th>
										<td></td>
									</tr>
									<tr>
										<th>Last User removed on</th>
										<td></td>
									</tr>
								</table>
								<a class="btn btn-default btn-xs" style="float:right">view more</a>
						</div>
					</div>
				</div>
			</div>  
		</div>
	</div>
    @include('partials.footer_scripts')
</body>
</html>
		