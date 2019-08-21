<?
if (!isset($_SESSION['user'])) {
    echo "<script>location.href='index.php?do=buy'</script>";
}
else{
    if(isset($_GET['id']))
    {
        $_SESSION['carid'][] = $_GET['id'];
    }
    if (!isset($_SESSION['carid'])) {
        echo "購物車內沒有商品";
    }
    else{
        echo "<h4>".$_SESSION['user']."的購物車"."</h4>";
        ?>
        <table>
            <tr>
                <td>編號</td>
                <td>商品名稱</td>
                <td>數量</td>
                <td>庫存量</td>
                <td>單價</td>
                <td>小計</td>
                <td>刪除</td>
            </tr>
        
        <?
        foreach ($_SESSION['carid'] as $id) {
            $value = one('item',['id'=> $id]);
            ?>
            <tr>
                <td><?=$value['id']?></td>
                <td><?=$value['txt']?></td>
                <td><input type="text" name="" value="1"></td>
                <td><?=$value['num']?></td>
                <td><?=$value['pri']?></td>
                <td><?=$value['pri']?></td>
                <td><img src="./img/0415.jpg" alt="" srcset=""></td>
            </tr>
            <?
        }
    ?>
        </table>
        <img src="./img/0411.jpg" alt="" srcset="" onclick="lof('index.php?do=main&masid=1')">
        <img src="./img/0412.jpg" alt="" srcset="" onclick="lof('index.php?do=addod')">
    <?
    }
}
?>
