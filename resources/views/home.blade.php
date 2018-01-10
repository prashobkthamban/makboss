<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Makboss | Home</title>
	@include('partials.header_files')
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top"  role="navigation">
        	@include('partials.header')
        	@include('partials.side_menu')
        </nav>
		<div id="page-wrapper">
			<div class="row" >
				<div class="col-lg-6 " style="margin-top:-15px;">
					<div class="panel panel-primary" >
						<div class="panel-body"  style="text-align:center">
							<div class="col-lg-4 " >
								<h5>Today Visits</h5>
								<h3>5</h3>
							</div>
							<div class="col-lg-4 " >
								<h5>Today Sale</h5>
								<h3>5</h3>
							</div>
							<div class="col-lg-4 " >
								<h5>Today Payment</h5>
								<h3>5</h3>
							</div>
						</div>
					</div>
					<div class="panel panel-primary" style="margin-top:-15px;">
						<div class="panel-body"  style="text-align:center">
							<div class="col-lg-4 " >
								<h5>December Visits</h5>
								<h3>5</h3>
							</div>
							<div class="col-lg-4" >
								<h5>December Sale</h5>
								<h3>5</h3>
							</div>
							<div class="col-lg-4" >
								<h5>December Payment</h5>
								<h3>5</h3>
							</div>
						</div>
					</div>
					<div class="panel panel-primary" style="margin-top:20px;">
						<div class="panel-heading">
							Target Live
						</div>
					</div>
					<div class="panel panel-primary" style="margin-top:-15px;" >
						<div class="panel-body">
							@include('partials.graph')<br><br><br>
							<table class="table ">
								<tr>
									<th>Total Target Amount</th> 
									<td></td>
								</tr>
								<tr>
									<th>Total Actual Sale</th>
									<td></td>
								</tr>
								<tr>
									<th>Total Achievement %</th>
									<td></td>
								</tr>
							</table>
						</div>
					</div>	
				</div>	
				<div class="col-lg-6 "style="margin-top:-16px;">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Notifications Live
						</div>
					</div>
					<div class="panel panel-primary" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="list-group">
								<a href="#" class="list-group-item">
									<i class="fa fa-comment fa-fw"></i> New Comment
									<span class="pull-right text-muted small"><em>4 minutes ago</em></span>
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-comment fa-fw"></i> New Comment
									<span class="pull-right text-muted small"><em>4 minutes ago</em></span>
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-comment fa-fw"></i> New Comment
									<span class="pull-right text-muted small"><em>4 minutes ago</em></span>
								</a><a href="#" class="list-group-item">
									<i class="fa fa-comment fa-fw"></i> New Comment
									<span class="pull-right text-muted small"><em>4 minutes ago</em></span>
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-comment fa-fw"></i> New Comment
									<span class="pull-right text-muted small"><em>4 minutes ago</em></span>
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-comment fa-fw"></i> New Comment
									<span class="pull-right text-muted small"><em>4 minutes ago</em></span>
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-comment fa-fw"></i> New Comment
									<span class="pull-right text-muted small"><em>4 minutes ago</em></span>
								</a>
							</div>
							<a href="notifications" class="btn btn-primary ">view all notifications</a>
						</div>
					</div>
					<div class="panel panel-primary" style="margin-top:20px;">
						<div class="panel-heading">
							Location Live
						</div>
					</div>
					<div class="panel panel-primary" style="margin-top:-15px;">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2646.216225729443!2d-89.2391164!3d48.45238070000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4d5921616d61c26b%3A0x15e5407d2071c8dd!2s109+Hogarth+St%2C+Thunder+Bay%2C+ON+P7A+7G8!5e0!3m2!1sen!2sca!4v1424371524427" width="100%" height="300px"  style="border:0"></iframe>
					</div>
				</div>	
				<div class="col-lg-6 " >
					<div class="panel panel-primary">
						<div class="panel-heading">
							Users
						</div>
					</div>
					<div class="panel panel-primary" style="margin-top:-15px;" >
						<div class="panel-body"  style="text-align:center">
							<div class="col-lg-3 " >
								<div class="profile-header-img">
									<img  class="img-circle" src="public/images/image1.jpg" >
								</div>
								<a>Username</a>
							</div>
							<div class="col-lg-3 " >
								<div class="profile-header-img">
									<img  class="img-circle" src="public/images/image1.jpg" >
								</div>
								<a>Username</a>
							</div>
							<div class="col-lg-3 " >
								<div class="profile-header-img">
									<img  class="img-circle" src="public/images/image1.jpg" >
								</div>
								<a>Username</a>
							</div>
							<div class="col-lg-3 " >
								<div class="profile-header-img">
									<img  class="img-circle" src="public/images/image1.jpg" >
								</div>
								<a>Username</a>
							</div>
							<a href="users" class="btn btn-default btn-xs " style="float:right;margin-top: 10px;cursor:pointer">view all</a>
						</div>
					</div> 
				</div>
			</div>
		</div>
    </div>
    @include('partials.footer_scripts')
</body>
</html>
