<?php

@include 'config.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	   <title>Swee Lee</title>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php 
// call file to connect to server 
include ("headers.php"); ?>

<?php


//has form been submitted? 
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $error = array (); //initialize an error array

//check for a name 
if (empty($_POST ['name'])) {
    $error[] = 'You forgot to enter your Name.';
}
else {
    $n = mysqli_real_escape_string ($conn, trim ($_POST ['name']));
}

//check for email 
if (empty($_POST['email'])){
    $error[] = 'You forgot to enter your email.';
}

else {
    $l = mysqli_real_escape_string ($conn, trim ($_POST ['email']));
}

// check for phone number 
if (empty($_POST['phone_num'])){
     $error[] = 'You forgot to enter your telephone number. ';
}
else {
    $i = mysqli_real_escape_string ($conn, trim ($_POST ['phone_num']));
}

//check for department 
if (empty($_POST['department'])){
    $error[] = 'You forgot to enter your department.';
}
else {
    $d = mysqli_real_escape_string ($conn, trim ($_POST ['department']));
}

//check for message
if (empty($_POST['message'])){
    $error[] = 'You forgot to enter your message.';
}
else {
    $r = mysqli_real_escape_string ($conn, trim ($_POST ['message']));
}

 
//make the query: 
    $q = "Insert INTO contact (id, name, email, phone_num, department, message) VALUES (' ', '$n', '$l', '$i', '$d', '$r')"; 
    $result = @mysqli_query ($conn, $q); // run the query 
    if ($result) { 
    //if it runs 
    echo '<h1>thank you<h1>'; 
    exit() ; 
    } 
    else { //if it did run 
    //message 
    echo '<h1>System error</h1>';

//debugging message 
echo '<p>' .mysqli_error($conn).'<br><br>Query: '.$q. '</p>';
 } //end of it (result) 
 mysqli_close($conn); //close the database connection. 
 exit();

} //End of the main submit conditional
?>


<div class="background-2">
<div class="content-4">

</p> 
<h1> Contact Us </h1> 
<h4>Our friendly online admin & Support Team is here to assist you with your questions or any issues you may encounter.<br>

 Call us at +60 3-3099 4630 anytime from 10:00am - 10:00pm, or
 Fill out the form below and we'll be in touch as soon as possible.</h4><br> 
<form action="contact.php" method="post">

<p><label class ="label" for ="name"> Name : </label> 
<input id = "name" type="text" name="name" size="30" maxlength="150" value="<?php if (isset($_POST['name'])) echo $_POST ['name']; ?>" /></p><br>

<p><label class="label" for ="email"> Email : </label> 
<input id = "email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST ['email']; ?>" /></p><br>

<p><label class ="label" for="phone_num"> Phone number (Optional) :  </label> 
<input id = "phone_num" type="text" name="phone_num" size="12" maxlength="12" value="<?php if (isset($_POST['phone_num'])) echo $_POST ['phone_num']; ?>" /> </p><br>

<p><label class ="label" for ="department"> Department : </label></p> 
<select name="department" rows="5" cols="40"><?php if (isset($_POST['department'])) echo $_POST['department']; ?> 
<option>-Select One-</option>
    <option>Order Status</option>
    <option>Product Advice and Enquiries</option>
    <option>Warranty</option>
    <option>Gift Ideas</option>
    <option>Store Enquiries</option>
    <option>Others</option>
     </select></label><br><br>

<p><label class ="label" for="message"> Message : </label></p> 
<textarea name="message" rows="5" cols="40"><?php if (isset($_POST['message'])) echo $_POST['message']; ?></textarea><br><br><br>


<p><input id="submit" type="submit" name="submit" value="SEND MESSAGE" /></p><br><br>
</form> 
</div>
</div>
</body>
</html>