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
					<li><a>"Customer name"</a></li>
					<li class="active"><a>Reports</a></li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							customer name
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<ul class="nav nav-pills">
								<li class="active"><a href="#quick" data-toggle="tab">Quick Report</a></li>
								<li><a href="#detailed" data-toggle="tab">Detailed Report</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="quick">
									<div class="row">
										<div class="col-lg-12"><br>
											<div class="panel-body">
												<div class="form-group" style="margin-top:25px;">
                                                    <label>From:
                                                    	<input type="text" class="datepicker" name="date" required="">
            										</label>
                                                    <label>To:
                                                    	<input type="text" class="datepicker" name="date" required="">
            										</label>
                                                    <a class="btn btn-primary btn-sm">view</a>
                                                </div>
												<div class="table-responsive">
													<table class="table ">
														<thead>
															<tr>
																<th>Sl.no</th>
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
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-5">
										<div class="panel panel-primary">
											<div class="panel-heading">
												Total Review
											</div>
										</div>
										<div class="panel panel-default" style="margin-top:-15px;">
											<div class="panel-body">
												<table class="table ">
													<tr>
														<th>Total Visits</th> 
														<td></td>
													</tr>
													<tr>
														<th>Total Sale Value</th>
														<td></td>
													</tr>
												</table>
											</div>
										</div>
										<button type="button" class="btn btn-default btn-xs" >Export excel</button>
									</div>
								</div>
								<div class="tab-pane fade" id="detailed">
									<div class="row">
										<div class="col-lg-12"><br>
											<div class="panel-body">
												<div class="form-group" style="margin-top:25px;">
                                                    <label>From:
                                                    	<input type="text" class="datepicker" name="date" required="">
            										</label>
                                                    <label>To:
                                                    	<input type="text" class="datepicker" name="date" required="">
            										</label>
                                                    <a class="btn btn-primary btn-sm">view</a>
                                                </div>
												<div class="table-responsive">
													<table class="table ">
														<thead>
															<tr>
																<th>Sl.no</th>
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
																<td><a class="btn btn-primary btn-sm">view</a></td>
																<td><a class="btn btn-default btn-sm">view</a></td>
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
										<div class="panel panel-primary">
											<div class="panel-heading">
												Total Review
											</div>
										</div>
										<div class="panel panel-default" style="margin-top:-15px;">
											<div class="panel-body">
												<table class="table ">
													<tr>
														<th>Total Visits</th> 
														<td></td>
													</tr>
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
										<button type="button" class="btn btn-default btn-xs" >Export excel</button>
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
		