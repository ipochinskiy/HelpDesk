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