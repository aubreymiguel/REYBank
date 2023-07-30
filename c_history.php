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
                        <th scope="col">Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Amount</th>
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

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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