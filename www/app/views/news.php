<!--        <form method="POST" action="/news/add">-->
<!--            Input Author...<input name="author" type="text" value="автор"/>-->
<!--            <br />-->
<!--            Input Text...<input name="text" type="text" value="текст"/>-->
<!--            <br />-->
<!--            <input type="submit">-->
<!--        </form>-->

<div id="news">

    <?php

    if ($data != NULL) {
        foreach ($data as $newsItem) {
            ?>
            <div class='news-item'>
                <div><strong>Дата:</strong> <?php echo $newsItem["date"] ?> </div>
                <div><strong>Автор:</strong> <?php echo $newsItem["author"] ?> </div>
                <div><strong>Текст:</strong> <?php echo $newsItem["text"] ?> </div>
            </div>
        <?php
        }
    } else {
        echo "It seems that there's no news...";
    }
    ?>

</div>
