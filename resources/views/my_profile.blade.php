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
					<li class="active">Profile</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							 Profile
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							 <div class="profile-header-container" style=" margin: 0 auto;text-align: center;">   
                        		<div class="profile-header-img">
                                    <img class="img-circle" src="public/images/image1.jpg" />
                                </div>
                            </div><br>
								<table class=" table ">
									<thead>
									<tr>
										<th style="text-align:justify">Company Name</th>
										<td style="text-align:justify"></td>
									</tr>
									</thead>
									<tr>
										<th style="text-align:justify">Company Type</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify"> Website</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify"> Firstname</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify"> Lastname</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify">Email</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify">Telephone</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify">Mobile</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify">Country</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify">State</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify">Address</th>
										<td style="text-align:justify"</td>
									</tr>
								</table>
						</div>
					</div>
				</div>
			</div>  
			<div class="row">
    			<div class="col-lg-5">
        			<a href="change_password" class="btn btn-primary btn-sm">Change Password</a>
        			<a href="edit_profile" class="btn btn-default btn-sm">Edit Profile</a>
    			</div>  
			</div> 	
		</div>
	</div>
    @include('partials.footer_scripts')
</body>
</html>
		