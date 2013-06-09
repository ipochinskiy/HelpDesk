<div id="instructions-add">
    <a href="/instructions/add"><img style="margin:-10px 5px 0 0;" src="/img/news-add.png" width="16" height="16" align="middle"/>Добавить инструкцию</a>
</div>

<?php

foreach ($data as $d) {
    echo "<h1>" . $d["sectionName"][0] . "</h1>";
    echo "<ul>";
    foreach ($d["children"] as $c) {
        echo "<li><a href='/instructions?section=" . $d["sectionId"][0] . "&item=" . $c[0] -> id . "'>". $c[0] -> name . "</a></li>";
    }
    echo "</ul>";
}

?>