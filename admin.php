<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>┌精品電子商務網站」</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
<?
include 'base.php';
?>
	<iframe name="back" style="display:none;"></iframe>
	<div id="main">
		<div id="top">
			<a href="?">
				<img src="./img/0416.jpg">
			</a>
			<img src="./img/0417.jpg">
		</div>
		<div id="left" class="ct">
			<div style="min-height:400px;">
			<?
				$mu = one('leader',['txt' => $_SESSION['aduser']]);
				if($_SESSION['aduser']== 'admin') echo '<a href="?do=aduser">管理權限設置</a>';
				if($mu['item'] == 1) echo '<a href="?do=mu">商品分類與管理</a>';
				if($mu['od'] == 1) echo '<a href="?do=od">訂單管理</a>';
				if($mu['user'] == 1) echo '<a href="?do=user">會員管理</a>';
				if($mu['foot'] == 1) echo '<a href="?do=edfoot">頁尾版權管理</a>';
				if($mu['news'] == 1) echo '<a href="?do=news">最新消息管理</a>';
				echo '<a href="api.php?do=logoutad" style="color:#f00;">登出</a>';
			?>

			</div>
		</div>
		<div id="right">
			<?
			if (!isset($_GET['do'])) {
				$_GET['do'] = 'aduser';
			}

			if (substr($_GET['do'],0,2)=='ed' || substr($_GET['do'],0,3)=='add') {
				include 'view.php';
			}else {
				include 'ad_'.$_GET['do'].'.php';
			}
			?>
		</div>
		<div id="bottom" style="line-height:70px; color:#FFF; background:url(img/bot.png);" class="ct">
			<?=one('foot',['id'=>1])[1]?> </div>
	</div>

</body>

</html>