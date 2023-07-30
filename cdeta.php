<?php 



    include 'includes/autoLoader.inc.php';
   
    $uDeta = new UsersView();
    

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
                <div class="card-header">Personal Information</div>
                <div class="card-body">
                <div style="
                    height:150px;
                    overflow: scroll;
                    width: 935px;
                    height: 340px;
                    border: #ccc;">

                    

                    <form action="cdeta.php" method="POST" enctype="multipart/form-data">
                        <table class="table table-striped" style="font-size: 11px">

                            <?php

                                
                            $deta = $uDeta->c_deta();

                                if ($deta) {

                                    while ($data = mysqli_fetch_assoc($deta))

                                    {
                            ?>
                            
                            <tr>

                            <th scope="col">Name</th>
                            <td><?php echo $data['uLast'] . ", " . $data['uFname'] . " " . $data['uMname']  ?></td>
                            
                            <th scope="col">Birthday</th>
                            <td><?php echo $data['uBday'] ?></td>
                            </tr>

                            <tr>
                            <th scope="col">Gender</th>
                            <td><?php echo $data['uGndr'] ?></td>

                            <th scope="col">Civil Status</th>
                            <td><?php echo $data['uCvl_Stat'] ?></td>
                            </tr>

                            <tr>
                            <th scope="col">Citizenship</th>
                            <td><?php echo $data['uCtzn'] ?></td>

                            <th scope="col">Mobile Number</th>
                            <td><?php echo $data['uMob'] ?></td>
                            </tr>

                            <tr>
                            <th scope="col">Email Address</th>
                            <td><?php echo $data['uEma'] ?></td>

                            <th scope="col">Address</th>
                            <td><?php echo $data['uHouseNo'] . " " . $data['uStreet'] . ", " . $data['uBrgy'] . ", " . $data['uCity'] . ", " . $data['uZip'] ?></td>
                            </tr>

                            <tr>
                                <th scope="col">Current PIN</th>
                                <td>
                                    <input type="password" value=<?php echo $data['accPin'] ?> id="myAccPin" readonly>
                                    <input type="checkbox" onclick="myFunction()">
                                </td>

                                <th scope="col">New PIN</th>
                                <td>
                                    <input type="password" name="accPin" id="myNewAccPin">
                                    <input type="checkbox" onclick="myNewFunction()"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                   
                                    <button type="submit" name="changePin" class="btn btn-primary" style="font-size: 10.5px">Change PIN</button>
                                   
                                </td>
                            
                            </tr>

                            <?php

                                    }
                                }

                            ?>
                        </table>
                    </form>

                   

                    <p style="color: black; font-size: 11px; margin-top: 5%"><b>Note:</b> Upon changing the information above, you can go to your bank branch and bring the supporting documents.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function myFunction() {
    var x = document.getElementById("myAccPin");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }

    function myNewFunction() {
    var x = document.getElementById("myNewAccPin");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }

</script>




<?php

    include ('layout/footer.php');

?>