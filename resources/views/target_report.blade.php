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
					<li> <a >Reports </a></li>
					<li class="active"> Target Report</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Target Report
						</div>
					</div>
    				<div class="panel panel-default" style="margin-top:-15px;">
    					<div class="panel-body">
    						<div class="col-lg-4">
								<div class="form-group">
									<label> Assigned To:</label>
									<select class="form-control">
										<option selected>All</option>
										<option>Only me</option>
										<option>Usernames</option>
									</select>
								</div>
							</div>
    						<div class="col-lg-4">		
    							<div class="form-group" >
                                    <label> Sort by:</label>
                                    <select class="form-control">
                                    <option selected="">Current</option>
    								<option>Last 5 Targets</option>
    								<option>Last 10 Targets</option>
    								<option>Last 25 Targets</option>
    								<option>Last 50 Targets</option>
    								<option>Last 100 Targets</option>
    								<option>View all</option>
                                    </select>
                                </div>
    						</div>
    						<div class="col-lg-1">
    							<button type="button" class="btn btn-primary btn-sm" style="margin-top: 25px">view</button>
    						</div><br>
    						<div class="row">  
    							<div class="col-lg-12">
    								<div class="table-responsive">
    									<table class="table ">
    										<thead>
    											<tr>
    												<th>Sl.no</th>
    												<th>Date</th> 
    												<th>Target Amount</th>
    												<th>Actual Sale</th>
    												<th>Achievement %</th>
    												<th></th>
    											</tr>
    										</thead>
    										<tbody>
    											<tr>
    												<td></td>
    												<td></td>
    												<td></td>
    												<td></td>
    												<td></td>
    												<td><a class="btn btn-primary btn-sm">remove</a></td>
    											</tr>
    										</tbody>
    									</table>
    								</div>
    							</div>
            					<div class="col-lg-7">
            						@include('partials.graph')
            					</div>
            					<div class="col-lg-5">
            						<div class="panel panel-primary" style="height:140px" >
    									<div class="panel-body">
                    						<table class=" table" >
                    							<thead>
                    							<tr>
                    								<th style="text-align:justify">Total Target Amount</th>
                    								<td style="text-align:justify"></td>
                    							</tr>
                    							</thead>
                    							<tr>
                    								<th style="text-align:justify">Tota Actual Sale</th>
                    								<td style="text-align:justify"></td>
                    							</tr>
                    							<tr>
                    								<th style="text-align:justify">Target Achievement in %</th>
                    								<td style="text-align:justify"></td>
                    							</tr>
                    						</table>
                    					</div>
                    				</div>			
            					</div>
    						</div>
    						<button type="button" class="btn btn-default btn-xs" >Export excel</button>
    					</div>
    				</div>
				</div>
			</div>
		</div>
	</div>
    @include('partials.footer_scripts')
</body>
</html>