<div id="news">
    <div id="vip-add">
        <a href=""><img style="margin:-10px 5px 0 0;" src="img/news-add.png" width="16" height="16" align="middle"/>Добавить VIP</a>
    </div>

    <ul id='vips'>

        <?php
        if ($data != null) {
            foreach ($data as $vip) {
                if ($vip["name"] != null && $vip["name"] != "") {
                    echo "<li class='vip-item'><a href='/vips/item?id=" . $vip["id"] . "'>" . $vip["name"] . "</a><li>";
                }
            }
        } else {
            echo "It seems that there's no VIP clients...";
        }
        ?>

    </ul>
</div>
