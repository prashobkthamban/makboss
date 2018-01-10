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
					<li class="active">Track Location</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Track Location
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<ul class="nav nav-pills">
								<li class="active"><a href="#user" data-toggle="tab">User Location</a></li>
								<li><a href="#customer" data-toggle="tab">Customer Location</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="user">
									<div class="row">
										<div class="col-lg-12"><br>
											<div class="col-lg-4">		
                    							<div class="form-group" >
                                                    <label> Select User:</label>
                                                    <select class="form-control">
                        								<option selected>View all</option>
                        								<option>usernames</option>
                                                    </select>
                                                </div>
                    						</div>
                    						<div class="col-lg-1">
                    							<button type="button" class="btn btn-primary btn-sm" style="margin-top: 25px">locate</button>
                    						</div><br>
											<div class="panel-body">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2646.216225729443!2d-89.2391164!3d48.45238070000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4d5921616d61c26b%3A0x15e5407d2071c8dd!2s109+Hogarth+St%2C+Thunder+Bay%2C+ON+P7A+7G8!5e0!3m2!1sen!2sca!4v1424371524427" width="100%" height="450" style="border:0"></iframe>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="customer">
									<div class="row">
										<div class="col-lg-12"><br>
											<div class="col-lg-4">		
                    							<div class="form-group" >
                                                    <label> Select Customer:</label>
                                                    <select class="form-control">
                        								<option selected>View all</option>
                        								<option>customernames</option>
                                                    </select>
                                                </div>
                    						</div>
                    						<div class="col-lg-1">
                    							<button type="button" class="btn btn-primary btn-sm" style="margin-top: 25px">locate</button>
                    						</div><br>
											<div class="panel-body">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2646.216225729443!2d-89.2391164!3d48.45238070000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4d5921616d61c26b%3A0x15e5407d2071c8dd!2s109+Hogarth+St%2C+Thunder+Bay%2C+ON+P7A+7G8!5e0!3m2!1sen!2sca!4v1424371524427" width="100%" height="450" style="border:0"></iframe>
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
		