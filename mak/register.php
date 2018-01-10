<!doctype html>
<html lang="en">
<head>
<title>MAKBOSS</title>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Mobland - Mobile App Landing Page Template">
<meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

<!-- Font -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Themify Icons -->
<link rel="stylesheet" href="css/themify-icons.css">

<!-- Owl carousel -->
<link rel="stylesheet" href="css/owl.carousel.min.css">

<!-- Main css -->
<link href="css/style.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
body{
color:#666;
}
</style>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="30">
<!-- Navbar-->
	<div class="nav-menu fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-dark navbar-expand-lg">
						<a class="navbar-brand" href="index.php">
							<img src="images/logo.png" class="img-fluid" alt="logo">
						</a> 
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbar">
							<ul class="navbar-nav ml-auto" >
								<li class="nav-item" style="margin-top:5px"> 
									<a class="nav-link active" href="index.php">HOME <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item" style="margin-top:5px"> 
									<a class="nav-link" href="index.php#features">FEATURES</a>
								</li>
								<li class="nav-item" style="margin-top:5px">
									<a class="nav-link" href="index.php#pricing">PRICING</a>
								</li>
								<li class="nav-item" style="margin-top:5px"> 
									<a class="nav-link" href="index.php#gallery">GALLERY</a>
								</li>
								<li class="nav-item" style="margin-top:5px"> 
									<a class="nav-link" href="#contact">CONTACT</a>
								</li>
								<li class="nav-item"style="margin-top:5px">
									<a href="login.php" style="background-color: #ff4500;color: #fff;border-color:#ff4500;border-radius: 5px;" class="btn btn-outline-light " >Login</a>
								</li>
								<li class="nav-item" style="margin-left:10px;margin-top:5px">
									<a href="register.php" style="background-color: #fff;color: #ff4500;border-color:#ff4500;border-radius: 5px;" class="btn btn-outline-light ">Register</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>

<!-- register-->   
    <div class="section"  style="background-color:#ffffff">
        <div class="container" >
            <div class="section-title">
            	<h3>REGISTER</h3>
            </div>
            <div class="row" >
                <div class="col-lg-5">
                    <div class="form-group">
                        <label style="color:#ff4500">Company name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name=" " placeholder="enter company name"  required>
                    </div>
                    <div class="form-group">
                        <label style="color:#ff4500">Applicant name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name=" " placeholder="enter applicant name"  required>
                    </div>
                    <div class="form-group">
                        <label style="color:#ff4500">Website: </label>
                        <input type="text" class="form-control" name=" " placeholder="enter website"  required>
                    </div>
                    <div class="form-group">
                        <label style="color:#ff4500">Country: <span class="text-danger">*</span></label>
                        <select class="form-control">
                       		<option>United Arab Emirates</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="color:#ff4500">State: <span class="text-danger">*</span></label>
                        <select class="form-control">
                        	<option>Abudhabi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="color:#ff4500">Email: <span class="text-danger">*</span></label>  
                        <input type="email" class="form-control" name="" placeholder="enter email id" required>
                    </div>		  
                    <div class="form-group">
                        <label style="color:#ff4500">Mobile: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  placeholder="enter mobile number" required>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline" style="color:#ff4500">
                        	<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked="">Free Trial 14 days
                    	</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    	<label class="radio-inline" style="color:#ff4500">
                    		<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">Pay
                    	</label>
                    </div>
                    <input type="checkbox" id="chkAgree" onclick="goFurther()" style="color:#666">&nbsp&nbsp&nbsp&nbspI Agree to the <a href="terms.php" style="color:#666"> Terms of Service</a> and <a href="privacy.php"  style="color:#666"> Privacy Policy</a><br><br>
                    <input type="button" id="btnSubmit" value="Submit" style="background-color: #ff4500;color: #fff;border-color:#ff4500;border-radius: 5px;" class="btn btn-outline-light " disabled>
                    <a href="index.php" style="background-color: #fff;color: #ff4500;border-color:#ff4500;border-radius: 5px;" class="btn btn-outline-light ">cancel</a> 		
                </div> 
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                	<img src="images/icon14.png" class="img-responsive" alt="Responsive image">
                </div>  
            </div>  
        </div>
    </div>
    
<!-- contact -->
	<div class="section" id="contact" style="margin-bottom:-90px;background-color:#192131">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h3 style="color:#666">CONTACT</h3>
					</div>
				</div>
				<div class="col-sm-4 contact-info" >
					<p class="st-address"><i class="fa fa-map-marker"></i> <strong style="color:#666" >Asia </strong></p>
					<p class="st-phone"><i class="fa fa-home"></i> <strong style="font-weight: normal">Office in United Arab Emirates</strong></p>
					<p class="st-phone"><i class="fa fa-mobile"></i> <strong style="font-weight: normal">Contact : </strong>  +971555285495</p>
					<p class="st-email"><i class="fa fa-envelope-o"></i> <strong style="font-weight: normal">Technical support : Support@makboss.com</strong></p>
					<p class="st-email"><i class="fa fa-envelope-o"></i> <strong style="font-weight: normal">Enquiries : Sales@makboss.com</strong></p>
				</div>
				<div class="col-sm-4 contact-info" >
					<p class="st-address"><i class="fa fa-map-marker"></i> <strong  style="color:#666" >Austrailia </strong></p>
					<p class="st-phone"><i class="fa fa-home"></i> <strong style="font-weight: normal">Office in Sydney</strong></p>
					<p class="st-phone"><i class="fa fa-mobile"></i> <strong style="font-weight: normal">Contact : </strong> +61 404 924 811</p>
					<p class="st-email"><i class="fa fa-envelope-o"></i> <strong style="font-weight: normal">Technical support : Support@makboss.com</strong></p>
					<p class="st-email"><i class="fa fa-envelope-o"></i> <strong style="font-weight: normal">Enquiries : Sales@makboss.com</strong></p>
				</div>
				<div class="col-sm-4 contact-info" >
					<p class="st-address"><i class="fa fa-map-marker"></i> <strong  style="color:#666" >Europe </strong></p>
					<p class="st-address"><i class="fa fa-map-marker"></i> <strong  style="color:#666" >Africa </strong></p>
					<p class="st-address"><i class="fa fa-map-marker"></i> <strong  style="color:#666" >South America&nbsp&nbsp&nbsp|&nbsp&nbsp&nbspNorth America</strong></p>
					<p class="st-email"><i class="fa fa-envelope-o"></i> <strong style="font-weight: normal">Technical support : Support@makboss.com</strong></p>
					<p class="st-email"><i class="fa fa-envelope-o"></i> <strong style="font-weight: normal">Enquiries : Sales@makboss.com</strong></p>
				</div>
			</div>
		</div>
	</div>

<!-- footer -->	
	<div class="section" style="background-color:#192131;padding:0px">	
		<footer class="my-5 text-center" style="margin-bottom: 2rem!important;">
			<a  style="  padding: 5px;width: 28px; text-align: center;text-decoration: none;border-radius: 73%;	background:#666;color:#192131;" href="#" class="fa fa-google" ></a>&nbsp&nbsp
			<a  style="  padding: 5px;width: 28px; text-align: center;text-decoration: none;border-radius: 73%;	background:#666;color:#192131;" href="#" class="fa fa-youtube"></a>&nbsp&nbsp
			<a  style="  padding: 5px;width: 28px; text-align: center;text-decoration: none;border-radius: 73%;	background:#666;color:#192131;" href="#" class="fa fa-facebook"></a>&nbsp&nbsp
			<a  style="  padding: 5px;width: 28px; text-align: center;text-decoration: none;border-radius: 73%;	background:#666;color:#192131;" href="#" class="fa fa-instagram"></a>&nbsp&nbsp
			<a  style="  padding: 5px;width: 28px; text-align: center;text-decoration: none;border-radius: 73%;	background:#666;color:#192131;" href="#" class="fa fa-twitter"></a><br><br>
			<p class="mb-2">
			<small>COPYRIGHT © 2017. ALL RIGHTS RESERVED BY <a href="#" style="color: :#666">MAKBOSS</a></small></p>
			<small>
				<a href="#gallery" class="m-2">Gallery</a><a style="color:#666">|</a>
				<a href="terms.php" class="m-2">Terms of Service</a><a style="color:#666">|</a>
				<a href="privacy.php" class="m-2">Privacy Policy</a><a style="color:#666">|</a>
				<a href="blog.php" class="m-2">Blog</a><a style="color:#666">|</a>
				<a href="career.php" class="m-2">Career</a>
			</small>
		</footer>
	</div>	

<!-- Modal -->
<button class="btn btn btn-outline-light "  style="text-transform:none; font-size:14px;background-color: #ff4500;color: #fff;border-color:#ff4500;border-radius: 5px;  position: fixed;bottom: -4px;right: 20px;" data-toggle="modal" data-target="#modalForm">
	Leave a message
</button> 
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog" style="margin-top:100px">
        <div class="modal-content">
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <div class="form-group">
                        <label for="inputName">Name :</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter your name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email :</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email"/>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Message :</label>
                        <textarea class="form-control" id="inputMessage" placeholder="Enter your message"></textarea>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" style="background-color: #fff;color: #ff4500;border-color:#ff4500;" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" style="background-color: #ff4500;color: #fff;border-color:#ff4500;border-radius: 5px;" class="btn btn-outline-light "  data-dismiss="modal">Send</button>
            </div>
        </div>
    </div>
</div>	

<script type="text/javascript">
function goFurther(){
if (document.getElementById("chkAgree").checked == true)
document.getElementById("btnSubmit").disabled = false;
else
document.getElementById("btnSubmit").disabled = true;
}
</script>	
    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/register.js"></script>
</body>
</html>	