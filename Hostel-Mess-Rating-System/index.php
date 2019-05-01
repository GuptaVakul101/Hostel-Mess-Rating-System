<?php
session_start();

//connectivity
require('config.php');

// //marquee display
// $q = "SELECT marquee1 FROM admin WHERE id=1";
// $q1 = mysqli_query($con,$q);
// $disp = mysqli_fetch_array($q1);
// //echo $disp['marquee1'];
//
// //change colg name
// $q2 = "SELECT colgname FROM admin WHERE id=1";
// $q21 = mysqli_query($con,$q2);
// $colgdisp = mysqli_fetch_array($q21);
//
// //change intro content
// $q3 = "SELECT colgintro FROM admin WHERE id=1";
// $q31 = mysqli_query($con,$q3);
// $introdisp = mysqli_fetch_array($q31);
// //echo $introdisp['colgintro'];
//
// //change footer
// $q4 = "SELECT footerinfo FROM admin WHERE id=1";
// $q41 = mysqli_query($con,$q4);
// $footerdisp = mysqli_fetch_array($q41);
//echo $footerdisp['footerinfo'];

?>
<html>
<head>
	<title>HOSTEL MESS RATING SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="engine/css/slideshow.css" media="screen" />
	<style type="text/css">.slideshow a#vlb{display:none}</style>
	<script type="text/javascript" src="engine/js/mootools.js"></script>
	<script type="text/javascript" src="engine/js/visualslideshow.js"></script>
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>

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
</head>
<body style="background-image:linear-gradient(white,black)">
<table width="1050px" align="center"  border="1">
	<tbody>
		<tr>
			<th height="39" colspan="2" style="background-color:#4E4E4E"><div style="text-align:left;color:#FFFFFF"><b><font size="+3"><a href="index.php" style="text-decoration:none ; color:#FFFFFF">Indian Institute of Technology, Guwahati</a></font></b><marquee direction="left" height="100%">
				Mess Management Portal is now Online!</marquee></div></th>
			</tr>
			<tr>
				<th height="317" colspan="2">
					<!--Slider-->
					<div id="wowslider-container1">
						<div class="ws_images"><ul>
							<li><img src="data1/images/1.jpg" alt="IITG GETS 7TH RANKING" title="IITG GETS 7TH RANKING" id="wows1_0"/></li>
							<li><img src="data1/images/2.jpg" alt="BEST INFRASTRUCTURE" title="BEST INFRASTRUCTURE" id="wows1_1"/></li>
							<li><img src="data1/images/3.jpg" alt="TOP CLASS EDUCATION" title="TOP CLASS EDUCATION" id="wows1_2"/></li>
							<li><img src="data1/images/4.jpg" alt="BEST MESS SERVICES" title="BEST MESS SERVICES" id="wows1_3"/></li>
						</ul></div>
						<div class="ws_bullets"><div>
							<a href="#" title="IITG GETS 7TH RANKING"><img src="data1/tooltips/1.jpg" alt="IITG GETS 7TH RANKING"/>1</a>
							<a href="#" title="BEST INFRASTRUCTURE"><img src="data1/tooltips/2.jpg" alt="International Accredition"/>2</a>
							<a href="#" title="BEST INFRASTRUCTURE"><img src="data1/tooltips/3.jpg" alt="BEST INFRASTRUCTURE"/>3</a>
							<a href="#" title="BEST MESS SERVICES"><img src="data1/tooltips/4.jpg" alt="BEST MESS SERVICES"/>4</a>
						</div></div>
						<span class="wsl"></span>
						<a href="#" class="ws_frame"></a>
					</div>
					<script type="text/javascript" src="engine1/wowslider.js"></script>
					<script type="text/javascript" src="engine1/script.js"></script>
					<!--slider end-->

				</th>
			</tr>
			<tr>
				<td height="38" colspan="2" style="background-color:#6E68FF">
					<div id="horizontalmenu">
						<ul>
							<li><a href="index.php" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;" ><b>HOME</b></a></li>
							<li><a href="index.php?option=about" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>ABOUT</b></a></li>
							<li><a href="index.php?option=contact" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>CONTACT</b></a></li>
							<li><a href="index.php?option=gallery" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>GALLERY</b></a></li>
							<li><a href="index.php?option=login" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>STUDENT LOGIN</b></a></li>
							<li><a href="index.php?option=Mlogin" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>MANAGER LOGIN</b></a></li>
							<li><a href="admin" onMouseOver="this.style.color='#FFFFFF'" onMouseOut="this.style.color='#353535'" style="color:#353535 ; text-decoration:none;"><b>ADMIN LOGIN</b></a></li>
						</ul>
					</div>
				</td>
			</tr>
			<tr>
				<td width="974" height="647" bgcolor="#D9D9D9" style="vertical-align:middle">
					<?php
					@$opt = $_GET['option'];
					if($opt=="")
					{
						?>
						<center>
							<h2><b><font size="+3"><?php echo "Welcome to IITG Mess Management Portal";?>
							</font></b></h2>
						</center>
						<center><img src="images/img.jpg" width="696" height="488"></center>
						<p><center>
							<p>&nbsp;</p>
							<p><strong><font size="+2"><?php echo $colgdisp['colgname'];?></font></strong> <b>-</b> <font size="+1"><?php echo "INDIAN INSTITUTE OF TECHNOLOGY,GUWAHATI"; ?></font></p>
						</center></p>
						<?php
						error_reporting(1);
					}
					else{
						switch($opt)
						{
							case 'login':
							include('login.php');
							break;
							case 'Mlogin':
							include('Mlogin.php');
							break;
							case 'about':
							include('about.php');
							break;
							case 'contact':
							include('contact.php');
							break;
							case 'gallery':
							include('gallery.php');
							break;

						}}

						?>


					</td>
					<td width="343" style="background-color:#468EFF">
						<center><font size="+2"><b style="color:#191B7E"><div style="background-color:#969BFB">College Updates</div><br></b></font></center>
						<marquee direction="up" height="100%" onMouseOver="stop()" onMouseOut="start()">
							<center><a href="http://www.iitg.ac.in/home/pagesin/1" style="text-decoration:none"><font size="+1"><b>About IITG</b></font></a></center><br>
							<center><a href="http://intranet.iitg.ernet.in/" style="text-decoration:none"><font size="+1"><b>Intranet</b></font></a></center><br>
							<center><a href="https://intranet.iitg.ernet.in/cb/index.php" style="text-decoration:none"><font size="+1"><b>Complain Booking</b></font></a></center><br>
							<center><a href="https://202.141.80.5/~hab/" style="text-decoration:none"><font size="+1"><b>Hostel Affairs Board</b></font></a></center><br>

						</marquee>
					</td>
				</tr>
				<tr>
					<td height="25" colspan="2" style="background-color:#B8AFFF"><center><b>&copy; Managed by VAKUL GUPTA and UTKARSH JAIN</b></center>
						<div align="right"><a href="#facebook"><img src="images/f.png" width="30" height="30" alt=""/></a><a href="#twitter"><img src="images/t.png" width="30" height="30" alt=""/></a><a href="#youtube">
							<img src="images/y.png" width="30" height="30" alt=""/></a></div></td>
					</tr>
				</tbody>
			</table>
		</body>
			</html>
