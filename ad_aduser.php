<h4>管理權限設置</h4>
<input type="button" value="新增管理員" onclick="lof('admin.php?do=addleader');"><br>
<form action="api.php?do=sub" method="post">
<table>
    <tr>
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?
    foreach (all('leader') as $value) {
    ?>
        <tr>
            <td><?=$value['txt']?></td>
            <td><?=str_repeat('*',strlen($value['pw']))?></td>
            <td>
                <?
                if ($value['id']== 1 ) {
                    echo "此帳號為最高權限";
                }
                else{
                    ?>
                    <input type="button" value="修改" onclick="lof('admin.php?do=edleader&id=<?=$value['id']?>')">
                    刪除<input type="checkbox" name="del[]" value="<?=$value['id']?>" id="">
                    <?
                }
                ?>

            </td>
        </tr>
    <?
    }
    ?>
</table>
<input type="hidden" name="table" value="leader">
<input type="submit" value="提交">
</form>