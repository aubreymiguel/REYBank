<?php 



    include 'includes/autoLoader.inc.php';
   
    $uDeta = new UsersView();
    $uDeta->a_deta();

    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }


?>


<?php

    include ('layout/header.php');

?>

<div class="container">
    <div class="row">
        <table class="table table-striped">
            <tr>
            <th scope="col">Name</th>
            <td><?php echo $_SESSION['uFname'] . " " . $_SESSION['uLast'] ?></td>
            </tr>

            <tr>
            <th scope="col">Username</th>
            <td><?php echo $_SESSION['uName'] ?></td>
            </tr>

            <tr>
            <th scope="col">Email</th>
            <td><?php echo $_SESSION['uEma'] ?></td>
            </tr>

            <tr>
            <th scope="col">Contact No.</th>
            <td><?php echo $_SESSION['uMob'] ?></td>
            </tr>
            
            <tr>
            <th scope="col">Address</th>
            <td><?php echo $_SESSION['uHouseNo'] . " " . $_SESSION['uStreet'] . ", " . $_SESSION['uBrgy'] . ", " . $_SESSION['uCity'] . ", " . $_SESSION['uZip']?></td>
            </tr>

            <tr>
            <th scope="col">Branch</th>
            <td><?php echo $_SESSION['uBranch'] ?></td>
            </tr>

        </table>
      
    </div>
</div>






<?php

    include ('layout/footer.php');

?>