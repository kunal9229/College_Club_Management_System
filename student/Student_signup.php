<?php
require('../conn.php');
?>
<style>
    body{
        margin: 0;
        padding: 0;
        background: url(../images/student_wallpaper.png) no-repeat;
        height: 100vh;
        font-family: sans-serif;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
    }
    @media screen and (max-width: 600px){
        body{
            background-size: fixed;
        }
    }
    #particles-js{
        height: 100%;
    }
    .loginBox{
        margin-top: 10%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 550px;
        min-height: 200px;
        background: rgba(0, 0, 0, 0.7);
        border-radius: 10px;
        padding: 40px;
        box-sizing: border-box;
    }
    .user{
        margin: 0 auto;
        display: block;
        margin-bottom: 20px;
    }
    h3{
        margin: 0;
        padding: 0 0 20px;
        text-align: center;
    }
    .loginBox input,.loginBox select{
        width: 100%;
        margin-bottom: 20px;
    }
    .loginBox input[type="text"], .loginBox input[type="number"], .loginBox input[type="password"], .inputBox select{
        border: none;
        border-bottom: 2px solid #262626;
        outline: none;
        height: 40px;
        color: #fff;
        background: transparent;
        font-size: 16px;
        padding-left: 20px;
        box-sizing: border-box;
        }
        .loginBox input[type="text"]:hover, .loginBox input[type="number"]:hover, .loginBox input[type="password"]:hover,.loginBox select:hover{
            color: #42F3FA;
            border: 1px solid #42F3FA;
            box-shadow: 0 0 5px rgba(0,255,0,.3), 0 0 10px rgba(0,255,0,.2), 0 0 15px rgba(0,255,0,.1), 0 2px 0 black;
        }
        .loginBox input[type="text"]:focus,.loginBox input[type="number"]:focus, .loginBox input[type="password"]:focus{
            border-bottom: 2px solid #42F3FA;
        }
        .inputBox{
            position: relative;
        }
        .inputBox span{
            position: absolute;
            top: 10px;
            color: #262626;
        }
        .loginBox input[type="submit"]{
            border: none;
            outline: none;
            height: 40px;
            font-size: 16px;
            background: #59238F;
            color: #fff;
            border-radius: 20px;
            cursor: pointer;
        }
        .loginBox a{
            color: white;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            display: block;
        }
        a:hover{
            color: #00ffff;
        }
        select option{
            color:black;
        }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
<button type="button" onclick="window.location.href = '../index.html'" class="btn btn-secondary position-absolute top-0 start-0 mt-3 mx-3"><i class="bi bi-arrow-left" style="color:white;font-size:20px;"></i>Are you from Collage?</button>
<div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3 style="color:white;">Sign in here</h3>
        <form action="Student_logic.php" method="post" autocomplete="off">
            <div class="inputBox"> 
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="Cid" placeholder="Collage ID">
                <select name="collage_name" id="" style="color:gray;">
                    <option value="0" selected>Select your collage from dropdown</option>
                    <hr>
                <?php 
                    $sql = "SELECT * FROM collage";
                    $query = mysqli_query($connection, $sql);
                    foreach($query as $q){
                        ?>
                    <option value='<?php echo $q['email']; ?>'><?php echo $q['name']; ?></option>
                    <?php
                    }
                ?>
                </select>
                <input type="text" name="city" placeholder="City">
                <input type="text" name="state" placeholder="State">
                <input type="text" name="address" placeholder="Address">
                <input type="number" name="phno" placeholder="+91 **********">
                <input type="password" name="pass" placeholder="Password">
                <input type="password" name="Cpass" placeholder="Confirm Password"> 
            </div> 
            <input type="submit" name="student_signup" value="Register">
        </form> 
        <!-- <a href="#">Forget Password<br> </a> -->
        <a href="Student_login.php">You already have an account?<br>Login here <i class="bi bi-arrow-right"></i></a>
        
    </div>