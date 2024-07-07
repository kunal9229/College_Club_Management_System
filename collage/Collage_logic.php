<?php
require('../conn.php');

$date = new \DateTime();
$date->setTimezone(new \DateTimeZone('+0530')); //GMT
$indiandate = $date->format('Y-m-d H:i:s');

if (isset($_POST["signup"])) {
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$name = $_POST['CName'];
$phno = $_POST['Cphno'];
$email = $_POST['Cemail'];
$address = $_POST['Caddress'];
$state = $_POST['CState'];
$city = $_POST['CCity'];
$pass = $_POST['CPass'];
$conpass = $_POST['ConPass'];
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];  
$folder = "../uploads/".$filename;   


if ($pass !== $conpass) {
  echo "<script>alert('Passwords do not match.');</script>";
  header('location:Collage_signup.php');
} elseif (strlen($pass) < 8 ||
  !preg_match("/[A-Z]/", $pass) ||
  !preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $pass) ||
  !preg_match("/[0-9]/", $pass)) {
  header('location:Collage_signup.php');
  echo "<script>alert('Password should be at least 8 characters long and contain at least one uppercase letter, one special character, and one numeric value.');</script>";
// } elseif (strlen($mobile) != 10 || !is_numeric($mobile)) {
//   echo "<script>alert('Invalid mobile number. Please enter a 10-digit numeric value.');</script>";
}
$duplicateQuery = "SELECT * FROM collage WHERE email = '$email";
        $duplicateResult = $connection->query($duplicateQuery);
        if ($duplicateResult->num_rows > 0) {
            echo "<script>alert('Collage already Exist.');</script>";
        } else {
            // Insert the user into the database
            $query = "INSERT INTO Collage (name,logo, email,phno, address, city,state, pass) VALUES ('$name','$filename','$email','$phno','$address', '$city', '$state', '$pass')";

            if (($connection->query($query) === true) && (move_uploaded_file($tempname, $folder))) {
                header("Location: Collage_login.php?q=success");
                exit;
            } else {
                echo "Error: " . $query . "<br>" . $connection->error;
            }
        }
}

if(isset($_POST["login"])){
  $email = $_POST["Cemail"];
  $pass = $_POST["CPass"];

  // Prepare the SQL statement
  $query = "SELECT * FROM collage WHERE email = '$email' AND pass = '$pass'";

  // Execute the query
  $result = $connection->query($query);

  // Check if the query returned any rows
  if ($result->num_rows > 0) {
      // Successful login
      $_SESSION["email"] = $email;
      header("Location: Collage_main.php");
      exit;
  } else {
      // Invalid credentials
      echo "<script>alert('Invalid username or password. Please try again.');</script>";
      header('location:Collage_login.php');
  }
}

if(isset($_POST["postPhotos"])) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $captions = $_POST['captions'];
    $tags = explode(',', $_POST['tags']);
    $collage_email = $_POST['collage_email'];
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];  
    $folder = "../uploads/".$filename;   
    $sql = "INSERT INTO collage_post(collage_email,captions, images,datetime,type) VALUES('$collage_email','$captions','$filename','$indiandate','photoPost')";

    foreach ($tags as $tag) {
        $sql1 = "INSERT INTO collage_post (tags) VALUES ('$tag')";
        mysqli_query($connection, $sql1);
    }

    if (mysqli_query($connection, $sql) && (move_uploaded_file($tempname, $folder))) {

        $msg = "Image uploaded successfully";
        header("Location: Collage_main.php?info=added");

    }else{

        $msg = "Failed to upload image";

}
    // mysqli_stmt_close($stmt);
    echo $msg;
    exit();
}

if(isset($_POST["postText"])){
    $post = $_POST['post'];
    $collage_email = $_POST['collage_email'];
    $sql = "INSERT INTO collage_post(collage_email,captions, images,datetime,type) VALUES('$collage_email','$post','No','$indiandate','textPost')";

    foreach ($tags as $tag) {
        $sql1 = "INSERT INTO collage_post (tags) VALUES ('$tag')";
        mysqli_query($connection, $sql1);
    }

    if (mysqli_query($connection, $sql)) {
        header("Location: Collage_main.php?info=added");
    }else{

        header("Location: Collage_main.php?info=failed");

}
    exit();
}

if(isset($_POST['save_profile'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $phno = $_POST['phno'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];

    $sql="UPDATE collage SET name='$name',phno='$phno',city='$city', state='$state',address='$address' WHERE id='$id'";
        $result=mysqli_query($connection,$sql);
        if ($result) {
          header("location:Collage_profile.php?q=namechange");
        }
        else
        {
            header("location:Collage_profile.php?q=nameerr");
        }
}

if(isset($_POST["postedit"])) {
    $id = $_POST['id'];
    $captions = $_POST['captions'];
    $tags = explode(',', $_POST['tags']);
    $collage_email = $_POST['collage_email'];
    if(isset($_POST['file'])){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];  
        $folder = "../uploads/".$filename;   
        $sql = "UPDATE collage_post SET collage_email = '$email',captions='$captions', images='$filename',datetime='$indiandate',type='photoPost'";
    
        foreach ($tags as $tag) {
            $sql1 = "INSERT INTO collage_post (tags) VALUES ('$tag')";
            mysqli_query($connection, $sql1);
        }
    
        if (mysqli_query($connection, $sql) && (move_uploaded_file($tempname, $folder))) {
    
            $msg = "Image uploaded successfully";
            header("Location: Collage_main.php?info=added");
    
        }else{
    
            $msg = "Failed to upload image";
    
    }
        // mysqli_stmt_close($stmt);
        echo $msg;
        exit();
    }else{
        $sql = "UPDATE collage_post SET collage_email = '$email',captions='$captions', images='$filename',datetime='$indiandate',type='textPost'";
    
        foreach ($tags as $tag) {
            $sql1 = "INSERT INTO collage_post (tags) VALUES ('$tag')";
            mysqli_query($connection, $sql1);
        }
    
        if (mysqli_query($connection, $sql)) {

            header("Location: Collage_main.php?info=added");
    
        }else{
    
            $msg = "Failed to upload image";
    
    }
        // mysqli_stmt_close($stmt);
        echo $msg;
        exit();
    }

}

?>