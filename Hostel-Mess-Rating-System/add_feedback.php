<?php
$user = $_SESSION['user'];


$q = "SELECT * FROM users WHERE roll_no='$user'";
$cq = mysqli_query($con,$q);
$mess_array = mysqli_fetch_array($cq,MYSQLI_NUM);
$mess_subsribed = $mess_array[18];

$q1 = "SELECT * FROM admin";
$cq1 = mysqli_query($con,$q1);
$help = mysqli_fetch_array($cq1,MYSQLI_NUM);
$current_month = $help[3];

if(isset($_POST['submit']))
{
    $feedback = $_POST['term'];
    $feedback = trim($feedback);
    $feedback = preg_replace('/[^A-Za-z0-9 ]/', '', $feedback);
    $words = explode(" ", $feedback);
    $help2 = "Feedback_".$current_month;
    $query = "UPDATE users SET $help2 = '$feedback' WHERE roll_no = $user";
    mysqli_query($con,$query);
    $str2= "<center><h2 style='color:green'>FEEDBACK ADDED!</h2></center>";
    for ($x = 0; $x < sizeof($words); $x++) {
        $query = "SELECT * FROM Feedback WHERE Keyword = $words[$x]";
        $cq2 = mysqli_query($con,$query);
        if(mysqli_num_rows($cq2) == 0){
            if(strlen($words[$x])>0){
                $query = "INSERT INTO Feedback VALUES ('$words[$x]',0,0,0)";
                mysqli_query($con,$query);
            }
        }
    }
}
?>

<div align="center">
    <form method="post" enctype="multipart/form-data">
        <fieldset style="display: inline-flex; background-color: #D8D8D8;">
            <legend><font size="+2"><strong>FEEDBACK FORM</strong></font></legend>
            <p><b>MESS SUBSRIBED : <?php echo $mess_subsribed ; ?></b>*</p>
            <p><b>FEEDBACK : </b><textarea class="FormElement" name="term" id="term" cols="40" rows="4" wrap="soft"></textarea>*</p>
            <p><input type="submit" name="submit" value="ADD FEEDBACK"></p>
        </form>
    </div>
