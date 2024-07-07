<?php
include('collage_main_header.php');
$grav_url_2040 = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( 'mp' ) . "&s=2040";
?>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

<style>
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

</style>
<div class="container rounded bg-white mt-2 mb-2">
    <?php if(isset($_REQUEST['q'])){ ?>
        <?php if($_REQUEST['q'] == "namechange"){?>
            <div class="alert alert-success" role="alert">
                Changes have made to your profile!
            </div>
        <?php }?>
        <?php if($_REQUEST['q'] == "nameerr"){?>
            <div class="alert alert-danger" role="alert">
                Something went wrong!
            </div>
        <?php }?>
    <?php }?>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo $grav_url_2040; ?>">
                <?php
                    $sql = "SELECT * FROM collage where email = '$email'";
                    $query = mysqli_query($connection, $sql);
                    foreach($query as $q){
                ?>
            <span class="font-weight-bold"><?php echo $q['name']; ?></span><span class="text-black-50"><?php echo $q['email']; ?></span><span> </span></div>
            <a style="text-decoration:none;" target="_blank" href="https://en.gravatar.com/support/activating-your-account/">Click here</a><font color="black"> to setup your profile photo</font>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"><?php echo $q['name']; ?> Profile Settings</h4>
                </div>
                <form action="Collage_logic.php" method="post">
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Collage Name</label><input type="text" name="name" class="form-control" value="<?php echo $q['name']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name="email" class="form-control" disabled value="<?php echo $q['email']; ?>"></div>
                    <input type="hidden" name="id" value="<?php echo $q['id']; ?>">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" name="phno" class="form-control" value="<?php echo $q['phno']; ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">City</label><input type="text" name="city" class="form-control" value="<?php echo $q['city']; ?>"></div>
                    <div class="col-md-6"><label class="labels">State</label><input type="text" name="state" class="form-control" value="<?php echo $q['state']; ?>"></div>
                </div>
                <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address" class="form-control" value="<?php echo $q['address']; ?>"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="save_profile" type="submit">Save Profile</button></div>
                </form>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>