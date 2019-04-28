<?php
session_start();
//connectivity
require('../config.php');
if($_SESSION['admin']=="")
{
	header('location:admin.php');
}
else
{

//logout
if(isset($_POST['logout']))
{
	header('location:adminlogout.php');
}


//header marquee
if(isset($_POST['m1save']))
{
	$marquee = $_POST['marquee1'];
	$query = "UPDATE admin SET marquee1='$marquee' WHERE  id=1";
	mysqli_query($con,$query);
	$confirm ="<b style='color:red'>Page Saved</b>";
}

//colg name
if(isset($_POST['cnsave']))
{
	$cname = $_POST['colgname'];
	$query2 = "UPDATE admin SET colgname='$cname' WHERE id=1";
	mysqli_query($con,$query2);
	$confirm2 = "<b style='color:red'>Page Saved</b>";
}

//colg intro
if(isset($_POST['intsave']))
{
	$intro = $_POST['colgintro'];
	$query3 = "UPDATE admin SET colgintro='$intro' WHERE id=1";
	mysqli_query($con,$query3);
	$confirm3 = "<b style='color:red'>Page Saved</b>";
}

//footer info
if(isset($_POST['footersave']))
{
	$footer = $_POST['footerinfo'];
	$query4 = "UPDATE admin SET footerinfo='$footer' WHERE id=1";
	mysqli_query($con,$query4);
	$confirm4 = "<b style='color:red'>Page Saved</b>";
}

//about page
if(isset($_POST['aboutsave']))
{
	$abouthead = $_POST['abouthead'];
	$aboutinfo = $_POST['aboutinfo'];
	$query5 = "UPDATE admin SET abouthead='$abouthead' WHERE id=1";
	$query6 = "UPDATE admin SET aboutinfo='$aboutinfo' WHERE id=1";
	mysqli_query($con,$query5);
	mysqli_query($con,$query6);
	$confirm5 = "<b style='color:red'>Page Saved</b>";
}
?>
<style type="text/css" media="screen">
#horizontalmenu ul
{
padding:1; margin:1; list-style:none;
}
#horizontalmenu li
{
float:left;
position:relative;
padding-right:50;
display:block;
border:0px solid #CC55FF;
border-style:inset;
}
#horizontalmenu li ul
{
display:none;
position:absolute;
}
#horizontalmenu li:hover ul{
display:block;
background:#C4C4C4;
height:auto; width:8em;
}
#horizontalmenu li ul li
{
clear:both;
border-style:none;}
</style>
<div align="center">
<form method="post">
<table width="1023" height="628" border="1">
  <tbody>
    <tr>
      <td colspan="2" bgcolor="#5D5CEC"><center><font size="+2"><strong style="color: #FFFFFF">Administrator Control Panel</strong></font></center><div align="right">
	  </td>
    </tr>
	<tr>
      <td height="38" colspan="2" style="background-color:#6E68FF">
      	<div id="horizontalmenu">
        <ul>
		<li><a href="backend.php?option=user_management" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;" ><b>USER MANAGEMENT</b></a></li>
        <li><a href="backend.php?option=mess_management" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>MESS MANAGEMENT</b></a></li>
		<li><a href="backend.php?option=feedback_management" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>FEEDBACK MANAGEMENT</b></a></li>
        <li>
			<a href="adminlogout.php" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>LOGOUT</b></a>
		</li>
		 </ul>
	 </div>
      </td>
    </tr>
	<tr>
      <td colspan="2" height="647" bgcolor="#D9D9D9" style="vertical-align:text-top">
      	<?php
	@$opt = $_GET['option'];
	@$subopt = $_GET['suboption'];
	switch($opt)
	{
		case 'user_management':
			switch ($subopt) {
				case 'add_user':
					include('user_add.php');
				break;
				case 'delete_or_modify_user':
					include('user_del_or_mod.php');
				break;
				default:
					include('user_add.php');
				break;
			}
		break;
		case 'mess_management':
		switch ($subopt) {
			case 'add_mess':
				include('mess_add.php');
			break;
			case 'delete_or_modify_mess':
				include('mess_del_or_mod.php');
			break;
			default:
				include('mess_add.php');
			break;
		}
		break;
		case 'feedback_management':
		switch ($subopt) {
			case 'add_feedback':
				include('feedback_add.php');
			break;
			case 'delete_or_modify_feedback':
				include('feedback_del_or_mod.php');
			break;
			default:
				include('feedback_add.php');
			break;
		}
		break;

		default:
		switch ($subopt) {
			case 'add_user':
				include('user_add.php');
			break;
			case 'delete_or_modify_user':
				include('user_del_or_mod.php');
			break;
			default:
				include('user_add.php');
			break;
		}
		break;

	}

	?>
      </td>
  </tr>

    <!-- <tr>
      <td width="323" height="543">
      <center><p><b>[ Content of Header Marquee ]</b>
      <textarea placeholder="Input Marquee for the header of the Page!" name="marquee1"></textarea><br>
      <input type="submit" value="Save" name="m1save"><br>
      </p></center><br>
      <p><center><b>Change College Name : </b><br>
      <input type="text" placeholder="College Name" name="colgname" size="50"><input type="submit" value="Save" name="cnsave"><br><?php echo $confirm2; ?></center></p><br>
      <center><p><b>Change College Intoduction</b><br>
      <textarea placeholder="Input Introduction for College" name="colgintro"></textarea><br>
      <input type="submit" value="Save" name="intsave"><br></p></center><br>

	  <center><p><b>Change Footer</b><br>
      <input type="text" placeholder="copyright information etc," name="footerinfo" size="50"><br>
      <input type="submit" value="Save" name="footersave"><br></p></center>      </td>
      <td width="684" valign="top">


	  <p><center><b>Edit "About" Page</b><br><br>
      Page Heading : <input type="text" placeholder="heading" name="abouthead" size="30"><br><br>
     [ Page Content ]<br>
      <textarea placeholder="Input Content" name="aboutinfo"></textarea><br>
      <input type="submit" value="Save" name="aboutsave"><br></p></center>      </td>
      </tr> -->
  </tbody>
</table>
</form>
</div>
<?php
}
?>
