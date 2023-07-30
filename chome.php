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


<?php

    $cli = new UsersView();
                        
    $result = $cli->cli2();

    if ($result) {

        while ($data = mysqli_fetch_assoc($result))

        {
?>

<input type="hidden" value="<?php echo $_SESSION['uType'];  ?>">

<div class="title-area" style="margin-top: 4%; margin-bottom: 4%;">
<h6> Welcome, <?php  echo $data['uFname']; ?> </h6>
</div>

<div class="container">
    <?php
        if (isset($_GET['success_trans'])) {
                                    
            $success_trans = $_GET['success_trans'];

            echo '<div class="alert alert-success">';
            echo $success_trans;

            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '</div>';
        }
    ?>
    <div class="row justify-content-center">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">Savings and Checking</div>
                <div class="card-body">

                <table class="table table-striped" style="font-size: 12px;">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Current Balance</th>
                        <th scope="col">Available Balance</th>
                        
                    </tr>


                    <tr>

                   

                    <td><?php echo $data['uFname'] . " " . $data['uLast'] ?></td>
                    <td><?php echo $data['accNum'] ?></td>
                    <td><?php echo $data['uBalance'] ?></td>
                    <td><?php echo $data['uBalance'] ?></td>

                    <input type="hidden" value="<?php echo $data['uID'] ?>">
                    </tr>

                    <?php

                        }
                    }

                    ?>

                </table>

                <p style="margin-top: 10%; font-size: 12px;"><b>Note:</b> The minimum balance is 1000.00. 
                    Do not withdraw or transfer money that is less than your balance. 
                    The Teller will cancel it when you do so.
                </p>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

    include ('layout/footer.php');

?>