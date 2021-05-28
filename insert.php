<?php
//insert.php
if(isset($_POST["subject"]))
{
$connect = mysqli_connect("localhost", "root", "", "test");
 
 $subject =  $_POST["subject"];
 $comment =  $_POST["comment"];
 $date=date("Y-m-d H:i:s"); 
 $query = "
 INSERT INTO comments(date_t,comment_subject, comment_text,)
 VALUES ('$date','$subject', '$comment')
 ";
 mysqli_query($connect, $query);
header("location:contact1.php");
}
?>