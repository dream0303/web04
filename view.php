<?
include_once 'base.php';
if (substr($_GET['do'],0,2)=='ed') {
    ?>
    <form action="api.php?do=ed" method="post" enctype="multipart/data-form">
    <?
    switch (ltrim($_GET['do'],'ed')) {
        case 'item':
            ?>
            <h4>修改商品</h4><br>
            所屬大類 <select name="mas" id="mas">
                        <?
                        foreach (all('mu',['mas' => 0 ]) as $value) {
                            ?>
                            <option value="<?=$value['id']?>"><?=$value['txt']?></option>
                            <?
                        }
                        ?>
                    </select><br>
            所屬中類 <select name="chi" id="chi">
                    </select><br>
            商品編號 <?=$_GET['id']?><br>
            商品名稱 <input type="text" name="txt" id=""><br>
            價格 <input type="text" name="pri" id=""><br>
            規格 <input type="text" name="form" id=""><br>
            庫存量 <input type="text" name="num" id=""><br>
            商品圖片 <input type="file" name="filename" id=""><br>
            商品介紹 <textarea name="con" id="" cols="30" rows="10"></textarea><br>
            <?
            break;
        case 'leader':
            $data = one('leader',['id'=>$_GET['id']])
            ?>
            <h4>修改管理員權限</h4><br>
            帳號 <input type="text" name="txt" id="txt" value="<?=$data['txt']?>"><br>
            密碼 <input type="text" name="pw" id="" value="<?=$data['pw']?>"><br>
            權限 <br>
                <input type="checkbox" name="item" value="1" <?=($data['item']==1)?'checked':''?>>商品分類與管理<br>
                <input type="checkbox" name="od" value="1" <?=($data['od']==1)?'checked':''?>>訂單管理<br>
                <input type="checkbox" name="user" value="1"<?=($data['user']==1)?'checked':''?>>會員管理<br>
                <input type="checkbox" name="foot" value="1" <?=($data['foot']==1)?'checked':''?>>頁尾版權區管理<br>
                <input type="checkbox" name="news" value="1" <?=($data['news']==1)?'checked':''?>>最新消息管理<br>
            <?
            break;
        case 'user':
            $value = one('user',['id' => $_GET['id'] ]);
            ?>
            <h4>編輯會員資料</h4><br>
            帳號 <?=$value['txt']?><br>
            密碼 <?=str_repeat('*',strlen($value['pw']))?><br>
            累積交易額 0<br>
            姓名 <input type="text" name="name" id="" value="<?=$value['name']?>"><br>
            電子信箱 <input type="text" name="em" id="" value="<?=$value['em']?>"><br>
            住址 <input type="text" name="addr" id="" value="<?=$value['addr']?>"><br>
            電話 <input type="text" name="tel" id="" value="<?=$value['tel']?>"><br>
            <?
            break;
        case 'foot':
            $_GET['id']=1;
            ?>
            <h1>編輯頁尾版權區</h1>
            頁尾宣告內容 <input type="text" name="txt" value="<?=one('foot',['id'=>1])[1]?>"><br>
            <?
            break;
    }
    ?>
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="hidden" name="table" value="<?=ltrim($_GET['do'],'ed')?>">
    <input type="submit" value="編輯"><input type="reset" value="重置">
    </form>
    <?
}else {
    ?>
    <form action="api.php?do=add" method="post" enctype="multipart/data-form">
    <?
    switch (ltrim($_GET['do'],'add')) {
        case 'item':
    ?>
            <h4>新增商品</h4><br>
            所屬大類 <select name="mas" id="mas">
                        <?
                        foreach (all('mu',['mas' => 0 ]) as $value) {
                            ?>
                            <option value="<?=$value['id']?>"><?=$value['txt']?></option>
                            <?
                        }
                        ?>
                    </select><br>
            所屬中類 <select name="chi" id="chi">
                    </select><br>
            商品編號 完成後自動分配<br>
            商品名稱 <input type="text" name="txt" id=""><br>
            價格 <input type="text" name="pri" id=""><br>
            規格 <input type="text" name="form" id=""><br>
            庫存量 <input type="text" name="num" id=""><br>
            商品圖片 <input type="file" name="filename" id=""><br>
            商品介紹 <textarea name="con" id="" cols="30" rows="10"></textarea><br>
            
    <?
            break;
        case 'user':
    ?>
            <h4>會員註冊</h4><br>
            姓名 <input type="text" name="name" id=""><br>
            帳號 <input type="text" name="txt" id="txt"><input type="button" value="檢測帳號" onclick="chkuser()"><br>
            密碼 <input type="text" name="pw" id=""><br>
            電話 <input type="text" name="tel" id=""><br>
            住址 <input type="text" name="addr" id=""><br>
            電子信箱 <input type="text" name="em" id=""><br>
            <input type="hidden" name="dt" value="<?=date('Y-m-d')?>">
            
    <?
            break;
        case 'leader':
    ?>
            <h4>新增管理帳號</h4><br>
            帳號 <input type="text" name="txt" id="txt"><br>
            密碼 <input type="text" name="pw" id=""><br>
            權限 <br>
                <input type="checkbox" name="item" value="1">商品分類與管理<br>
                <input type="checkbox" name="od" value="1">訂單管理<br>
                <input type="checkbox" name="user" value="1">會員管理<br>
                <input type="checkbox" name="foot" value="1">頁尾版權區管理<br>
                <input type="checkbox" name="news" value="1">最新消息管理<br>
    <?
            break;
        case 'od':
            $user = one('user' , ['txt' => $_SESSION['user']]);
            ?>
            <h4>填寫資料</h4><br>
            帳號 <?=$user['txt']?><br>
            姓名 <input type="text" name="name" value="<?=$user['name']?>"><br>
            電子信箱 <input type="text" name="em" value="<?=$user['em']?>"><br>
            聯絡地址 <input type="text" name="addr" value="<?=$user['addr']?>"><br>
            連絡電話 <input type="text" name="tel" value="<?=$user['tel']?>"><br>
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
            foreach ($_SESSION['carid'] as $id) {
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
            <input type="hidden" name="txt" value="<?=$_SESSION['user']?>">
            <input type="hidden" name="pri" value="<?=$tt?>">
            <input type="hidden" name="no" value="<?=date('Ymdhms')?>">
            <input type="hidden" name="dt" value="<?=date('Y/m/d')?>">
            <?
            break;
    }
    ?>
    <input type="hidden" name="table" value="<?=ltrim($_GET['do'],'add')?>">
    <input type="submit" value="<?=(ltrim($_GET['do'],'add')=='od')?'確定送出':'新增'?>">
    <input type="reset" value="重置">
    <?=(ltrim($_GET['do'],'add')=='od')?'<input type="button" value="返回修改訂單" onclick="history.back();">':''?>
    
    </form>
    <?
}
?>
<!-- ============================ -->
<script>
    $('#mas').on('change',function () {
        let mas = $('#mas').val();
        $.post("api.php?do=getchi",{mas},function (r) {
            $('#chi').html(r);
        })
    })
</script>

<script>
function chkuser() {
    let txt = $('#txt').val();
    $.post("api.php?do=chkuser",{txt},function (r) {
        alert(r);
    })
}
</script>