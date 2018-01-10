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
					<li><a href="view_schedule">Schedule</a></li>
					<li><a>Closed Visits</a></li>
					<li class="active">View Report</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
						Report
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
								<table class=" table">
										<tr>
											<th>Customer</th>
											<td></td>
										</tr>
										<tr>
											<th>Visit Time</th>
											<td></td>
										</tr>
										<tr>
											<th>Sale Value</th>
											<td></td>
										</tr>
										<tr>
											<th>Collection</th>
											<td></td>
										</tr>
										<tr>
											<th>Location</th>
											<td><a class="btn btn-primary btn-xs">view</a></td>
										</tr>
										<tr>
											<th>Photos</th>
											<td><a class="btn btn-default btn-xs">view</a></td>
										</tr>
										<tr>
											<th>Attended by</th>
											<td></td>
										</tr>
										<tr>
											<th>Notes</th>
											<td></td>
										</tr>
								</table>	
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    @include('partials.footer_scripts')
</body>
</html>
		