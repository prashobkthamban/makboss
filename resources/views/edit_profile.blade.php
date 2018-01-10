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
					<li><a href="my_profile">My Profile</a></li>
					<li class="active">Edit Profile</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Edit Profile
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<div class="form-group">
								<label>Company name: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name=" " placeholder="enter Company name"  required>
							</div>	
							<div class="form-group" >
                                            <label>Company Type: </label>
                                            <select class="form-control" name="c_type" required>
										      <option  selected>Accounting</option>
										      <option >Airlines/Aviation</option>
										      <option >Alternative Dispute Resolution</option>
										      <option >Alternative Medicine</option>
										      <option >Animation</option>
										      <option >Apparel &amp; Fashion</option>
										      <option >Architecture &amp; Planning</option>
										      <option >Arts and Crafts</option>
										      <option >Automotive</option>
										      <option >Aviation &amp; Aerospace</option>
										      <option >Banking</option>
										      <option >Biotechnology</option>
										      <option >Broadcast Media</option>
										      <option >Building Materials</option>
										      <option >Business Supplies and Equipment</option>
										      <option >Capital Markets</option>
										      <option >Chemicals</option>
										      <option >Civic &amp; Social Organization</option>
										      <option >Civil Engineering</option>
										      <option >Commercial Real Estate</option>
										      <option >Computer &amp; Network Security</option>
										      <option >Computer Games</option>
										      <option >Computer Hardware</option>
										      <option >Computer Networking</option>
										      <option >Computer Software</option>
										      <option >Construction</option>
										      <option >Consumer Electronics</option>
										      <option >Consumer Goods</option>
										      <option >Consumer Services</option>
										      <option >Cosmetics</option>
										      <option >Dairy</option>
										      <option >Defense &amp; Space</option>
										      <option >Design</option>
										      <option >Education Management</option>
										      <option >E-Learning</option>
										      <option >Electrical/Electronic Manufacturing</option>
										      <option >Entertainment</option>
										      <option >Environmental Services</option>
										      <option >Events Services</option>
										      <option >Executive Office</option>
										      <option >Facilities Services</option>
										      <option >Farming</option>
										      <option >Financial Services</option>
										      <option >Fine Art</option>
										      <option >Fishery</option>
										      <option >Food &amp; Beverages</option>
										      <option >Food Production</option>
										      <option >Fund-Raising</option>
										      <option >Furniture</option>
										      <option >Gambling &amp; Casinos</option>
										      <option >Glass, Ceramics &amp; Concrete</option>
										      <option >Government Administration</option>
										      <option >Government Relations</option>
										      <option >Graphic Design</option>
										      <option >Health, Wellness and Fitness</option>
										      <option >Higher Education</option>
										      <option >Hospital &amp; Health Care</option>
										      <option >Hospitality</option>
										      <option >Human Resources</option>
										      <option >Import and Export</option>
										      <option >Individual &amp; Family Services</option>
										      <option >Industrial Automation</option>
										      <option >Information Services</option>
										      <option >Information Technology and Services</option>
										      <option >Insurance</option>
										      <option >International Affairs</option>
										      <option >International Trade and Development</option>
										      <option >Internet</option>
										      <option >Investment Banking</option>
										      <option >Investment Management</option>
										      <option >Judiciary</option>
										      <option >Law Enforcement</option>
										      <option >Law Practice</option>
										      <option >Legal Services</option>
										      <option >Legislative Office</option>
										      <option >Leisure, Travel &amp; Tourism</option>
										      <option >Libraries</option>
										      <option >Logistics and Supply Chain</option>
										      <option >Luxury Goods &amp; Jewelry</option>
										      <option >Machinery</option>
										      <option >Management Consulting</option>
										      <option >Maritime</option>
										      <option >Marketing and Advertising</option>
										      <option >Market Research</option>
										      <option >Mechanical or Industrial Engineering</option>
										      <option >Media Production</option>
										      <option >Medical Devices</option>
										      <option >Medical Practice</option>
										      <option >Mental Health Care</option>
										      <option >Military</option>
										      <option >Mining &amp; Metals</option>
										      <option >Motion Pictures and Film</option>
										      <option >Museums and Institutions</option>
										      <option >Music</option>
										      <option >Nanotechnology</option>
										      <option >Newspapers</option>
										      <option >Nonprofit Organization Management</option>
										      <option >Oil &amp; Energy</option>
										      <option >Online Media</option>
										      <option >Outsourcing/Offshoring</option>
										      <option >Package/Freight Delivery</option>
										      <option >Packaging and Containers</option>
										      <option >Paper &amp; Forest Products</option>
										      <option >Performing Arts</option>
										      <option >Pharmaceuticals</option>
										      <option >Philanthropy</option>
										      <option >Photography</option>
										      <option >Plastics</option>
										      <option >Political Organization</option>
										      <option >Primary/Secondary Education</option>
										      <option >Printing</option>
										      <option >Professional Training &amp; Coaching</option>
										      <option >Program Development</option>
										      <option >Public Policy</option>
										      <option >Public Relations and Communications</option>
										      <option >Public Safety</option>
										      <option >Publishing</option>
										      <option >Railroad Manufacture</option>
										      <option >Ranching</option>
										      <option >Real Estate</option>
										      <option >Recreational Facilities and Services</option>
										      <option >Religious Institutions</option>
										      <option >Renewables &amp; Environment</option>
										      <option >Research</option>
										      <option >Restaurants</option>
										      <option >Retail</option>
										      <option >Security and Investigations</option>
										      <option >Semiconductors</option>
										      <option >Shipbuilding</option>
										      <option >Sporting Goods</option>
										      <option >Sports</option>
										      <option >Staffing and Recruiting</option>
										      <option >Supermarkets</option>
										      <option >Telecommunications</option>
										      <option >Textiles</option>
										      <option >Think Tanks</option>
										      <option >Tobacco</option>
										      <option >Translation and Localization</option>
										      <option >Transportation/Trucking/Railroad</option>
										      <option >Utilities</option>
										      <option >Venture Capital &amp; Private Equity</option>
										      <option >Veterinary</option>
										      <option >Warehousing</option>
										      <option >Wholesale</option>
										      <option >Wine and Spirits</option>
										      <option >Wireless</option>
										      <option >Writing and Editing</option>
										      <option >Others</option>
                                            </select>
                            </div>	  
							<div class="form-group">
                        		<label>Website: </label>
                        		<input type="text" class="form-control" name=" " placeholder="enter website"  required>
                   			 </div>
                   			 <div class="form-group">
                                <label>Country: <span class="text-danger">*</span></label>
                                <select class="form-control">
                               		<option>United Arab Emirates</option>
                                </select>
                    		</div>
                            <div class="form-group">
                                <label>State: <span class="text-danger">*</span></label>
                                <select class="form-control">
                                	<option>Abudhabi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email: <span class="text-danger">*</span></label>  
                                <input type="email" class="form-control" name="" placeholder="enter email id" required>
                            </div>		  
                            <div class="form-group">
                                <label>Mobile: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  placeholder="enter mobile number" required>
                            </div>	
							<div class="form-group">
								<label>Address: </label> 
								<textarea  class="form-control" ></textarea>
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
		