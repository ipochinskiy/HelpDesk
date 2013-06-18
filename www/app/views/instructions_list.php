<div id="accordion">

<?php

foreach ($data as $d) {
    echo "<h3>" . $d["sectionName"] . "</h3>";
    echo "<ul>";
    foreach ($d["children"] as $c) {
        echo "<li><a href='/instructions?section=" . $d["sectionId"] . "&item=" . $c["id"] . "'>". $c["name"] . "</a></li>";
    }
    echo "</ul>";
}

?>

</div>