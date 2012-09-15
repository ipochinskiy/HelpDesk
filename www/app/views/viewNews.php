That's a news view!<br />
<a href="/">main</a>
<br /><br />
add newsItem:
<form method="GET" action="/news/addNewsItem">
Input newsItemAuth...<input name="auth" type="text" value="SSS"/>
<br />
Input newsItemTags...<input name="tags" type="text" value="some tags"/>
<br />
Input newsItemText...<input name="text" type="text" value="New newsItem!"/>
<br />
<input type="submit">
</form>

<?php

if ($data == NULL) {
    exit;
}
foreach ($data as $newsItem) {
    @extract($newsItem);
    echo "date => " . $date . "<br />";
    echo "auth => " . $auth . "<br />";
    echo "tags => " . $tags . "<br />";
    echo "text => " . $text . "<br /><br />";
}
?>
