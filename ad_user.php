<h4>會員管理</h4>
<form action="api.php?do=sub" method="post">
<table>
    <tr>
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?
    foreach (all('user') as $value) {
    ?>
        <tr>
            <td><?=$value['name']?></td>
            <td><?=$value['txt']?></td>
            <td><?=str_replace('-','/',$value['dt'])?></td>
            <td>
                <input type="button" value="修改" onclick="lof('admin.php?do=eduser&id=<?=$value['id']?>')">
                刪除<input type="checkbox" name="del[]" value="<?=$value['id']?>">
            </td>
        </tr>
    <?
    }
    ?>
</table>
<input type="hidden" name="table" value="user">
<input type="submit" value="提交">
</form>