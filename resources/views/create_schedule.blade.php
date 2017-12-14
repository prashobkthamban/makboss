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
					<li><a href="index.php">Home</a></li>
					<li><a>Schedule</a></li>
					<li class="active">Create Schedule</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Create Schedule
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
				<div class="panel-body">
					<ul class="nav nav-pills">
						<li class="active"><a href="#manual" data-toggle="tab">Manual Schedule</a></li>
						<li><a href="#auto" data-toggle="tab">Auto Schedule</a></li>
		
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="manual">
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-6"><br>
									<div class="form-group">
										<label>Starting Date: <span class="text-danger">*</span></label>
										<input type="text" id="datepicker" name="date" required>
									</div> 
									<div class="form-group">
										<label>Ending Date: <span class="text-danger">*</span></label>
										<input type="text" id="datepicker" name="date" required>
									</div> 
									<div class="form-group">
										<label>Assign to: <span class="text-danger">*</span></label>
										<select class="form-control">
											<option>username</option>
										</select>
									</div>
									<div class="form-group">
										<label>Select Customer: <span class="text-danger">*</span></label>
										<select class="form-control">
											<option>customer name</option>
										</select>
									</div>
									<div class="form-group">
										<label>	Description of work order:</label> 
										<textarea class="form-control" style="height:150px;width:250px;"></textarea>
											</div>
											<div class="span3">
												<input class="btn btn-primary btn-sm" type="submit" value="create">
												<a class="btn btn-primary btn-sm" href="index.php">cancel</a>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="auto">
									<div class="row">
										<div class="col-lg-2"></div>
										<div class="col-lg-6"><br>
											<div class="form-group">
												<label>Assign To: <span class="text-danger">*</span></label>
												<select class="form-control">
													<option>username</option>
												</select>
											</div>
											<div class="form-group">
												<label>Select Customer: <span class="text-danger">*</span></label>
												<select class="form-control">
													<option>customername</option>
												</select>
											</div>
											<div class="form-group">
												<label>	Schedule: <span class="text-danger">*</span></label>
												<b>every</b> 
												<div class="dropdown"> 
													<div class="mutliSelect">
														<ul>
															<li><input type="checkbox" />Sunday</li>
															<li><input type="checkbox"  />Monday</li>
															<li><input type="checkbox" />Tuesday</li>
															<li> <input type="checkbox"  />Wednesday</li>
															<li><input type="checkbox" />Thursday</li>
															<li><input type="checkbox" />Friday</li>
															<li><input type="checkbox" />Saturday</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="span3">
												<input class="btn btn-primary btn-sm" type="submit" value="create">
												<a class="btn btn-primary btn-sm" href="index.php">cancel</a>
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
	</div>
@include('partials.footer_scripts')
</body>
</html>
		