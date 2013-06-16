<?php

foreach ($data as $d) {
    echo "<h1>" . $d["sectionName"] . "</h1>";
    echo "<ul>";
    foreach ($d["children"] as $c) {
        echo "<li><a href='/instructions?section=" . $d["sectionId"] . "&item=" . $c["id"] . "'>". $c["name"] . "</a></li>";
    }
    echo "</ul>";
}

?>