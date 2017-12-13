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
					<li><a href="customers">Customers</a></li>
					<li><a>"Customer name"</a></li>
					<li class="active">Edit Customer</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
					    	Edit Customer
					    </div>
		            </div>
		            <div class="panel panel-default" style="margin-top:-15px;">
				  		<div class="panel-body">
		                	<div class="col-lg-5">
				  				<div class="form-group">
		                        	<label>Assign To: <span class="text-danger">*</span></label>
		                            <select class="form-control">
		                                <option>users</option>
		                            </select>
		                        </div>
								<div class="form-group">
		                        	<label>Company name: <span class="text-danger">*</span></label>
		                            <input type="text" class="form-control" name=" " placeholder="enter company name"  required>
		                        </div>
		                        <div class="form-group">
		                            <label>Contact name: <span class="text-danger">*</span></label>
		                            <input type="text" class="form-control" name=" " placeholder="enter contact name"  required>
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
		                            <label>Select Country: <span class="text-danger">*</span></label>
		                            	<select class="form-control">
		                            		<option>United Arab Emirates</option>
		                                </select>
		                        </div>
		                        <div class="form-group">
		                            <label>Select State: <span class="text-danger">*</span></label>
		                            	<select class="form-control">
		                                	<option>Abudhabi</option>
		                                </select>
		                   		</div>
		                    </div>  
		                   	<div class="col-lg-1"></div>
		                    <div class="col-lg-5">
								<div class="form-group">
									<label>	Address: <span class="text-danger">*</span></label> 
									<textarea class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label>	Schedule:</label>
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
								<div class="form-group">
				                    <label>Credit Limit: <span class="text-danger">*</span></label>  
					                <input type="email" class="form-control" name="" placeholder="enter credit limit" required>
			                    </div>
								<div class="form-group">
			                        <label>Payment Terms: <span class="text-danger">*</span></label>
			                        <select class="form-control">
			                        	<option>Cash</option>
			                        </select>
		                        </div>
								<div class="span3">
									<input class="btn btn-primary btn-sm" type="submit" value="update">
									<a class="btn btn-primary btn-sm" href="customers">cancel</a>
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