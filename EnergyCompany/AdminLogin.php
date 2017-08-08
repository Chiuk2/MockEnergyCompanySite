<?php  /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['username'],$_POST['password'])){
		/* Define username and associated password array */
		$user = array('user' => 'admin','pass' => 'password');
		
		/* Check and assign submitted Username and Password to new variable */
		$username = $_POST['username'];
        $pass = $_POST['password'];
        if($username == $user['user'] && $pass == $user['pass']){
            session_start();
            $_SESSION['simple_login'] = $username;
			header("Location: Admin.php");
			exit();
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details</span>";
		}
	}
?>
<!DOCTYPE html>

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
 <title>Admin Login </title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <style type="text/css">
	 
      h1 {background-color:#00FF00; font-family: Academy Engraved, sans-serif; text-align: center; margin-right: 400px; margin-left: 400px;}  
	  div.one {background-color:#F5F5F5; font-family: Futura, "Trebuchet MS", Arial, sans-serif; 
		background-image: url('background.png');
		background-attachment: fixed; background-position: center;
		font-size: 150%; margin-right: 400px; margin-left: 400px;
		}
      body {background-image: url("http://www.copperstateengineering.com/wp-content/uploads/2016/01/engineering-blueprint.jpg");
		 background-size: cover; background-repeat: no-repeat; margin: 0; }
		td.products{padding-left:40px;padding-right:40px;}
		th.products{padding-left:40px;padding-right:40px;}
		table{width:500px; text-align:center; margin:auto;}
		.bottom{position:relative; top:300px;}
		.bottom1{position:relative; top:280px;}
		.header {width:800px;background-color:white; padding:20px 20px 0px 0px; margin-top:20px; margin-left:auto; margin-right:auto; text-align:left;}
		.pcenter {text-align:center; margin:0px 0px 0px 0px;}
		.tbord {width:700px; border:double 6px; margin:auto auto;}
		.bbord {width:700px; border:double 6px; margin:30px auto 10px auto;background-color:#DCDCDC}
		.billingInfo {width:690px;}
		.right {text-align:right;}
      a:link { color: #ffffff;}
      a:visited { color: #ffffff;}
      a:hover  { background-color:#05A51E;  border:solid; border-color:#05A51E; border-width:11.5px;}
      a:active  {background-color:#05A51E;}
	  
	  /* Header NAVIGATION */
nav {
	background-image: url("banner.png");
	height: 120%; width: 120%;
	font-family: "Gill Sans", "Gill Sans MT", Calibri, sans-serif;
	text-align: left;
}

nav li {
  display: inline;
  padding: 10px;
}

nav ul {
  display: inline;
    margin-top: 5px;
	font-size: 2rem;
}


nav a {
  height: 60px;
  line-height: 60px;
  color: #204156;
  text-decoration: none;
}


.logo {
  float: left;
  font-family: Optima, Segoe, "Segoe UI", Candara, Calibri, Arial, sans-serif;
  color: #056E1E;
  font-size: 120%;
}

.logo a {
  margin-right: 30px;
  padding: 8px 18px;
}

.logo a:hover {
	background-color:transparent;
	border-color:transparent;
	border-width:0px;
}


 </style>

</head>
<body>

<nav>

<ul>
	
	<li><a  href="Services.html"> Our Products & Services </a>
	<li><a  href="about.html"> About Greenergy</a> &nbsp 
	<li><a  href="QA.html"> Help </a>
	<li><a  href="mailto:chiuk2@unlv.nevada.edu"> Contact Us </a>
	<div class="logo"> <a href="homepage.html"><img src="logo.png"; align= "left"/></a>
	</div>
 </ul>
 </nav>
&nbsp;&nbsp;
<p align="center">
		<strong>Admin Login:</strong>
</p>
<form accept-charset="UTF-8" role="form"  action="AdminLogin.php" method='post' >
<fieldset >
			<table border = "1" bgcolor="#e0e0e0">
				<tr> 
					<td class = right> Admin ID: </td>
					<td> 
						<input type='text' placeholder="Username" name='username' size = "20" required />
					</td>
				</tr>
				<tr>
					<td class = right> Admin Password: </td>
					<td> 
						<input type='password' placeholder="Password" name='password' value="" size = "20" required />
					</td>
				</tr>
			<table>
			<br/>
			<p align="center"><input type = "submit" value = "Login"/></p>
			</fieldset>
</form>
<p class = "bottom1">
			<a href = "QA.html"> Back </a>
</p>
<nav class = "bottom">

<p align="left">&copy; Copyright CS341 Class. All rights Reserved. </p>

</nav>
</body>
</html>