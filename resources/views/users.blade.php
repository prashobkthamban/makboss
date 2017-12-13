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
					<li class="active">Users</li>
				</ol> 
			</div> 	
			<div class="row">
				<div class="col-lg-8">
					<a href="create_user" class="btn btn-primary ">Create User</a>
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-7">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Users
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<ul class="nav nav-pills">
								<li class="active"><a href="#managers" data-toggle="tab" aria-expanded="true">Managers</a> </li>
								<li class=""><a href="#supervisors" data-toggle="tab" aria-expanded="true">Supervisors</a> </li>
								<li class=""><a href="#executives" data-toggle="tab" aria-expanded="false">Executives</a> </li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="managers"><br>
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Sl.no</th>
													<th>Manager</th> 
													<th>Details</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td></td>
													<td></td>
													<td><a href="view_manager" class="btn btn-primary btn-xs">view</a></td>
													</tr>
											</tbody>
										</table>   
									</div>
									<a class="btn btn-primary btn-xs">Export excel</a>
								</div>
								<div class="tab-pane fade " id="supervisors"><br>
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Sl.no</th>
													<th>Supervisor</th> 
													<th>Under</th>
													<th>Details</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td><a href="view_supervisor" class="btn btn-primary btn-xs">view</a></td>
												</tr>
											</tbody>
										</table>   
									</div>
									<a class="btn btn-primary btn-xs">Export excel</a>
								</div>
								<div class="tab-pane fade" id="executives">
									<div class="table-responsive"><br>
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Sl.no</th>
													<th>Executive</th> 
													<th>Under</th>
													<th>Details</th>
												</tr>
											</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td><a href="view_executive" class="btn btn-primary btn-xs">view</a></td>
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
		</div>
    </div>
    @include('partials.footer_scripts')
</body>
</html>
