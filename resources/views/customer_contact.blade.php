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
					<li><a href="customers">Customers</a></li>
					<li class="active">"customer name"</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							customer name
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
								<table class=" table" >
									<thead>
									<tr >
										<th style="text-align:justify">Assigned to</th>
										<td style="text-align:justify"></td>
									</tr>
									</thead>
									<tr>
										<th style="text-align:justify">Contact name</th>
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
										<th style="text-align:justify">Address</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify">Visit Schedule </th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify">Credit Limit</th>
										<td style="text-align:justify"></td>
									</tr>
									<tr>
										<th style="text-align:justify">Payment Terms</th>
										<td style="text-align:justify"></td>
									</tr>
								</table>
							<div class="span3">
								<a class="btn btn-primary btn-sm" href="edit_customer">edit</a>
								<a class="btn btn-default btn-sm">remove</a>
								<a class="btn btn-primary btn-sm">block</a>
								<a class="btn btn-primary btn-sm">unblock</a>
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
		