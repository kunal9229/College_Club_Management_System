<?php
  include('collage_main_header.php');
 ?>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">


 <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert alert-success" role="alert">
                    Post has been added successfully
                </div>
            <?php }?>
            <?php }?>

  
 <div class="position-absolute top-25" style="margin-left:10px;">
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="bi bi-plus-circle"></i> Add Post
  </button>
  <ul class="dropdown-menu">
    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#photos">Photos/Images</button></li>
    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#text">Write a Post</button></li>
    <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
  </ul>
</div>
  </div>
  </div>

  <div class="modal fade" id="photos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"style="margin-top:150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Photos/Images</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  <div class="modal-body">
    <form action="Collage_logic.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <input class="form-control" type="file" name="file">
      </div>
    <div class="mb-3">
    
      <!-- <p class="lead emoji-picker-container">-->
      <textarea name="captions" placeholder="Write a captions" class="form-control my-3"></textarea>
      <!--</p> -->
      <input type="hidden" name="collage_email" value="<?php echo $email; ?>">
    </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="input_tag" id="input_tag" placeholder="Enter tag and use , to seperate the tag!" aria-label="tags" aria-describedby="button-addon2">
  </div>
  <div class="tag-container" style="word-wrap: break-word;">

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="input" class="btn btn-primary"name="postPhotos">Post</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="tagscript.js"></script>

<!-- Text Post start -->
<div class="modal fade" id="text" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"style="margin-top:150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Photos/Images</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  <div class="modal-body">
    <form action="Collage_logic.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
    
      <!-- <p class="lead emoji-picker-container">-->
      <textarea name="post" placeholder="What's on your mind?" class="form-control my-3"></textarea>
      <!--</p> -->
      <input type="hidden" name="collage_email" value="<?php echo $email; ?>">
    </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="input_tag" id="input_tag" placeholder="Enter tag and use , to seperate the tag!" aria-label="tags" aria-describedby="button-addon2">
  </div>
  <div class="tag-container" style="word-wrap: break-word;">

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="input" class="btn btn-primary"name="postText">Post</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Text post end -->


<div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-2 mx-5">
      <?php
$sql = "SELECT * FROM collage_post where collage_email = '$email' ORDER BY datetime DESC";
    $query = mysqli_query($connection, $sql);
    if ($query->num_rows == 0) {?>
    <h1 class="text-center" style="color:gray;margin-left: 30%;">You have not post anything yet!!!</h1>
      <?php
    }
        foreach($query as $q){
            
          $date = date( 'F j, Y', strtotime( $q['datetime']) );
          $time = date( 'g:i a', strtotime( $q['datetime'] ) );
?>
        <div class="col">
          <div class="card shadow-sm">
            <?php if($q['type']=='photoPost'){ ?>
          <img src="../uploads/<?php echo $q['images'];  ?>" alt="Post">
          <?php } ?>
            <div class="card-body">
              <p class="card-text h5"><?php echo $q['captions']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> -->
                  <!-- <a class="btn btn-primary btn-sm" href="collageedit.php?q=<?php //echo $q['id'];?>">Edit</a> -->
                  <small class="text-body-secondary mx-3"><?php
                  $sql2 = "SELECT * FROM collage where email = '$email'";
                  $query2 = mysqli_query($connection, $sql2);
                  foreach($query2 as $q2){
                  echo 'From <a  style="color:gray;"> '.$q2['name'].'</a>';
                  }
                  ?></small>
                </div>
                <small class="text-body-secondary"><?php echo "<a  style='color:gray;'>".$date."</a>";?> | <?php echo "<a  style='color:gray;'>".$time."</a>";?></small>
              </div>
            </div>
          </div>
        </div>
        <?php
    } 
    ?>
      </div>
    </div>
  </div>


</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
