<?php
if(!isset( $_SESSION['chaynik'] )) {
	echo 'В доступе отказано, проверьте файл '.basename(__FILE__);
	exit();
}
?>
