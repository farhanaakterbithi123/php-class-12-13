<?php
include './inc/header.php';
?>

                    
  <h1 class="h3 mb-4 text-gray-800">welcome to our dashboard <?= $_SESSION['auth']['first_name'] . '' . $_SESSION['auth']['last_name'] ?></h1>

  <?php
  include './inc/footer.php';