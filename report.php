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

    if ($_SESSION['uType'] == '3') {

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">Transaction Report</div>
                <div class="card-body">

                    <input type="text" class="form-control rounded-left" style="max-width: 30%; font-size: 12px; margin-bottom: 3%" id="myInput" onkeyup="myFunction()" placeholder="Search for Transaction Type..">

                    <h4>Total: 
                        <?php

                            $t_Code = new TransView();

                            echo $t_Code->transTotal();

                        ?>.00
                    </h4>
                    
                    <table id="myTable" class="table table-striped" style="font-size: 12px;">
                    <tr>
                        <th scope="col">Account Number</th>
                        <th scope="col">Receiver's Account No. <br> (for Check and Transfer Fund)</th>
                        <th scope="col">Date</th>
                        <th scope="col">Processed By</th>
                        <th scope="col">Type</th>
                        <th scope="col">Check No. <br> (for Check Deposit)</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                    
                    <?php

                        $cHis = new TransView();
                        
                        echo $cHis->a_Report();


                    ?>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    } else if ($_SESSION['uType'] == '2') {

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">Transaction Report</div>
                <div class="card-body">

                    <input type="text" class="form-control rounded-left" style="max-width: 30%; font-size: 12px; margin-bottom: 3%" id="myInput" onkeyup="myFunction()" placeholder="Search for Transaction Type..">

                    <h4>Total: 
                    <?php

                        $t_Code = new TransView();

                        echo $t_Code->transTotal();

                    ?>.00
                    </h4>
                    
                    <table id="myTable" class="table table-striped" style="font-size: 12px;">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Receiver's Account No. <br> (for Check and Transfer Fund)</th>
                        <th scope="col">Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Check No. <br> (for Check Deposit)</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                    
                    <?php

                        $cHis = new TransView();
                        
                        echo $cHis->t_Report();


                    ?>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    } else if ($_SESSION['uType'] == '1') {

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">Transaction History</div>
                <div class="card-body">

                    <input type="text" class="form-control rounded-left" style="max-width: 30%; font-size: 12px; margin-bottom: 3%" id="myInput" onkeyup="myFunction()" placeholder="Search for Transaction Type..">

                    <table id="myTable" class="table table-striped" style="font-size: 12px;">
                    <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Receiver's Account Number <br> </th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Type</th>
                        <th scope="col">Check No. <br> (for Check Deposit)</th>
                        <th scope="col">Status</th>
                    
                    <?php

                        $cHis = new TransView();
                        
                        echo $cHis->c_History();


                    ?>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php

    }

?>



<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    td = tr[i];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<?php

    include ('layout/footer.php');

?>