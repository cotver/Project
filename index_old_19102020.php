<? session_start(); ?>
<? ob_start(); ?>
<?

/*
		if(!$_SESSION['lock_server'])//��ҵç������ҹ˹����ѡ
		{
		require_once("../classes/checkServer.php");
		$go2Server= Check_Server();		
		if( $go2Server)
		{
		header("Location: ".$go2Server);
		exit;
		}
	}*/
$_SESSION['lock_server'] = 1;
/*
		if( $_SERVER['HTTPS'] == "on")
		{
		header("Location: ".WWW_HOST);
		exit();
	}*/



$show_mask = 0;
$img_width = '750px';
///////////////// $show_mask ���ʴ���ͤ����Ӥѭ ////////////////////
/*if(date("Ymd") < 20171107)
	{
		if($_SESSION['show_mask']<=1)
			{
			$show_mask =1;
		}else
			$show_mask = 0;
		$_SESSION['show_mask']++;
	}else
	{
	$show_mask = 0;
		}
		*/
/*		if(!$_SESSION['show_mask']) ///����ʴ������á��������
		{
			$show_mask = 1;
			$_SESSION['show_mask']=1;
		}
		else
		{
			$_SESSION['show_mask']++;
			if($_SESSION['show_mask']<=3)
			{
			$show_mask =1;
			}else
			$show_mask = 0;
		}*/

# Server Test Announcement

		


function index_get_user_browser()
{
	$u_agent = $_SERVER['HTTP_USER_AGENT'];
	$ub = '';
	if (preg_match('/MSIE/i', $u_agent)) {
		$ub = "ie";
	} elseif (preg_match('/Firefox/i', $u_agent)) {
		$ub = "firefox";
	} elseif (preg_match('/Safari/i', $u_agent)) {
		$ub = "safari";
	} elseif (preg_match('/Chrome/i', $u_agent)) {
		$ub = "chrome";
	} elseif (preg_match('/Flock/i', $u_agent)) {
		$ub = "flock";
	} elseif (preg_match('/Opera/i', $u_agent)) {
		$ub = "opera";
	}

	return $ub;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<meta name="google-translate-customization" content="7f461f42110eb423-de503371be71808c-g9d6411618a78552f-13">
	</meta>
	<link rel="icon" href="../favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<title>�ӹѡ����¹��л����ż� ʶҺѹ෤����վ�Ш�����Ҥس�����Ҵ��кѧ</title>
	<LINK href="../css/index_right_menu.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="icofont/icofont.min.css">

	<style type="text/css">
		body {
			margin-left: 0px;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
			background-repeat: no-repeat;
			background-size: 100% auto;
			background-position: center top;
			background-attachment: fixed;
			background-image: url(images/bigbgad3.jpg);
			font-size: 12px;
		}

		.ddd {
			text-align: left;
		}

		.ddd {
			color: #333;
			text-align: center;
			font-size: 10px;
		}

		.hgt {
			font-size: 12px;
			color: #000;
		}

		.jjj {
			font-size: 12px;
			color: #FFF;
		}

		h5 {
			color: #00F;
		}

		h5 {
			font-family: Tahoma, Geneva, sans-serif;
		}

		h5 {
			color: #666;
			font-size: 12px;
		}

		h6 {
			color: #666;
		}

		co {
			font-family: "Cordia New";
		}

		.ddd {
			text-align: left;
		}

		.ddd {
			color: #333;
			text-align: center;
			font-size: 10px;
		}

		.hgt {
			font-size: 12px;
			color: #000;
		}

		.jjj {
			font-size: 12px;
			color: #FFF;
		}
		.kmitl_60_banner_text{ 
			background-color: #333; 
			padding: 20px; 
			margin-bottom:10px; 
		} 
	</style>
	<link href="../css/registrar.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		function MM_swapImgRestore() { //v3.0
			var i, x, a = document.MM_sr;
			for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
		}

		function MM_preloadImages() { //v3.0
			var d = document;
			if (d.images) {
				if (!d.MM_p) d.MM_p = new Array();
				var i, j = d.MM_p.length,
					a = MM_preloadImages.arguments;
				for (i = 0; i < a.length; i++)
					if (a[i].indexOf("#") != 0) {
						d.MM_p[j] = new Image;
						d.MM_p[j++].src = a[i];
					}
			}
		}

		function MM_findObj(n, d) { //v4.01
			var p, i, x;
			if (!d) d = document;
			if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
				d = parent.frames[n.substring(p + 1)].document;
				n = n.substring(0, p);
			}
			if (!(x = d[n]) && d.all) x = d.all[n];
			for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
			for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
			if (!x && d.getElementById) x = d.getElementById(n);
			return x;
		}

		function MM_swapImage() { //v3.0
			var i, j = 0,
				x, a = MM_swapImage.arguments;
			document.MM_sr = new Array;
			for (i = 0; i < (a.length - 2); i += 3)
				if ((x = MM_findObj(a[i])) != null) {
					document.MM_sr[j++] = x;
					if (!x.oSrc) x.oSrc = x.src;
					x.src = a[i + 2];
				}
		}

		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			var expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}

		function setDontShowPopup(cb) {
			if (cb.checked) {
				setCookie("dont_show_popup", "1", 1)
				$("#dont_show_popup_status").html('<font color="green"> SET</font>')
				$("#dont_show_popup_status2").html('<font color="green"> SET</font>')
				$("#dont_show_popup2").prop('checked', true);
			} else {
				setCookie("dont_show_popup", "0", 1)
				$("#dont_show_popup_status").html('<font color="red"> UNSET</font>')
				$("#dont_show_popup_status2").html('<font color="red"> UNSET</font>')
				$("#dont_show_popup2").prop('checked', false);
			}
			$("#popup").css("margin-top", "135px")
			$(".ja_wrap,.ja_wrap_black").css("position", "fixed");
		}
	</script>
	<script language="javascript" src="../js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../js/slimScroll.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.8.16.js"></script>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-35200091-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<link href="../jAlert-4.0/src/jAlert-v4.css" type="text/css" rel="stylesheet">
	<script language="javascript" src="../jAlert-4.0/src/jAlert-v4.min.js"></script>
	<SCRIPT language=JavaScript src="../scripts/scrolling_status.js" type=text/javascript> </SCRIPT> <script language="javascript" src="../js/easySlider1.7.js"></script>
	<script type="text/javascript">
		Message = '�ӹѡ����¹��л����ż� ʨ�.';
		$(document).ready(function() {

			<?php
			if ($show_mask) {
				/********
					��ͧ��˹���Ҵ�������ҧ�ͧ�ٻ�Ҿ�� width="100%" ������� responsive
				 ********/
			?>
				var Str = '<table width="<?= $img_width ?>" border="0" cellspacing="0" cellpadding="0">';

				/*Str+='<tr><td colspan="2">';
				Str+='<img src="images/popup/310762_1.jpg" width="<?= $img_width ?>">';
				Str+='</td></tr>';*/
				/*Str+='<tr><td colspan="2">';
				Str+='<img src="images/server-maintenance_2020-02-20.jpg" width="<?= $img_width ?>">';
				Str+='</td></tr>';*/
				/*Str += '<tr><td colspan="2">';
					Str += '<a href="http://www.reg.kmitl.ac.th/pundit_info/" target="_blank"><img src="./images/popup/kmitl-pundit2561.png" width="<?= $img_width ?>"></a>';
					Str += '</td></tr>';*/
				// Str += '<tr><td colspan="2">';
				// Str += '<a href="../TCAS/u_confirm/confirmPageX.php" target="_blank"><img src="images/TCAS_2020-02-04_2.jpg" width="<?= $img_width ?>"></a>';
				// Str += '</td></tr>';

				/*Str += '<tr><td colspan="2">';
				Str += '<img src="images/07022563_1.jpg" width="744px">';
				Str += '</td></tr>';*/

				// Str += '<tr><td>';
				// Str += '<a href="../matriculation/" target="_blank"><img src="images/popup_online_matriculation_system_round_1_2020-05-14.jpg" width="<?= $img_width ?>"></a>';
				// Str += '</td></tr>';

				// Str += '<tr>';
				// Str += '<td><hr></td>';
				// Str += '</tr>';

				//Str += '<tr>';
				//Str += '<td><img src="images/popup/070563.jpg" width="100%"></td>';
				//Str += '</tr>';

				//Str += '<tr>';
				//Str += '<td><hr></td>';
				//Str += '</tr>';
/*
				Str += '<tr><td>';
				Str += '<a href="../TCAS/u_confirm/confirmPageX.php" target="_blank"><img src="images/admission_2020-05-02_2.jpg" width="<?= $img_width ?>"></a>';
				Str += '</td></tr>';

				Str += '<tr>';
				Str += '<td><hr></td>';
				Str += '</tr>';
*/			
			
				// Str += '<tr><td>';
				// Str += '<a href="https://new.reg.kmitl.ac.th/kmitl1/list.html" target="_blank"><img src="./images/popup/studentid63v2.jpg" width="<?= $img_width ?>"></a>';
				// Str += '</td></tr>';
			

			
				// Str += '<tr><td>';
				// Str += '<a href="http://www.reg.kmitl.ac.th/educalendar/2563/ungrad63-th.pdf" target="_blank"><img src="./images/popup/020763.jpg" width="<?= $img_width ?>"></a>';
				// Str += '</td></tr>';

				Str += '<tr><td>';
				Str += '<a href="https://office.kmitl.ac.th/osda/events/��˹���ö����ٻ�Ӻѵû/" target="_blank"><img src="./images/queue-student cardv1.jpg" width="<?= $img_width ?>"></a>';
				Str += '</td></tr>';

				// Str += '<tr>';
				// Str += '<td><hr></td>';
				// Str += '</tr>';	

				// Str += '<tr><td>';
				// Str += '<a href="http://www.reg.kmitl.ac.th/TCAS/u_refund/" target="_blank"><img src="./images/covid-tuition-fee-refund-10-63.jpg" width="<?= $img_width ?>"></a>';
				// Str += '</td></tr>';

				Str += '<tr>';
				Str += '<td><hr></td>';
				Str += '</tr>';

				Str += '<tr><td>';
				Str += '<a href="pdf/260563.pdf" target="_blank"><img src="./images/popup/270363.jpg" width="<?= $img_width ?>"></a>';
				Str += '</td></tr>';
				//Str+='<tr>';
				//Str+='<td><a href="../uploads/exit_exam/annouce_02-04-2019.pdf" target="_blank"><img src="images/exit_exam_1_24-04-2019.jpg" width="<?= $img_width ?>"></a></td>';
				//Str+='<td><a href="../uploads/exit_exam/annouce_24-04-2019.pdf" target="_blank"><img src="images/exit_exam_2_24-04-2019.jpg" width="<?= $img_width ?>"></a></td>';
				//Str+='</tr>';
				//			Str+='<tr>';
				//				Str+='<td><hr></td>';
				//				Str+='</tr>';
				//				Str+='<tr>';
				//				Str+='<td><img src="images/system-closed5April.png" width="100%"></td>';
				//				Str+='</tr>';

				Str += '</table>';
				Str += '<input type="checkbox" id="dont_show_popup" onclick="setDontShowPopup(this)">';
				Str += '<span id="dont_show_popup_status"></span>'

				var dont_show_popup = getCookie("dont_show_popup")
				if (dont_show_popup == "0" || dont_show_popup == "") {
					$.jAlert({
						'title': '<div style="font-family: \'Prompt\', sans-serif; font-size:20px; text-align:center;"></div>',
						'content': Str,
						'id': 'popup',
						'theme': 'black',
						'animationTimeout': 300,
						'size': 'auto',
						'btns': {
							'text': '<span style="font-family: \'Prompt\', sans-serif; font-size:16px; text-align:center;"></span>'
						},
						'closeOnClick': true
					});
					$("#popup").css("margin-top", "135px")
					$(".ja_wrap,.ja_wrap_black").css("position", "fixed");
				} else {
					$("#dont_show_popup").prop('checked', true);
					$("#dont_show_popup2").prop('checked', true);
				}
			<?php
			}
			?>
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#slider").easySlider({
				auto: true,
				continuous: true,
				numeric: true
			});
			scrollIn();
		});
	</script>

	<script language="javascript1.2">
		$(function() {
			var screen_width = $(window).width();
			if (screen_width < 1300) {
				left = screen_width;
			} else {
				left = screen_width - 300;
			}
		});

		function removemark() {
			$('#scholar_mark').remove();
		}
	</script>
	<style>
		#OverlayImage1 {
			position: absolute;
			width: 1024px;
			height: 330px;
			background: url(<?= $Slide_Array[$rand_keys[0]][0] ?>) no-repeat top left;
		}

		#OverlayImage2 {
			position: absolute;
			width: 1024px;
			height: 330px;
			background: url(<?= 'slide/mask' . rand(2, 9) . '.png' ?>) no-repeat top left;
		}
	</style>
</head>

<body onLoad="MM_preloadImages('images/login2.jpg','images/all2.jpg','images/all.gif')" topmargin="0" bottommargin="0" marginheight="0" marginwidth="0">
	<table width="1064" height="1374" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td width="24" rowspan="10" background="images/linebbg.png">&nbsp; </td>
			<td height="143" colspan="2" valign="top" style="background:url(images/index01.jpg)  no-repeat;">
				<table width="1024" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="698" height="143" align="left" valign="top"></td>
						<td width="326" align="right" valign="top">
							<table width="250" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="326" height="92" align="center" valign="bottom"></td>
								</tr>
								<tr>
									<td height="26">&nbsp;</td>
								</tr>
								<tr>
									<td bgcolor="#F5F1E8">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
			<td width="29" rowspan="10" style="background:url(../index/images/linebbg2.png) repeat-y; width:28px;">&nbsp; </td>
		</tr>
		<tr>
			<td height="52" colspan="2" align="left" valign="top" bgcolor="#F5F1E8"></td>
		</tr>
		<!-- <tr>
			<td colspan="2" align="left" valign="top" width="1024" height="330" bgcolor="#F5F1E8" id="img_slider">
				<div id="OverlayImage1"></div>
				<a href="" target="_blank" id="OverlayImage2"></a>
			</td>
		</tr> -->

		<!-- Start graph race -->

		<!-- <tr>
			<td colspan="2" height="30" align="center" bgcolor="#f79554">
				<font color="white">
					<h3> Number of students enrolled in KMITL from 2546 to 2562, by region </h3>
				</font>
			</td>
		</tr>
		<tr>
			<td colspan="2" valign="top" align="center" bgcolor="#F5F1E8">

				//<div class="flourish-embed" data-src="visualisation/1292357"><script src="https://public.flourish.studio/resources/embed.js"></script></div>
				<div class="flourish-embed" data-src="visualisation/1371813" data-width="80%" data-height="300px">
					<script src="https://public.flourish.studio/resources/embed.js"></script>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" height="5" align="center" bgcolor="#f79554"> </td>
		</tr> -->

		<!-- End graph race -->


		<!-- --------------------------------------------------------------------------------------------- -->
		<!-- start countdown -->
		<tr>
			<td colspan="2" valign="top">
				<video width="1024" height="300" id="bannervid" autoplay="autoplay" muted loop>
					<source src="banner.mp4" type="video/mp4">
				</video>
				<div class="kmitl_60_banner_text">
					<div style="font-size: 25px; font-weight: bold; text-align: center; padding-bottom: 10px; color: #FE7D55;">
						
					</div>
					<div style="font-size: 12px; text-align:center; color:#bbb;">
						</a>
					</div>
					<div style="font-size: 12px; text-align:center; color:#bbb;">
						<a href="http://www.reg.kmitl.ac.th/index_banner_60/prize2.php" target="_blank" style="color:inherit"></a>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" height="5"> </td>
		</tr>

		<!-- End countdown -->
		<!-- --------------------------------------------------------------------------------------------- -->

		<tr>
			<td height="14" colspan="2" align="left" valign="top"></td>
		</tr>
		<tr>
			<?php
						if(!true)
							{
						?>
			<td height="65" colspan="2" background="images/linenew.jpg" bgcolor="#FFFFFF">
				<?php
						}else
							{
						?>
				<td height="65" colspan="2" background="images/linenew_en.jpg" bgcolor="#FFFFFF">
					<?
						}
				?>
				<table width="1021" border="0" cellspacing="0" cellpadding="0" height="48">
					<tr>
						<td width="245" height="4"></td>
						<td width="776"></td>
					</tr>
					<tr>
						
						<td height="27">&nbsp;</td>
						
						<td></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2" height="15" align="center" bgcolor="#FFFFFF">
			</td>
			<!-- <td colspan="2" align="center" bgcolor="#FFFFFF">
				<hr>
				<a href="https://new.reg.kmitl.ac.th/kmitl1/" target="_blank">
					<img src="images/online_matriculation_system_login.jpg" width="1000px">
				</a>
				<hr>
			</td> -->
		</tr>
		<tr>
			<td width="244" height="624" align="left" valign="top" bgcolor="#FFFFFF">
				<table width="235" height="298" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="6" rowspan="2">&nbsp;</td>
						<td width="229" height="98" align="center" valign="top"></td>
					</tr>
					<tr>
						<td align="left" valign="top"></td>
					</tr>
				</table>
			</td>
			<td width="775" align="left" valign="top" bgcolor="#FFFFFF">
				<table width="774" height="752" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="385" height="323" align="left" valign="top">
							<table width="377" height="324" border="0" align="right" cellpadding="0" cellspacing="0">
								<tr>
									<td width="18" rowspan="4" valign="top">&nbsp;</td>
									<td width="343" height="18" background="images/line01.jpg">&nbsp;</td>
								</tr>
								<tr>
									<td height="33" align="center" valign="top" background="images/line02.jpg"><img src="images/ungradkmitl.jpg" width="362" height="49"></td>
								</tr>
								<tr>
									<td height="202" align="left" valign="top" background="images/line02.jpg">
										<table width="370" height="22" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td width="365">
													<div id="div_news1">
														<table width="358" border="0" cellspacing="0" cellpadding="0">

															
														</table>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<form method="post" enctype="multipart/form-data" action="search_news.php" target="_blank">
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td width="1%">&nbsp;</td>
																<td width="16%">
																	<div align="right"><img src="../images/search-icon.png" width="24" height="24"></div>
																</td>
																<td width="33%"><input type="text" name="keyword_search" id="keyword_search1"></td>
																<td width="23%"><input type="submit" name="button" id="button" value="" style="width:60px;">
																	<input name="sarch_group" type="hidden" id="sarch_group" value="2"></td>
																<td width="27%"><a href="news.php?group=2"><img src="images/all.jpg" name="Image66" width="90" height="20" border="0" onMouseOut="restoreImg(this)" onMouseOver="swapImg(this)"></a></td>
															</tr>
														</table>
													</form>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td height="22" align="left" valign="top"><img src="images/line03.jpg" width="376" height="19"></td>
								</tr>
							</table>
						</td>
						<td width="389" align="left" valign="top">
							<table width="377" height="324" border="0" align="left" cellpadding="0" cellspacing="0">
								<tr>
									<td width="18" rowspan="4" valign="top">&nbsp;</td>
									<td width="343" height="18" background="images/line01.jpg">&nbsp;</td>
								</tr>
								<tr>
									<td height="33" align="center" valign="top" background="images/line02.jpg"><img src="images/gradkmitll.jpg" width="362" height="49"></td>
								</tr>
								<tr>
									<td height="202" align="left" valign="top" background="images/line02.jpg">

										<table width="370" height="22" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td width="344">
													<div id="div_news2">
														<table width="358" border="0" cellspacing="0" cellpadding="0">

															
														</table>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<form method="post" enctype="multipart/form-data" action="search_news.php" target="_blank">
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td width="1%">&nbsp;</td>
																<td width="16%">
																	<div align="right"><img src="../images/search-icon.png" width="24" height="24"></div>
																</td>
																<td width="33%"><input type="text" name="keyword_search" id="keyword_search2"></td>
																<td width="23%"><input type="submit" name="button" id="button" value="" style="width:60px;">
																	<input name="sarch_group" type="hidden" id="sarch_group" value="4"></td>
																<td width="27%"><a href="news.php?group=4"><img src="images/all.jpg" name="Image66" width="90" height="20" border="0" onMouseOut="restoreImg(this)" onMouseOver="swapImg(this)"></a></td>
															</tr>
														</table>
													</form>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td height="22" align="left" valign="top"><img src="images/line03.jpg" width="376" height="19"></td>
								</tr>
							</table> <br>
						</td>
					</tr>
					<!-- <tr> -->
					<!-- <td height="200" align="left" valign="top">
							<table width="377" height="200" border="0" align="right" cellpadding="0" cellspacing="0">
								<tr>
									<td width="18" rowspan="4" valign="top">&nbsp;</td>
									<td width="343" height="18" background="images/line01.jpg">&nbsp;</td>
								</tr>
								<tr>
									<td height="33" align="center" valign="top" background="images/line02.jpg"><img src="images/00112.jpg" width="362" height="82"></td>
								</tr>
								<tr>
									<td align="left" valign="top" background="images/line02.jpg">

										<table width="370" height="22" border="0" cellpadding="0" cellspacing="0">

											<tr>
												<td width="9">&nbsp;</td>
												<td width="358">
													<div id="div_news3">
														<table width="200" border="0" cellspacing="0" cellpadding="0">

															<?php
															// $sql = "select * from `_news_` where `group`='1' and `status`='1' order by `pin` desc,`date` desc;";
															// $rst = mysql_query($sql) or die(mysql_error());
															// while ($row = mysql_fetch_assoc($rst)) {
															// 	echo formatNewsRow($row);
															// }
															?>
														</table>
													</div>


												</td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<form method="post" enctype="multipart/form-data" action="search_news.php" target="_blank">
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td width="1%">&nbsp;</td>
																<td width="16%">
																	<div align="right"><img src="../images/search-icon.png" width="24" height="24"></div>
																</td>
																<td width="33%"><input type="text" name="keyword_search" id="keyword_search3"></td>
																<td width="23%"><input type="submit" name="button" id="button" value="" style="width:60px;">
																	<input name="sarch_group" type="hidden" id="sarch_group" value="1"></td>
																<td width="27%"><a href="news.php?group=1"><img src="images/all.jpg" name="Image66" width="90" height="20" border="0" onMouseOut="restoreImg(this)" onMouseOver="swapImg(this)"></a></td>
															</tr>
														</table>
													</form>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td height="22" align="left" valign="top"><img src="images/line03.jpg" width="376" height="19"></td>
								</tr>
							</table>
						</td> -->
					<!-- <td align="left" valign="top">
							<table width="382" height="373" border="0" cellspacing="0">
								<tr>
									<td height="175" valign="top">
										<table width="377" height="568" border="0" align="right" cellpadding="0" cellspacing="0">
											<tr>
												<td width="18" rowspan="4" valign="top">&nbsp;</td>
												<td width="343" height="18" background="images/line01.jpg">&nbsp;</td>
											</tr>
											<tr>
												<td height="33" align="center" valign="top" background="images/line02.jpg"><img src="images/00116.2.jpg" width="343" height="33"></td>
											</tr>
											<tr>
												<td height="490" align="left" valign="top" background="images/line02.jpg">

													<table width="363" height="22" border="0" cellpadding="0" cellspacing="0">
														<tr>
															<td width="15">&nbsp;</td>
															<td width="344">
																<div id="div_news4">
																	<table width="358" border="0" cellspacing="0" cellpadding="0">
																		<?php
																		// $sql = "select * from `_news_` where `group`='22' and `status`='1' order by `pin` desc,`date` desc;";
																		// $rst = mysql_query($sql) or die(mysql_error());
																		// while ($row = mysql_fetch_assoc($rst)) {
																		// 	echo formatNewsRow($row);
																		// }
																		?>
																	</table>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2" align="right">
																<form method="post" enctype="multipart/form-data" action="search_news.php" target="_blank">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																		<tr>
																			<td width="1%">&nbsp;</td>
																			<td width="16%">
																				<div align="right"><img src="../images/search-icon.png" width="24" height="24"></div>
																			</td>
																			<td width="33%"><input type="text" name="keyword_search" id="keyword_search4"></td>
																			<td width="23%"><input type="submit" name="button" id="button" value="" style="width:60px;">
																				<input name="sarch_group" type="hidden" id="sarch_group" value="6"></td>
																			<td width="27%"><a href="news.php?group=22"><img src="images/all.jpg" name="Image66" width="90" height="20" border="0" onMouseOut="restoreImg(this)" onMouseOver="swapImg(this)"></a></td>
																		</tr>
																	</table>
																</form>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td height="22" align="left" valign="top"><img src="images/line03.jpg" width="376" height="19"></td>
											</tr>
										</table>
									</td>
								</tr>

							</table>
						</td> -->
					<!-- </tr> -->
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="2" height="31" align="right"></td>
						<td colspan="2" width="35%" height="31" align="left">
							<input type="checkbox" id="dont_show_popup2" onclick="setDontShowPopup(this)">
							<span id="dont_show_popup_status2"></span>
						</td>
						<td colspan="2" width="22%" height="31" align="right">
							<div id="google_translate_element"></div>
							<script type="text/javascript">
								function googleTranslateElementInit() {
									new google.translate.TranslateElement({
										pageLanguage: 'th',
										layout: google.translate.TranslateElement.InlineLayout.SIMPLE
									}, 'google_translate_element');
								}
							</script>
							<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="201" colspan="2" background="images/bgfoolindex.jpg">
				<table width="1019" height="179" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="479" height="73">&nbsp;</td>
						<td width="540"></td>
					</tr>
					<tr>
						<td height="106" colspan="2" valign="top">
							<table width="1000" height="30" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="1000" height="30" valign="top"></td>
								</tr>
							</table> <br />
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<script type="text/javascript">
		$(function() {
			//setTimeout(fade_function, 5000);
		});

		var BigSlide = [<?= "'" . implode("','", $BigSlide) . "'" ?>]
		var slide_index = randomFromInterval(0, <?= count($Slide_Array) - 1 ?>);

		function fade_function() {
			if (slide_index >= <?= count($Slide_Array) ?>)
				slide_index = 0;
			var slide_info = BigSlide[slide_index].split('||');
			var img = slide_info[0];
			$('#OverlayImage1').stop().fadeOut(2000, function() {
				$('#OverlayImage2').prop('href', slide_info[1]); //link
				$('#OverlayImage1').css('background', 'url(' + img + ')');
				$('#OverlayImage1').fadeIn(2000);
			});
			slide_index++;
			setTimeout(fade_function, 5000);
		}

		function randomFromInterval(from, to) {
			return Math.floor(Math.random() * (to - from + 1) + from);
		}

		function swapImg(obj) {
			$(obj).prop('src', './images/all.gif');
		}

		function restoreImg(obj) {
			$(obj).prop('src', './images/all.jpg');
		}

		function share_window(url) {
			window.open(url, '', 'width=500,height=300,top=100,left=250');
		}
		$(function() {
			$('#div_news1').slimscroll({
				width: '369px',
				height: '730px',
				railVisible: false,
				alwaysVisible: false
			});
			$('#div_news2').slimscroll({
				width: '369px',
				height: '730px',
				railVisible: false,
				alwaysVisible: false
			});
			$('#div_news3').slimscroll({
				width: '360px',
				height: '100px',
				railVisible: false,
				alwaysVisible: false
			});
			$('#div_news4').slimscroll({
				width: '363px',
				height: '450px',
				railVisible: false,
				alwaysVisible: false
			});

			$('#div_news5').slimscroll({
				width: '363px',
				height: '110px',
				railVisible: false,
				alwaysVisible: false
			});
		});
	</script>
	<?php
	function formatNewsRow($row)
	{
	// 2 lang by OOY 14072020
			if(true)
				{			
				$topic = stripslashes($row['topic_en']);
				if(!$topic) 
					{
					$topic = "English translation in progress";
					}
			}else{
				$topic = stripslashes($row['topic']);
			}
	
		$topicX = strip_tags($topic);
		$date =  $row['date'];
		$group = $row['group'];
		$icon = $row['icon'];
		$link = $row['link'];
		$pin = $row['pin'];

		$expire_date = str_replace('-', '', $row['expire_date']);
		if (intval($expire_date)) {
			if (date("Ymd") > $expire_date) {
				$x_sql = "update `_news_` set `status`='0' where `group`='$group' and `date`='$date' limit 1";
				mysql_query($x_sql);
				return;
			}
		}

		if ($icon == 'q' || $link) {
			$detail = $row['detail'];
			$target = "_blank";
			$href = trim($detail);
			$Url = '';
		} else {
			$Url = 'http://www.reg.kmitl.ac.th/index/';
			$href = 'group_news.php?group=' . $group . '~' . urlencode($date);
			$target = "_self";
		}

		if ($icon && $icon != 'q') {
			$icon_img = ' <img src="' . '../images/' . $icon . '">';
		} else
			$icon_img = '';

		if ($pin) {
			$icon_img = ' <img src="' . '../images/pin.png">';
		}

		$tr = '<tr><td width="14" align="left" height="22"></td><td width="344" align="left"><div style="margin-top:2px; margin-bottom:2px"><a href="' . $href . '" target="' . $target . '"  onclick="javascript:setHit(\'' . urlencode($date) . '\');" ><img src="images/iconn.png" width="9" height="9"> ' . $topic . $icon_img . '</a> ';
		//$tr .= '<a href="javascript:void(0);"><img src="icons/facebook-icon.png" onClick="javascript:share_window(\'http://www.facebook.com/sharer.php?s=100&p[title]=' . iconv('TIS-620', 'UTF-8', substr($topicX, 0, 50)) . '&p[url]=' . $Url . $href . '&p[images][0]=http://www.reg.kmitl.ac.th/images/reg_fb_logo.gif\');"></a>';
		//$tr .= '<a  href="javascript:void(0);"><img src="icons/twitter-icon.png" onClick="javascript:share_window(\'http://twitter.com/share?text=' . iconv('TIS-620', 'UTF-8', $topicX) . '\');"></a></div></td></tr>';
		return $tr;
	}

	?>

	<script language="javascript">
		function setHit(date) {
			$.post('hit_ajax.php', {
				'func': 'setHit',
				'date': date
			}, function() {});
		}

		function check_search(id) {
			var str = $.trim($('#' + id).val());
			if ($(str).length < 3) {
				alert('');
			}
		}
	</script>
	<?php //require_once('popup_menu.php'); ?>
</body>

</html>