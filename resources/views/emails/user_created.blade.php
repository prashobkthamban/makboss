<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Hi {{$user->user_firstname}} {{$user->user_lastname}}, <br>
Your credentials are as follows<br><br>
<b>
	User Name : {{$user->user_email}}<br>
	Password  : {{$password}}</b><br><br>
Good luck!<br>
<b>Team Makboss</b>
</body>
</html>