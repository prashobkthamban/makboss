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
					<li class="active"> Customers</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-8">
					<a href="create_customer" class="btn btn-primary ">Create Customer</a>
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-9">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Customers
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
											<th>Assigned To</th>
											<th>Contact</th>
											<th>Activity</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td><a href="customer_contact" class="btn btn-primary btn-xs">view</a></td>
											<td><a href="customer_activity" class="btn btn-primary btn-xs">run report</a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<a class="btn btn-primary btn-xs">Export excel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@include('partials.footer_scripts')
</body>
</html>
