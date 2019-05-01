<?php
//connectivity
//require('config.php');
$feedback1;
$feedback2;
$feedback3;
$feedback4;
$feedback5;
$feedback6;
$feedback7;
$feedback8;
$feedback9;
$feedback10;
$feedback11;
$feedback12;

$q1 = "SELECT messName FROM mess";
$result = mysqli_query($con,$q1);
$str="";
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $str=$str."<option value=\"".$row["messName"]."\">".$row["messName"]."</option>";
  }
}

if(isset($_POST['submit']))
{
    $mess=$_POST['mess'];
    $query = "SELECT * FROM mess WHERE messName='$mess'";
    $details_mess = mysqli_fetch_array(mysqli_query($con,$query),MYSQLI_NUM);
    $feedback1 = $details_mess[3];
    $feedback2 = $details_mess[4];
    $feedback3 = $details_mess[5];
    $feedback4 = $details_mess[6];
    $feedback5 = $details_mess[7];
    $feedback6 = $details_mess[8];
    $feedback7 = $details_mess[9];
    $feedback8 = $details_mess[10];
    $feedback9 = $details_mess[11];
    $feedback10 = $details_mess[12];
    $feedback11 = $details_mess[13];
    $feedback12 = $details_mess[14];
}
?>
<div align = "center">
<form method="post" enctype="multipart/form-data">
<h2><b>Mess Subscribed : </b>
  <select name="mess" required/>
  <?php
  echo $str;
  ?>
</select>
</h2>
<p><input type="submit" name="submit" value="SELECT"></p>
</form>
</div>


<h1><center>CURRENT YEAR PERFORMANCE OF THE MESS</center></h1>
<div align="center">
<table width="725" height="346" border="1">
  <tbody>
    <tr>
      <td height="30" bgcolor="#7179CF" style="color: #FFFFFF"><center><font size="+2"><b>MONTH</b></font></center></td>
      <td bgcolor="#7179CF" style="color: #FFFFFF"><center><font size="+2"><b>OVERALL RATING</b></font></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>JANUARY</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback1 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>FEBRUARY</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback2 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>MARCH</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback3 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>APRIL</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback4 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>MAY</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback5 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>JUNE</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback6 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>JULY</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback7 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>AUGUST</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback8 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>SEPTEMBER</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback9 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>OCTOBER</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback10 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>NOVEMBER</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback11 ;?></b></center></td>
    </tr>
    <tr>
      <td bgcolor="#B4BEDC"><center><b>DECEMBER</b></center></td>
      <td bgcolor="#97CDDB"><center><b><?php echo $feedback12 ;?></b></center></td>
    </tr>
  </tbody>
</table>
</div>
