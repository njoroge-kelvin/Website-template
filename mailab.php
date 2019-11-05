<?php
include('config.php');
include('subscription.php');

if(isset($_POST['submit'])){

    // address that you want email to be sent from; subject and the body resp..
    $from= 'blogger@gmail.com';  
    $subject= $_POST['subject']; 
    $body= $_POST['body']; 
    
    //query db for all users subscribed for updates.
    
    $query= "SELECT * FROM subscription"; 
    $result= mysqli_query ($contact, $query)  
    or die ('Error querying database.'); 
    
    while ($row = mysqli_fetch_array($result)) { 
    $first_name= $row['name'];
    $email= $row['email']; 
    
    $msg= "Dear $first_name, \n $body"; 
    mail($email, $subject, $msg, 'From:' . $from); 
    echo 'Email sent to: ' . $email. '<br>'; 
    } 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST"> 
        <label>Subject of email:</label><br><input type="text" name="subject" id="subject"/><br> 
        <label>Body of email:</label><br><textarea cols="35" rows="10" name="body"></textarea>
        <button type="submit" name="submit" style="border: none; width: 50px; height: 20px; float: left; 
        background-color: green;">submit</button>
</body>
</html>
