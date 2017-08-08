<?php
    session_start();
    if(!isset($_SESSION['simple_login'])){
        header("Location: AdminLogin.php");
        exit();
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
 <title> View Unanswered Questions </title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <style type="text/css">
   h1 {background-color:#00FF00; font-family: Academy Engraved, sans-serif; text-align: center; margin-right: 400px; margin-left: 400px;}  
	  div.one {background-color:#F5F5F5; font-family: Futura, "Trebuchet MS", Arial, sans-serif; 
		background-image: url('background.png');
		background-attachment: fixed; background-position: center;
		margin-right: 400px; margin-left: 400px
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
      a:visited { color: #202020;}
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
<?php
$db_name = "qa_db";
$tb_1 = "cust_info";
$tb_2 = "cust_purchases";
$tb_3 = "cust_quest";
$tb_4 = "cust_answer";
$questNO = $_POST["questno"];
$answer = $_POST["answer"];
$output = "<table border = '1'>";
$output .= "<tr>";
$output .= "	<th colspan = '2'>Question ID</th>";
$output .= "	<th> Question </th>";
$output .= "</tr>";

$connection = mysqli_connect("localhost","root", "", $db_name) or die (mysql_error());

$sql = "UPDATE $tb_4 SET answer = '$answer' where quest_no = '$questNO'";

$result = mysqli_query($connection,$sql) or die(mysql_error());

$sql = "SELECT quest_no,question, answer FROM cust_answer WHERE quest_no = '$questNO'";
$result = mysqli_query($connection,$sql) or die(mysql_error());
$row = mysqli_fetch_array($result);
$qno = $row['quest_no'];

$output .= "<tr>";
$output .= "	<td colspan = '2'>".$row["quest_no"]."</td>";
$output .= "	<td>".$row["question"]."</td>";
$output .= "</tr>";
$output .= '</table>';
?>
<br/>
<h1> Question Answered! </h1>
<div class="one">
<p style= "margin: 0cm 1cm 0cm 2.38cm;">
<?php echo $output;?>
</p>
</div>
<p class = "bottom1">
<div align="center">
 	<a href = "Admin.php"> Back </a> 
</div>
</p>
<nav class = "bottom">

<p align="left">&copy; Copyright CS341 Class. All rights Reserved. </p>

</nav>
</body>
</html> 
