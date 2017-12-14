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
					<li><a>Reports</a></li>
					<li class="active">Visit Report</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Visit Report
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<ul class="nav nav-pills">
								<li class="active"><a href="#quick" data-toggle="tab">Quick Report</a></li>
								<li><a href="#detailed" data-toggle="tab">Detailed Report</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="quick"><br>
									<div class="panel-body">
										<div class="col-lg-12">
											<div class="col-lg-2">
												<div class="form-group">
													<label> Attended by:</label>
													<select class="form-control">
														<option selected>Usernames</option>
													</select>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label> Customer:</label>
													<select class="form-control">
														<option selected>customer names</option>
													</select>
												</div>
											</div>
											<div class="col-lg-7">
												<div class="form-group" style="margin-top:25px;">
													<label>From:</label>
													<input type="text" id="datepicker" name="date" required>
													<label>To:</label>
													<input type="text" id="datepicker" name="date" required>
													<a class="btn btn-primary btn-sm">view</a>
												</div>
											</div>
										</div>
										<div class="row">  
											<div class="col-lg-12">
												<div class="table-responsive">
													<table class="table ">
														<thead>
															<tr>
																<th>Sl.no</th>
																<th>Customer</th>
																<th>Visit Time</th> 
																<th>Sale Value</th>
																<th>Attended by</th>
																<th>Notes</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-5">
										<div class="panel panel-primary" style="height:100px;">
											<div class="panel-body">
												<div class="table-responsive">
													<table class="table ">
														<thead>
															<tr>
																<th>Total Visits</th> 
																<td></td>
															</tr>
														</thead>	
															<tr>
																<th>Total Sale Value</th>
																<td></td>
															</tr>
													</table>
												</div>
											</div>
										</div>
										<a class="btn btn-primary btn-xs">Export excel</a>
									</div>
								</div>
								<div class="tab-pane fade" id="detailed"><br>
									<div class="panel-body">
										<div class="col-lg-12">
											<div class="col-lg-2">
												<div class="form-group">
													<label> Attended by:</label>
													<select class="form-control">
														<option selected>Usernames</option>
													</select>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label> Customer:</label>
													<select class="form-control">
														<option selected>customer names</option>
													</select>
												</div>
											</div>
											<div class="col-lg-7">
												<div class="form-group" style="margin-top:25px;">
													<label>From:</label>
													<input type="text" id="datepicker" name="date" required>
													<label>To:</label>
													<input type="text" id="datepicker" name="date" required>
													<a class="btn btn-primary btn-sm">view</a>
												</div>
											</div>
										</div>
										<div class="row">  
											<div class="col-lg-12">
												<div class="table-responsive">
													<table class="table ">
														<thead>
															<tr>
																<th>Sl.no</th>
																<th>Customer</th>
																<th>Visit Time</th> 
																<th>Sale Value</th>
																<th>Collection</th>
																<th>Location</th>
																<th>Photos</th>
																<th>Attended by</th>
																<th>Notes</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td><a class="btn btn-primary btn-xs">view</a></td>
																<td><a class="btn btn-primary btn-xs">view</a></td>
																<td></td>
																<td></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-5">
										<div class="panel panel-primary" style="height:130px;">
											<div class="panel-body">
												<div class="table-responsive">
													<table class="table ">
														<thead>
															<tr>
																<th>Total Visits</th> 
																<td></td>
															</tr>
														</thead>	
															<tr>
																<th>Total Sale Value</th>
																<td></td>
															</tr>
															<tr>
																<th>Total Collection</th>
																<td></td>
															</tr>
													</table>
												</div>
											</div>
										</div>
										<a class="btn btn-primary btn-xs">Export excel</a>
									</div>
								</div>
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