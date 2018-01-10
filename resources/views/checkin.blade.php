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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        	@include('partials.header')
        	@include('partials.side_menu')
        </nav>
		<div id="page-wrapper">
			<div class="header"> 
				<ol class="breadcrumb">
					<li><a href="home">Home</a></li>
					<li><a href="view_schedule">Schedule</a></li>
					<li class="active">Checkin</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Checkin
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="col-lg-8"> 
								<div class="form-group">
									<label>Sale Value :</label>
									<input type="text" class="form-control" name=" " placeholder="enter  amount"  required>
								</div>
								<div class="form-group">
									<label>Collection :</label>
									<input type="text" class="form-control" name=" " placeholder="enter  amount"  required>
								</div>
								<div class="form-group">
        							<label>Photos</label>
        							<input type="file">
        						</div>
								<div class="form-group">
									<label>Notes :</label> 
									<textarea class="form-control" style="height:100px;width:250px;"></textarea>
								</div>
								<div class="span3">
									<input class="btn btn-primary btn-sm" type="submit" value="checkout">
									<a class="btn btn-default btn-sm" href="home">cancel</a>
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