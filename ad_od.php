<h1>訂單管理</h1>
<form action="api.php?do=sub" method="post">
<table>
    <tr>
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?
    foreach (all('od') as $value) {
    ?>
    <tr>
        <td><a href="admin.php?do=od2&id=<?=$value['id']?>"><?=$value['no']?></a></td>
        <td><?=$value['pri']?></td>
        <td><?=$value['txt']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dt']?></td>
        <td>刪除<input type="checkbox" name="del[]" value="<?=$value['id']?>"></td>
    </tr>
    <?
    }
    ?>
</table>
<input type="hidden" name="table" value="od">
<input type="submit" value="提交">
</form>