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
body, html {
    height: 100%;
    background-repeat: no-repeat;
    background-color:#fff;
}

.card-container.card {
    max-width: 350px;
    padding: 40px 40px;
    border-radius:10px;
    background-color:#ffffff;
}

.btn {
color:#fff;
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}
/*
 * Card component
 */
 a,a:hover { 
        color:#5a5a5a;
    } 
       
.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 16px rgba(0, 0, 0, 0.3)
}

.profile-img-card {
    width: 75px;
    height: 65px;
    margin: 0 auto 10px;
    display: block;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
    border-radius:10px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    background-color: #ff4500;
    padding: 0px;
    font-weight: 300;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: #f89920;
}

.forgot-password {
    color: #ff4500;
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: #626262;
}
</style>
</head>
<body >
 <div class="container">
        <div class="card card-container" style="height:500px;margin-top:90px">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
           <a href="index.php" ><img style="margin-top:33"id="profile-img" class="profile-img-card" src="images/logo.png" /></a>
           <div style="margin-top: 20px">
           <p class="tagline" style="text-align:center;font-size:15px" >sign in  to  access makboss</p>
            <form style="margin-top:20px">
                <input type="email" class="form-control" placeholder="Email address" required autofocus>
                <br>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div style="margin-top:20px;font-size:14px">
                    <label style="color:#666">
                        <input type="checkbox" value="remember-me"> Keep me signed in
                    </label>
                </div>
                <button class="btn btn-lg  btn-block btn-signin" type="submit" style="cursor: pointer;">Sign in</button>
            </form><!-- /form -->
            </div>
            <a href="#" style="color:#ff4500;text-align:center;">
                Forgot the password?
            </a>
            <div style="margin-top: 50px;text-align:center;font-size:14px">
            <p >Don't have a Makboss acount?</p>
            </div>
            <div style="margin-top: -15px;text-align:center">
            <a href="register.php" style="color:#ff4500" >
                Create New Account 
            </a>
            </div>
        </div><!-- /card-container -->
    </div>

<!-- jQuery and Bootstrap -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<!-- Plugins JS -->
<script src="js/owl.carousel.min.js"></script>

<!-- Custom JS -->
<script src="js/script.js"></script>

</body>
</html>	





























