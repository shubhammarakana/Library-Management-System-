<?php

    include "connection.php";
    include "student_navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management System</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
    #sregform{
    

   width: 1000px;
    height: 760;
  padding: 50px;
  background: rgba(255, 255, 255, 0.15); /* semi-transparent */
  border-radius: 100px;
  border: 10px solid rgba(255, 255, 255, 0.3);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(-50px);
  box-shadow: 0 4px 30px rgba(0,0,0,0.3);
  color: white;
    }
   
</style>
</head>
<body>

    <div class="banner">
        <div class="form">
            <div class="form-container">
                <div class="form-btn">
                    <!--<span onclick="login()">Login</span>-->
                    <span onclick="reg()">Register</span>
                    <hr id="indicator">
                </div>
              
                <form action="student.php" id="sregform" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="User Name" name="student_username" required>
                    <input type="text" placeholder="Full Name" name="FullName" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    <input type="password" placeholder="Password" name="Password" id="Pass-reg" style="margin-bottom: 0;" required>
                    <span class='show-hide-reg'><i class="fas fa-eye" id="eye-reg"></i></span>
                    <input type="text" name="PhoneNumber" placeholder="Phone Number" style="margin-top:-15px;" required>
                    <div class="label">
                        <label for="pic">Upload Picture :</label>
                    </div>
                    <input type="file"  name="file" class="file" value="">
                   
                    <button type="submit" class="btn" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>

   <!--
    <?php

    if(isset($_POST['register']) && !empty($_FILES["file"]["name"]))
    {

        $count=0;
        $sql="SELECT * from student";
        $res=mysqli_query($db,$sql);
        

        while($row=mysqli_fetch_assoc($res))
        {
            if($row['student_username']==$_POST['student_username'])
            {
                $count=$count+1;
            }
        }
        if($count==0)
        {
            move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);
            $pic = $_FILES['file']['name'];
            mysqli_query($db,"INSERT INTO `STUDENT` VALUES('','$_POST[student_username]','$_POST[FullName]','$_POST[Email]','$_POST[Password]','$_POST[PhoneNumber]','$pic');");

            ?>
                <script type="text/javascript">
                alert("Registration successful ");
                </script>
            <?php		
        }
        else
        {
            ?>
                <script type="text/javascript">
                alert("This username is already registered.");
                </script>
            <?php
        }
    }
    else if(isset($_POST['register']))
    {

        $count=0;
        $sql="SELECT * from student";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
            if($row['student_username']==$_POST['student_username'])
            {
                $count=$count+1;
            }
        }
        if($count==0)
        {
        mysqli_query($db,"INSERT INTO `STUDENT` VALUES('','$_POST[student_username]','$_POST[FullName]','$_POST[Email]','$_POST[Password]','$_POST[PhoneNumber]','user2.png');");

            ?>
                <script type="text/javascript">
                alert("Registration successful ");
                </script>
            <?php		
        }
        else
        {
            ?>
                <script type="text/javascript">
                alert("This username is already registered.");
                </script>
            <?php
        }
    }
    ?>


    
    
    
</body>
</html>