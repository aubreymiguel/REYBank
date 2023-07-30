<?php 

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';
        
    $uHome = new UsersView();
    $uHome->u_home($Fname);

    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }


?>


<?php

    include ('layout/header.php');

?>

<div class="title-area" style="text-align:center; margin-top: 8%;">
<h2> Hi, <?php  echo $_SESSION['uName']; ?> </h2>
</div>

<?php

    include ('layout/footer.php');

?>