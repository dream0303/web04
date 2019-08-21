<h4>第一次購物</h4>
<a href="index.php?do=adduser"><img src="./img/0413.jpg" alt="" srcset=""></a><br>
<h4>會員登入</h4>
<?
$a = rand(10,99);
$b = rand(10,99);
?>
<form action="api.php?do=chklogin&ans=<?=$a+$b?>" method="post">
帳號 <input type="text" name="txt" id=""><br>
密碼 <input type="password" name="pw" id=""><br>

驗證碼 <?= $a . " + " . $b . " = "?>  <input type="text" name="ans" id=""><br>
<input type="submit" value="確定">
</form>