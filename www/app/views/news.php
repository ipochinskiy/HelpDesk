<div id="dialog-form" title="Create new user">
    <p class="validateTips">All form fields are required.</p>
    <form action="/" method="post">
        <fieldset>
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="text ui-widget-content ui-corner-all" />
            <label for="text">Text</label>
            <input type="text" name="text" id="text" value="" class="text ui-widget-content ui-corner-all" />
        </fieldset>
    </form>
</div>

<div id="news">
    <div id="news-add">
        <a href=""><img style="margin:-10px 5px 0 0;" src="img/news-add.png" width="16" height="16" align="middle"/>Добавить новость</a>
    </div>

<!--        <form method="POST" action="/news/add">-->
<!--            Input Author...<input name="author" type="text" value="автор"/>-->
<!--            <br />-->
<!--            Input Text...<input name="text" type="text" value="текст"/>-->
<!--            <br />-->
<!--            <input type="submit">-->
<!--        </form>-->

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
    }
    ?>

</div>
