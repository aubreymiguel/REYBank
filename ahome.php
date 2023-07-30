<?php 

error_reporting(E_ERROR | E_PARSE);

    include 'includes/autoLoader.inc.php';
        
    $uHome = new UsersView();
    $uHome->u_home();
    
    

    if (!isset($_SESSION['uType'])) {

        header("Location: login.php");
    }


?>


<?php

    include ('layout/header.php');
    
?>


<!-- <div id="overflowTest"> -->
<div class="container">
    <div class="row">   
        <div class="col-md-4">
            <div class="card-counter primary">
                <i class="fa fa-users"></i>
                <span class="count-numbers">
                    <?php 
                        echo $uHome->count_Clients(); 
                    ?>
                </span>
                <span class="count-name">Clients</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-counter danger">
                <i class="fa fa-users"></i>
                <span class="count-numbers">
                    <?php 
                        echo $uHome->count_Teller(); 
                    ?>
                </span>
                <span class="count-name">Teller</span>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card-counter success">
                <i class="fa fa-users"></i>
                <span class="count-numbers">
                    <?php 
                        echo $uHome->count_PenAcc();  
                    ?>
                </span>
                <span class="count-name">Pending Accounts</span>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 12px">

    <form action="ahome.php" method="POST" enctype="multipart/form-data">

    <h6>Pending Accounts</h6>
        <div style="
            height:150px;
            overflow-y: scroll;
            overflow-x: scroll;
            width: 1000px;
            height: 270px;
            border: #ccc;">
            <table class="table table-striped" style="font-size: 10.5px;">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Civil Status</th>
                    <th scope="col">Citizenship</th>
                    <th scope="col">Mobile #</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Zip Code</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Valid ID</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                <tr>

                <?php

                $pendingCli = new UsersController();
                                    
                $result = $pendingCli->pendingCli();

                if ($result) {

                    while ($data = mysqli_fetch_assoc($result))

                    {
                ?>
                
                    <td><?php echo $data['uLast'] . ", " . $data['uFname'] . " " . $data['uMname'] ?></td>
                    <td><?php echo $data['uBday'] ?></td>
                    <td><?php echo $data['uGndr'] ?></td>
                    <td><?php echo $data['uCvl_Stat'] ?></td>
                    <td><?php echo $data['uCtzn'] ?></td>
                    <td><?php echo $data['uMob'] ?></td>
                    <td><?php echo $data['uEma'] ?></td>
                    <td><?php echo $data['uHouseNo'] . " " . $data['uStreet'] . ", " . $data['uBrgy'] . ", " . $data['uCity'] ?></td>
                    <td><?php echo $data['uZip'] ?></td>
                    <td><?php echo $data['uBranch'] ?></td>
                    <td><?php echo "<img id='myImg' src='assets/valid_id/" . $data['uVal_id_1'] . "' height='70px' width='70px'>"?></td>
                    <td><a href="?verify_id=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-primary" style="font-size: 10.5px">Verify</button></a></td>
                    <td><a href="?reject_id=<?php echo $data['uID']; ?>"><button type="button" class="btn btn-danger" style="font-size: 10.5px">Reject</button></a></td>
                </tr>

                <?php

                    }
                }

                ?>
            <div id="myModal" class="modal">
                <span class="close" style="cursor: pointer; color: white">&times;</span>
                    <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>

            </table>
            
        </div>
    </form>
    </div>
</div>
<!-- </div> -->


<script>
// Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }
</script>




<?php

    include ('layout/footer.php');

?>