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
					<li><a>Expense</a></li>
					<li class="active">Edit Expense</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Edit Expense
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="form-group">
    							<label>Date: <span class="text-danger">*</span></label><br>
    							<input type="text" class="datepicker" name="date" required>
    						</div>
							<div class="form-group">
								<label> Amount: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name=" " placeholder="enter amount" style="width:250px;" required>
							</div>
							<div class="form-group">
								<label>Photo</label>
								<input type="file">
							</div>
							<div class="form-group">
								<label>	Notes:</label> 
								<textarea class="form-control" style="height:100px;width:250px;"></textarea>
							</div>
							<div class="span3">
								<input class="btn btn-primary btn-sm" type="submit"  value="update">
								<a class="btn btn-default btn-sm" href="users">cancel</a>
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
		