<?php include("../core/management.php"); ?>
<?php include("../core/head-nomenu.php"); ?>
<?PHP include 'connect.php'; ?>

<?php

ob_start();

$code = $_SESSION['code'];

mysqli_query($con,"UPDATE memos SET isDeleted = '1' WHERE code='$code' AND id='$_GET[id]'");

mysqli_close($con);
printf("<script>location.href='../memos-manage.php'</script>");

?>