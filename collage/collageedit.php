<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
<?php
include 'Collage_main_header.php';
$id = $_REQUEST["q"];
$email = $_SESSION['email'];
$sql = "SELECT * FROM collage_post where id = '$id' ORDER BY datetime DESC";
$query = mysqli_query($connection, $sql);
foreach($query as $q){
?>
    <form action="Collage_logic.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <input class="form-control" value="<?php echo $q["images"]; ?>" type="file" name="file">
      </div>
    <div class="mb-3">
    
      <!-- <p class="lead emoji-picker-container">-->
      <textarea name="captions" value="<?php echo $q['captions']; ?>" placeholder="Write a captions" class="form-control my-3"></textarea>
      <!--</p> -->
      <input type="hidden" name="collage_email" value="<?php echo $email; ?>">
      <input type="hidden" name="id" value="<?php echo $q['id']; ?>">
    </div>
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="input_tag" id="input_tag" placeholder="Enter tag and use , to seperate the tag!" aria-label="tags" aria-describedby="button-addon2">
  </div>
  <div class="tag-container" style="word-wrap: break-word;">

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="window.location.href = 'Collage_main.php'" class="btn btn-secondary mx-3" data-bs-dismiss="modal">Go Back</button>
        <button type="input" class="btn btn-primary mx-3"name="postedit">Edit</button>
      </div>
      </form>
<?php
}
?>