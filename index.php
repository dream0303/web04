<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
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
                        <a href="index.php?do=main&masid=1">
                                <img src="./img/0416.jpg">
                        </a>
                        <div style="padding:10px;">
                                <a href="index.php?do=main&masid=1">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=flow">購物流程</a> |
                                <a href="?do=car">購物車</a> |
                                <?= (isset($_SESSION['user'])) ? '<a href="api.php?do=logoutus">登出</a>' : '<a href="?do=buy">會員登入</a>' ?> |
                                <?= (isset($_SESSION['aduser'])) ? '<a href="admin.php">返回管理</a>' : '<a href="?do=adlogin">管理登入</a>' ?>
                        </div>
                        <marquee behavior="" direction="">情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</marquee> 
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                        <?
                        foreach (all('mu',['sh' => 1,'mas' => 0]) as $value) {
                        ?>
                                <div class="mainmu">
                                <a href="?do=main&masid=<?=$value['id']?>"><?=$value['txt']?>(<?=($value['id']==1)?rc('item'):rc('item',['mas'=> $value['id'] ])?>)</a>
                                        <div class="mw">
                                        <?
                                        foreach (all('mu',['sh' => 1,'mas' => $value['id'] ]) as $value2) {
                                        ?>
                                                <a href="?do=main&chiid=<?=$value2['id']?>"><?=$value2['txt']?>(<?=rc('item',['chi'=> $value2['id'] ])?>)</a>
                                        <?
                                        }
                                        ?> 
                                        </div>
                                </div>
                        <?
                        }
                        ?>
                        </div>

                        <span>
                                <div>進站總人數</div>
                                <div style="color:#f00; font-size:28px;">
                                        00005 </div>
                        </span>
                </div>
                <div id="right">
                        <?
                        if(!isset($_GET['do'])){
                                $_GET['do']='main';
                                $_GET['masid']=1;
                        }
                        if (substr($_GET['do'],0,2)=='ed' || substr($_GET['do'],0,3)=='add') {
				include 'view.php';
			}else {
				include $_GET['do'].'.php';
			}
                        ?>
                </div>
                <div id="bottom" style="line-height:70px;background:url(img/bot.png); color:#FFF;" class="ct">
                <?=one('foot',['id'=>1])[1]?> </div>
        </div>

</body>

</html>