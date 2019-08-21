
<?
$od = one('od',['id'=>$_GET['id']]);
?>
<h1>訂單編號<?=$od['no']?>的詳細資料</h1><br>
帳號 <?=$od['txt']?><br>
姓名 <input type="text" name="name" value="<?=$od['name']?>"><br>
電子信箱 <input type="text" name="" value="<?=$od['em']?>"><br>
聯絡地址 <input type="text" name="" value="<?=$od['addr']?>"><br>
連絡電話 <input type="text" name="" value="<?=$od['tel']?>"><br>
<table>
<tr>
    <td>商品名稱</td>
    <td>編號</td>
    <td>數量</td>
    <td>單價</td>
    <td>小計</td>
</tr>
<?

$tt=0;
$carid = unserialize($od['carid']);

foreach ($carid as $id) {
    $value = one('item',['id'=>$id]);
    $tt += $value['pri'];
    ?>
    <tr>
        <td><?=$value['txt']?></td>
        <td><?=$value['id']?></td>
        <td>1</td>
        <td><?=$value['pri']?></td>
        <td><?=$value['pri']?></td>
    </tr>
    <?
}
?>
</table>
<hr>
總價:<?=$tt?><br>
<input type="button" value="返回" onclick="history.back();">