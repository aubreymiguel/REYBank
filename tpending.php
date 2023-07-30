<?php 

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';
     
    $confirm_Tran = new TransController();
    $result1 = $confirm_Tran->t_confirmation();

    $result2 = $confirm_Tran->depCheck_confirm();


    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }


?>


<?php

    include ('layout/header.php');

?>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#with_cash" class="nav-link active" data-toggle="tab">Withdrawal and Deposit (Cash)</a>
    </li>
    <li class="nav-item">
        <a href="#check" class="nav-link" data-toggle="tab">Deposit (Check)</a>
    </li>

</ul>

<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mx-auto">
                    <div class="card" style="margin-top: 3%">
                        <div class="card-header">Transaction Requests</div>
                        <div class="card-body">

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="with_cash">

                                <table class="table table-striped" style="font-size: 11px;">
                                    <tr>
                                        <th scope="col">Account Number:</th>
                                        <th scope="col">Transaction ID:</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Current Balance</th>
                                        <th></th>
                                
                                        
                                        
                                    </tr>

                                    <?php

                                    if ($result1) {

                                        while ($data = mysqli_fetch_assoc($result1))
                                        
                                        {

                                            if ($data['tType'] == 'Withdraw' || $data['tType'] == 'Deposit (Cash)') {

                                    ?>


                                    <tr>
                                        <td><?php echo $data['u_accNum'] ?></td>
                                        <td><?php echo $data['transactNum'] ?></td>
                                        <td style="width: 3px"><?php echo $data['tDate'] ?></td>
                                        <td style="width: 3px"><?php echo $data['tType'] ?></td>
                                        <td><?php echo $data['tAmount'] ?></td>
                                        <td><?php echo $data['uBalance'] ?></td>
                                        <td>
                                            <a href="?verify_tran=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-success" style="font-size: 11px">Confirm</button></a>
                                            &nbsp; &nbsp;
                                            <a href="?reject_tran=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-danger" style="font-size: 11px">Cancel</button></a>
                                        </td>
                                    </tr>

                                    <?php
                                            }
                                        }
                                    }

                                    ?>

                                </table>

                            </div>
                            <div class="tab-pane fade show" id="check">

                
                                <table class="table table-striped" style="font-size: 11px;" >
                                    <tr>
                                        <th scope="col">Sender's Account No:</th>
                                        <th scope="col">Receiver's Account No:</th>
                                        <th scope="col">Transaction ID:</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Check No.</th>
                                        <th scope="col">Amount</th>
                                        <th></th>
                                
                                        
                                        
                                    </tr>

                                    <?php

                                    if ($result2) {

                                        while ($data = mysqli_fetch_assoc($result2))
                                        
                                        {

                                            if ($data['tType'] == 'Deposit (Check)') {

                                    ?>


                                    <tr>
                                        <td><?php echo $data['u_accNum'] ?></td>
                                        <td><?php echo $data['r_accNum'] ?></td>
                                        <td><?php echo $data['transactNum'] ?></td>
                                        <td style="width: 3px"><?php echo $data['tDate'] ?></td>
                                        <td style="width: 3px"><?php echo $data['tType'] ?></td>
                                        <td><?php echo $data['check_num'] ?></td>
                                        <td><?php echo $data['tAmount'] ?></td>
                                        <td>
                                            <a href="?verify_tran=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-success" style="font-size: 11px">Confirm</button></a>
                                            &nbsp; &nbsp;
                                            <a href="?reject_tran=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-danger" style="font-size: 11px">Cancel</button></a>
                                        </td>
                                    </tr>

                                    <?php
                                            }
                                        }
                                    }

                                    ?>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php

    include ('layout/footer.php');

?>
