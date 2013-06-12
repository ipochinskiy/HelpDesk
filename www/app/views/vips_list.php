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
