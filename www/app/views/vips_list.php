<div id="vip-add">
    <a href="vips/add"><img style="margin:-10px 5px 0 0;" src="img/news-add.png" width="16" height="16" align="middle"/>Добавить VIP</a>
</div>

<?php

if ($data != NULL) {
    echo "<ul id='vips'>";
    foreach ($data as $vip) {
        echo "<li class='vip-item'><a href='/vips?id=" . $vip["id"] . "'>" . $vip["name"] . "</a><li>";
    }
    echo "</ul>";
} else {
    echo "It seems that there's no VIP clients...";
}

?>
