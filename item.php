<?
        foreach (all('item',['id' => $_GET['id'] ]) as $value) {
            ?>
            圖示: <a href="index.php?do=item&id=<?=$value['id']?>&masid=<?=$value['mas']?>&chiid=<?=$value['chi']?>">
                    <img style="width:100px;" src="./img/<?=$value['filename']?>" alt=""></a><br>
            商品名稱:<?=$value['txt']?><br>
            價錢:<?=$value['pri']?><br>
            規格:<?=$value['form']?><br>
            簡介:<?=$value['con']?><br>
            <a href="index.php?do=buy&id=<?=$value['id']?>&masid=<?=$value['mas']?>&chiid=<?=$value['chi']?>"><img src="./img/0402.jpg" alt=""></a>
            <input type="button" value="返回" onclick="history.back();"><br>
            <hr>
            <?
        }
?>