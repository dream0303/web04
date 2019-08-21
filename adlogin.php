<h4>會員登入</h4>
<?
$a = rand(10,99);
$b = rand(10,99);
?>
<form action="api.php?do=chkadlogin&ans=<?=$a+$b?>" method="post">
帳號 <input type="text" name="txt" id=""><br>
密碼 <input type="password" name="pw" id=""><br>

驗證碼 <?= $a . " + " . $b . " = "?>  <input type="text" name="ans" id=""><br>
<input type="submit" value="確定">
</form>