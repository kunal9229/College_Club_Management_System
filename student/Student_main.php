<?php 
    include('student_main_header.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
<div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-2 mx-5">
      <?php
      $email = $_SESSION['email'];
      $sql1 = "SELECT * FROM student_details where email = '$email'";
      $query1 = mysqli_query($connection, $sql1);
          foreach($query1 as $q1){
            $collage_email = $q1['collage_email'];
            $sql = "SELECT * FROM collage_post where collage_email = '$collage_email' ORDER BY datetime DESC";
              
        $query = mysqli_query($connection, $sql);
        foreach($query as $q){
            
          $date = date( 'F j, Y', strtotime( $q['datetime']) );
          $time = date( 'g:i a', strtotime( $q['datetime'] ) );
          $collage_email = $q["collage_email"];
?>
        <div class="col">
          <div class="card shadow-sm">
          <?php if($q['type']=='photoPost'){ ?>
          <img src="../uploads/<?php echo $q['images'];  ?>" alt="Post">
          <?php } ?>
            <div class="card-body">
              <p class="card-text"><?php echo $q['captions']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> -->
                  <button type="button" onclick="window.location.href='view_post.php?id=<?php echo $q['id']; ?>'" class="btn btn-sm btn-outline-primary">View Post</button>
                  <small class="text-body-secondary mx-3"><?php
                  $sql2 = "SELECT * FROM collage where email = '$collage_email'";
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
    } 
    ?>
      </div>
    </div>
  </div>


</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
