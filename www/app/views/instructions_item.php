<div id="h">
    <a href="/instructions/edit?section=<?php echo $section ?>&id=<?php echo $id ?>"><img src="/img/document_pencil.png" width="24" height="24" align="middle" alt="" /></a>
    <a href="/instructions/delete?section=<?php echo $section ?>&id=<?php echo $id ?>"><img src="/img/document_close.png" width="24" height="24" align="middle" alt="" /></a>
    <h1><?php echo $name ?></h1>
</div>
<div style="float: none;">

    <?php
    echo $content;
    ?>

</div>