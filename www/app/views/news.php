<div id="news">
    <div id="news-add">
        <a href=""><img style="margin:-10px 5px 0 0;" src="img/news-add.png" width="16" height="16" align="middle"/>Добавить новость</a>
    </div>

<form method="GET" action="/news/add">
Input Author...<input name="author" type="text" value="автор"/>
<br />
Input Text...<input name="text" type="text" value="текст"/>
<br />
<input type="submit">
</form>

<?php

if ($data != NULL) {
    foreach ($data as $newsItem) {
        @extract($newsItem);
        echo "
        <div id='news'>
            <div class='news-item'>
                <div><strong>Дата:</strong> $date</div>
                <div><strong>Автор:</strong> $author</div>
                <div><strong>Текст:</strong> $text</div>
            </div>
        </div>
    ";
    }
}

?>

</div>
