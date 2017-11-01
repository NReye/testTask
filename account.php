<?php
session_start();
include_once('includes/header.php');
?>
<div class="data-pad">
<h3>Name <?php echo $_SESSION['name']; ?></h3>
<h3>Email <?php echo $_SESSION['email']; ?></h3>
</div>