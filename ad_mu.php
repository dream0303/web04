<h4>商品分類</h4>
<form action="api.php?do=addmas" method="post">
    新增大類<input type="text" name="txt" id="">
    <input type="submit" value="新增">
</form>

<form action="api.php?do=addchi" method="post">
    新增中類<select name="mas" id="">
            <?
            foreach (all('mu',['sh' => 1 , 'mas' => 0 ]) as $value) {
            ?>
                <option value="<?=$value['id']?>"><?=$value['txt']?></option>
            <?
            }
            ?>
            </select>
    <input type="text" name="txt" id="">
    <input type="submit" value="新增">
</form>
<hr>

<form action="api.php?do=sub" method="post">
<table>
<?
    foreach (all('mu',['mas' => 0 ]) as $value) {
    ?>
        <tr>
            <td>大類修改<input type="text" name="txt[]" value="<?=$value['txt']?>" id=""></td>
            <td>
                刪除<input type="checkbox" name="del[]" value="<?=$value['id']?>">
                <input type="hidden" name="id[]" value="<?=$value['id']?>">
            </td>
        </tr>
        <?
        foreach (all('mu',['mas' => $value['id'] ]) as $value2) {
        ?>
        <tr>
            <td>中類修改<input type="text" name="txt[]" value="<?=$value2['txt']?>" id=""></td>
            <td>
                刪除<input type="checkbox" name="del[]" id="<?=$value2['id']?>">
                <input type="hidden" name="id[]" value="<?=$value2['id']?>">
            </td>
        </tr>
        <?
        }
    }
?>
</table>
<input type="hidden" name="table" value="mu">
<input type="submit" value="提交">
</form>
<hr>
<h4>商品管理</h4>
<input type="button" value="新增商品" onclick="lof('admin.php?do=additem');"><br>
<form action="api.php?do=sub" method="post">
<table>
    <tr>
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?
    foreach (all('item') as $value) {
        ?>
        <tr>
            <td><?=$value['id']?></td>
            <td><?=$value['txt']?></td>
            <td><?=$value['num']?></td>
            <td><?=($value['sh']==1)?'販售中':'已下架'?></td>
            <td>
                <input type="button" value="修改" onclick="lof('admin.php?do=editem&id=<?=$value['id']?>');">
                刪除<input type="checkbox" name="del[]" value="<?=$value['id']?>" id=""><br>
                上架/下架<input type="checkbox" name="sh[]" value="<?=$value['id']?>" id="" <?=($value['sh']==1)?'checked':''?>>
                <input type="hidden" name="id[]" value=<?=$value['id']?>>
            </td>
        </tr>
        <?
    }
    ?>
</table>
<input type="hidden" name="table" value="item">
<input type="submit" value="提交">
</form>
<!-- <select name="" id="">
    <option value=""></option>
</select> -->