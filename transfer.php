<?php 

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';
     
    $trans_F = new TransController();
    $trans_F->transF();

    $t_code = new TransView();


    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }


?>


<?php

    include ('layout/header.php');

?>


<input type="hidden" value="<?php echo $_SESSION['uType'];  ?>">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header" style="font-size: 14px">Transfer Fund</div>
                <div class="card-body">

                <?php

                    if (isset($_GET['error_withdraw'])) {
                            
                        $error_withdraw = $_GET['error_withdraw'];

                        echo '<div class="alert alert-danger">';
                        echo $error_withdraw;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';
                    }


                    if (isset($_GET['wrong_message'])) {
                            
                        $wrong_message = $_GET['wrong_message'];

                        echo '<div class="alert alert-danger">';
                        echo $wrong_message;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';
                    }


                    if (isset($_GET['error_receiver_ACCNUM'])) {
                            
                        $error_receiver_ACCNUM = $_GET['error_receiver_ACCNUM'];

                        echo '<div class="alert alert-danger">';
                        echo $error_receiver_ACCNUM;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';
                    }

                    if (isset($_GET['not_enough'])) {
                            
                        $not_enough = $_GET['not_enough'];

                        echo '<div class="alert alert-danger">';
                        echo $not_enough;

                        echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo '</div>';
                    }
                    

                ?>
                
                    <form action=" " method="POST" enctype="multipart/form-data" autocomplete="off">

                        <table class="table table-striped" style="font-size: 12px;">
                            
                            <tr>
                                <th scope="col">Enter Receiver's Account No:</th>
                                <td>
                                    <input type="number" min="1" class="form-control rounded-left" name="r_accNum" id="r_accNum" required>
                                </td>   
                            </tr>
                            <tr>
                                <th scope="col">Amount:</th>
                                <td>
                                    <input type="number" min="1" class="form-control rounded-left" name="tAmount" id="tAmount" required>
                                </td>
                            </tr>

                            <input type="hidden" class="form-control" name="tType" id="tType" value="Transfer Fund">
                            
                            <input type="hidden" name="transactNum" class="form-control" value="<?php $t_code->transNum(); ?>">
                            <input type="hidden" name="uID" class="form-control" value= " <?php  echo $_SESSION['uID']; ?>" >
                            <input type="hidden" name="tStatus" class="form-control" value="Confirmed">
                            <input type="hidden" name="uBranch" class="form-control" value=" <?php echo $_SESSION['uBranch']; ?>">
                            <input type="hidden" name="uType" class="form-control" value=" <?php echo $_SESSION['uType']; ?>">


                            <!-- FOR NEXT -->

                            <input type="hidden" name="checkImg" class="form-control" value = " ">
                            <input type="hidden" name="checkNum" class="form-control" value = " " >
                            
                            <tr>
                                <td>
                                    <button type="submit" name="submit_w" class="btn btn-primary" style="font-size: 12px">Enter</button>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    include ('layout/footer.php');

?>