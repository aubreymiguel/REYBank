<?php 

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';
     
    $pendingTran = new TransView();
    $pending = $pendingTran->transPending();


    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }


?>


<?php

    include ('layout/header.php');

?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">Pending Transaction</div>
                <div class="card-body">

                <table class="table table-striped" style="font-size: 12px;">
                    <tr>
                        <th scope="col">Transaction ID:</th>
                        <th scope="col">Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Amount</th>
                        
                        
                    </tr>

                    <?php

                    if ($pending) {

                        while ($data = mysqli_fetch_assoc($pending))
                        
                        {

                    ?>


                    <tr>

                        <td><?php echo $data['transactNum'] ?></td>
                        <td><?php echo $data['tDate'] ?></td>
                        <td><?php echo $data['tType'] ?></td>
                        <td><?php echo $data['tAmount'] ?></td>
                    </tr>

                    <?php
                        }
                    }

                    ?>

                </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php

    include ('layout/footer.php');

?>
