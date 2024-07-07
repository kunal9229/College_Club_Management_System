<?php

require('../conn.php');

if(isset($_POST['student_login'])){
$email = $_POST['email'];
$pass = $_POST['pass'];

// Prepare the SQL statement
$query = "SELECT * FROM student_details WHERE email = '$email' AND pass = '$pass'";

// Execute the query
$result = $connection->query($query);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // Successful login
    $_SESSION["email"] = $email;
    header("Location: Student_main.php");
    exit;
} else {
    // Invalid credentials
    echo "<script>alert('Invalid username or password. Please try again.');</script>";
    header('location:Student_login.php');
}

}

if(isset($_POST['student_signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cid = $_POST['Cid'];
    $collage_name = $_POST['collage_name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $phno = $_POST['phno'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if ($pass !== $cpass) {
        echo "<script>alert('Passwords do not match.');</script>";
        header('location:Student_signup.php');
      } elseif (strlen($pass) < 8 ||
        !preg_match("/[A-Z]/", $pass) ||
        !preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $pass) ||
        !preg_match("/[0-9]/", $pass)) {
        header('location:Student_signup.php');
        echo "<script>alert('Password should be at least 8 characters long and contain at least one uppercase letter, one special character, and one numeric value.');</script>";
      // } elseif (strlen($mobile) != 10 || !is_numeric($mobile)) {
      //   echo "<script>alert('Invalid mobile number. Please enter a 10-digit numeric value.');</script>";
      }
      $duplicateQuery = "SELECT * FROM student_details WHERE email = '$email";
              $duplicateResult = $connection->query($duplicateQuery);
              if ($duplicateResult->num_rows > 0) {
                  echo "<script>alert('Student already Exist.');</script>";
              } else {
                  // Insert the user into the database
                  $query = "INSERT INTO student_details (name, email,collage_id,collage_name,city,state, address,phno, pass) 
                  VALUES ('$name','$email','$cid','$collage_name','$city','$state','$address', '$phno', '$pass')";
      
                  if ($connection->query($query) === true) {
                      header("Location: Student_login.php?q=success");
                      exit;
                  } else {
                      echo "Error: " . $query . "<br>" . $connection->error;
                  }
              }
}
if(isset($_POST['save_profile'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $phno = $_POST['phno'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];

    $sql="UPDATE student_details SET name='$name',phno='$phno',city='$city', state='$state',address='$address' WHERE id='$id'";
        $result=mysqli_query($connection,$sql);
        if ($result) {
          header("location:Student_profile.php?q=namechange");
        }
        else
        {
            header("location:Student_profile.php?q=nameerr");
        }
}

if(isset($_POST["rating_data"]))
{

	$data = array(
		':name'		=>	$_POST["Sname"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':datetime'			=>	time(),
		':page_id'			=>	$_POST["page_id"],
	);

	$query = "
	INSERT INTO review_table 
	(user_name,p_p, user_rating, user_review, datetime,page_id) 
	VALUES (:user_name,:p_p, :user_rating, :user_review, :datetime,:page_id)
	";

	$statement = $conn->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";

}
if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM review_table WHERE page_id = ".$_SESSION['page_id']." ORDER BY review_id DESC
	";

	$result = $conn->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["user_name"],
			'p_p'			=>	$row["p_p"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', strtotime("+1 days, -13 hours, -30 minutes",$row["datetime"])),
			'page_id'		=>	$row["page_id"],
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	round($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}
?>