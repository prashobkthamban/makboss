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
					<li class="active">Schedule</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							View Schedule
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
								<ul class="nav nav-pills">
									<li class="active"><a href="#scheduled" data-toggle="tab">Scheduled Visits</a></li>
									<li><a href="#pending" data-toggle="tab">Pending Visits</a></li>
									<li><a href="#closed" data-toggle="tab">Closed Visits</a></li>
								</ul>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="scheduled">
									<div class="row">
										<div class="col-lg-12"><br>
											<div class="panel-body">
    											<div class="col-lg-3">
    												<div class="form-group">
                                                        <label> Assigned To:</label>
                                                        <select class="form-control">
                                                        <option selected>All</option>
                                                        <option >Only me</option>
                                                        <option >usernames</option>
                                                        </select>
                                                    </div>
                                                 </div>   
                                                 <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label> Customer:</label>
                                                        <select class="form-control">
                                                        <option selected="">customer names</option>
                                                        </select>
                                                    </div>
                                                 </div> 
                                                 <div class="col-lg-6">
                                                    <div class="form-group" style="margin-top:25px;">
                                                        <label>From:
                                                        	<input type="text" class="datepicker" name="date" required="">
														</label>
                                                        <label>To:
                                                        	<input type="text" class="datepicker" name="date" required="">
														</label>
                                                        <a class="btn btn-primary btn-sm">view</a>
                                                    </div>
                                                 </div> 
                                              </div> 
                                                <div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th>Sl.no</th>
																<th>Customer</th> 
																<th>Schedule Date</th>
																<th>Address</th>
																<th>Assigned To</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td><a href="checkin" class="btn btn-primary btn-xs">checkin</a></td>
																<td><a class="btn btn-default btn-xs">remove</a></td>
															</tr>
														</tbody>
													</table>
												</div>
												<button type="button" class="btn btn-default btn-xs" >Export excel</button>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="pending">
									<div class="row">
										<div class="col-lg-12"><br>
											<div class="panel-body">
    											<div class="col-lg-3">
    												<div class="form-group">
                                                        <label> Assigned To:</label>
                                                        <select class="form-control">
                                                        <option selected>All</option>
                                                        <option >Only me</option>
                                                        <option >usernames</option>
                                                        </select>
                                                    </div>
                                                 </div>   
                                                 <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label> Customer:</label>
                                                        <select class="form-control">
                                                        <option selected="">customer names</option>
                                                        </select>
                                                    </div>
                                                 </div> 
                                                 <div class="col-lg-6">
                                                    <div class="form-group" style="margin-top:25px;">
                                                        <label>From:
                                                        	<input type="text" class="datepicker" name="date" required="">
														</label>
                                                        <label>To:
                                                        	<input type="text" class="datepicker" name="date" required="">
														</label>
                                                        <a class="btn btn-primary btn-sm">view</a>
                                                    </div>
                                                 </div> 
                                              </div> 
                                                <div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th>Sl.no</th>
																<th>Customer</th> 
																<th>Schedule Date</th>
																<th>Address</th>
																<th>Assigned To</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td><a href="checkin" class="btn btn-primary btn-xs">checkin</a></td>
																<td><a class="btn btn-default btn-xs">remove</a></td>
															</tr>
														</tbody>
													</table>
												</div>
												<button type="button" class="btn btn-default btn-xs" >Export excel</button>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="closed">
									<div class="row">
										<div class="col-lg-12"><br>
											<div class="panel-body">
    											<div class="col-lg-3">
    												<div class="form-group">
                                                        <label> Assigned To:</label>
                                                        <select class="form-control">
                                                        <option selected>All</option>
                                                        <option >Only me</option>
                                                        <option >usernames</option>
                                                        </select>
                                                    </div>
                                                 </div>   
                                                 <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label> Customer:</label>
                                                        <select class="form-control">
                                                        <option selected="">customer names</option>
                                                        </select>
                                                    </div>
                                                 </div> 
                                                 <div class="col-lg-6">
                                                    <div class="form-group" style="margin-top:25px;">
                                                        <label>From:
                                                        	<input type="text" class="datepicker" name="date" required="">
														</label>
                                                        <label>To:
                                                        	<input type="text" class="datepicker" name="date" required="">
														</label>
                                                        <a class="btn btn-primary btn-sm">view</a>
                                                    </div>
                                                 </div> 
                                              </div> 
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th>Sl.no</th>
															<th>Customer</th> 
															<th>Schedule Date</th>
															<th>Attended by</th>
															<th>Report</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td><a href="view_closed_report" class="btn btn-primary btn-xs">view</a></td>
														</tr>
													</tbody>
												</table>
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
	</div>
@include('partials.footer_scripts')
</body>
</html>
