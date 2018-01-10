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
					<li class="active">Manage Admin</li>
				</ol> 
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					Manage Admin
				</div>
			</div>
			<div class="panel panel-default" style="margin-top:-15px;">
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Account no.</th>
									<th>Admin</th> 
									<th>Payment</th>
									<th>Validity</th>
									<th>Status</th>
									<th>Details</th>
								</tr>
							</thead>
							<tbody>
								<tr>
    								<td></td>
    								<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><a href="view_admin" class="btn btn-primary btn-sm">view</a></td>
								</tr>
							</tbody>
						</table>   
					</div>
				</div>
			</div>
		</div> 
    </div>
    @include('partials.footer_scripts')
</body>
</html>		