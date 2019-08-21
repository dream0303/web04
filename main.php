<?
if(isset($_GET['masid'])){
    if ($_GET['masid']==1) {
        foreach (all('item',['sh' => 1 ]) as $value) {
            ?>
            圖示: <a href="index.php?do=item&id=<?=$value['id']?>&masid=<?=$value['mas']?>&chiid=<?=$value['chi']?>">
                    <img style="width:100px;" src="./img/<?=$value['filename']?>" alt=""></a><br>
            商品名稱:<?=$value['txt']?><br>
            價錢:<?=$value['pri']?><br>
            規格:<?=$value['form']?><br>
            簡介:<?=$value['con']?><br>
            <a href="index.php?do=car&id=<?=$value['id']?>"><img src="./img/0402.jpg" alt=""></a><br>
            <hr>
            <?
        }
    }
    else{
        foreach (all('item',['sh' => 1 , 'mas' => $_GET['masid'] ]) as $value) {
            ?>
            圖示: <a href="index.php?do=item&id=<?=$value['id']?>&masid=<?=$value['mas']?>&chiid=<?=$value['chi']?>">
                    <img style="width:100px;" src="./img/<?=$value['filename']?>" alt=""></a><br>
            商品名稱:<?=$value['txt']?><br>
            價錢:<?=$value['pri']?><br>
            規格:<?=$value['form']?><br>
            簡介:<?=$value['con']?><br>
            <a href="index.php?do=car&id=<?=$value['id']?>"><img src="./img/0402.jpg" alt=""></a><br>
            <hr>
            <?
        }
    }

}
if(isset($_GET['chiid'])){
    foreach (all('item',['sh' => 1 , 'chi' => $_GET['chiid'] ]) as $value) {
        ?>
        圖示: <a href="index.php?do=item&id=<?=$value['id']?>&masid=<?=$value['mas']?>&chiid=<?=$value['chi']?>">
                <img style="width:100px;" src="./img/<?=$value['filename']?>" alt=""></a><br>
        商品名稱:<?=$value['txt']?><br>
        價錢:<?=$value['pri']?><br>
        規格:<?=$value['form']?><br>
        簡介:<?=$value['con']?><br>
        <a href="index.php?do=car&id=<?=$value['id']?>"><img src="./img/0402.jpg" alt=""></a><br>
        <hr>
        <?
    }
}
?>