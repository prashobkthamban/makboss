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
					<li class="active"> Expense Report</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Expense Report
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="col-lg-12">
								<div class="col-lg-3">
									<div class="form-group">
										<label> Created by:</label>
										<select class="form-control">
											<option selected>Usernames</option>
										</select>
									</div>
								</div>
								<div class="col-lg-8">
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
													<th>Created by</th>
													<th>Date</th> 
													<th>Amount</th>
													<th>Photo</th>
													<th>Notes</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td><a class="btn btn-primary btn-xs">view</a></td>
													<td></td>
													<td><a href="edit_expense" class="btn btn-primary btn-xs">edit</a></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="panel panel-primary">
										<div class="panel-heading">
											Total Expense : 123455
										</div>
									</div>
								</div>
							</div><a class="btn btn-primary btn-xs">Export excel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
   </div>
    @include('partials.footer_scripts')
</body>
</html>