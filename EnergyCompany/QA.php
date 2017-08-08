<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<html xmlns = "http://www.w3.org/1999/xhtml">

<head>
<title> Order Confirmation Page </title>

<style type="text/css">
	body{background-color:#D3D3D3;text-align:center;}
	div{background-color:#FFFFE0; width:800px;padding:20px; margin-top:20px; margin-left:auto; margin-right:auto; text-align:center;}

	table{margin-left:auto; margin-right:auto;}
	
</style>

</head>
<body>

<?php
$db_name = "qa_db";

$tb_1 = "cust_info";

$tb_2 = "cust_purchases";

$tb_3 = "cust_quest";

$tb_4 = "cust_answer";
//Get data values
$question = $_POST["question"];

$firstname = $_POST["firstname"];

$lastname = $_POST["lastname"];

$address = $_POST["address"];

$city = $_POST["city"];

$state = $_POST["state"];

$zip = $_POST["zip"];

$paymethod = $_POST["payment"];

$spent = $_POST["spent"];

$fee = 1.00;

//connect to MySQL

$connection = mysqli_connect("localhost","root", "", $db_name) or die (mysql_error());

$sql = "SELECT cust_id FROM $tb_1 WHERE (cust_firstname = '$firstname' AND cust_lastname = '$lastname')";

$result = mysqli_query($connection,$sql) or die(mysql_error());

$row = mysqli_fetch_array($result);

$custid = $row['cust_id'];
error_reporting(E_ERROR | E_PARSE);
$check = 0;
$questNO = rand(1, 9999);
while($check == 0){
$checkNO = mysqli_query($connection,"SELECT quest_no from $tb_2 WHERE quest_no = '$questNO'");
if(mysqli_num_rows($checkNO) > 0) {
	$questNO = rand(1, 9999);
}else{
		$check = 1;
	}
}

if ($custid == "") {
	$sql = "INSERT INTO $tb_1(cust_firstname,cust_lastname,cust_address,cust_city,cust_state,cust_zip)
 VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[address]','$_POST[city]','$_POST[state]', '$_POST[zip]')";

	$result = mysqli_query($connection,$sql) or die(mysql_error());

	$id = mysqli_insert_id($connection); 

}

else
	
$id = $custid;
	
$sql = "INSERT INTO $tb_2(cust_id,quest_no,money_spent,pay_method) VALUES ($id,$questNO,$fee,'$paymethod')";

$result = mysqli_query($connection,$sql) or die(mysql_error());


 
$mysqldate = date("m/d/Y");

$ipaddress = $_SERVER['REMOTE_ADDR'];

$sql = "INSERT INTO $tb_3(quest_no,visit_date,ipa,time_spent, question) VALUES ($questNO,'$mysqldate','$ipaddress', '$_POST[spent]', '$question')";

$result = mysqli_query($connection,$sql) or die(mysql_error());


$sql = "INSERT INTO $tb_4(question,quest_no) VALUES ('$question',$questNO)";

$result = mysqli_query($connection,$sql) or die(mysql_error());
?>

<div>

<h1> Your Order Information <h1>

<h4> Customer: </h4>

<?php

print ("$firstname $lastname <br /> $address <br /> $city, $state $zip <br /> Question ID: $questNO <br />");

?>

<h5> Your question has been submitted into the database. <br />
	Use your Question ID to check your question and answer.</h5>
	
<?php 

printf ("Your total bill is: $ %4.2f <br />", $fee);

print "Your chosen method of payment is: $paymethod <br />";
?>



<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">

<input type="hidden" name="cmd" value="_xclick">

<input type="hidden" name="business" value="yfantis@cs.unlv.edu">


<input type="hidden" name="currency_code" value="USD">

<input type="hidden" name="item_name" value="Question">

<input type="hidden" name="amount" <?php echo "value='$fee'" ?>>

<input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">

</form>
<br/>

<p>
	Time spent on website so far:&nbsp; <?php echo $spent;?>
</p>
</div>
<p class = "bottom1">
			<a href = "QA.html"> Back </a>
</p>
</body>

</html>

