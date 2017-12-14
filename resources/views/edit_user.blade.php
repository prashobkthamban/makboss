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
					<li><a>Users</a></li>
					<li class="active">Edit User</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Edit User
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="form-group">
								<label>First name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name=" " placeholder="enter firstname"  required>
							</div>		  
							<div class="form-group">
								<label>Last name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="" placeholder="enter lastname"  required>
							</div>		
							<div class="form-group">
								<label>Email: <span class="text-danger">*</span></label>  
								<input type="email" class="form-control" name="" placeholder="enter email id" required>
							</div>		  
							<div class="form-group">
								<label>Telephone: </label>
								<input type="text" class="form-control"  placeholder="enter telephone number"  required>
							</div>		
							<div class="form-group">
								<label>Mobile: <span class="text-danger">*</span></label>
								<input type="text" class="form-control"  placeholder="enter mobile number" required>
							</div>		
							<div class="form-group">
								<label>Address: <span class="text-danger">*</span></label> 
								<textarea  class="form-control" ></textarea>
							</div>
							<div class="form-group">			
								<label>Profile Pic</label>
								<input type="file">
							</div>
							<div class="span3">
								<input class="btn btn-primary btn-sm" type="submit"  value="update">
								<a class="btn btn-primary btn-sm" href="users">cancel</a>
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
		