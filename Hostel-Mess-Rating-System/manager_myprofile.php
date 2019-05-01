<?php
$n=$_SESSION['user'];
$row314=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE managerUsername='$n'"));
echo $row314['messName'];
 ?>
