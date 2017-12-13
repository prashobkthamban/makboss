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
					<li class="active">My Profile</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							My Profile
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="container">
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="profile-header-container">   
									<div class="profile-header-img" >
										<img style="margin-left:-35px;" class="img-circle" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=100" />
									</div>
								</div> 
							</div>
							</div><br>
							<div class="table-responsive table-hover">
								<table class=" table">
									<thead>
										<tr>
											<th>Company Name</th>
											<td></td>
										</tr>
									</thead>	
										<tr>
											<th>Company Type</th>
											<td></td>
										</tr>
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
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>  
			<div class="row">
			<div class="col-lg-5">
			<a href="change_password" class="btn btn-primary btn-sm">Change Password</a>
			</div>  
			</div> 	
		</div>
	</div>
    @include('partials.footer_scripts')
</body>
</html>
		