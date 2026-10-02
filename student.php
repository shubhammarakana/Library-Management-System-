
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
        /* Alert Box Styles */
.alert-box {
    display: none;
    padding: 12px 15px;
    margin: 15px 0;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 500;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.alert-error {
    background-color: #ffebee;
    color: #c62828;
    border: 1px solid #ffcdd2;
}

.alert-success {
    background-color: #e8f5e9;
    color: #2e7d32;
    border: 1px solid #c8e6c9;
}

.alert-info {
    background-color: #e3f2fd;
    color: #1565c0;
    border: 1px solid #bbdefb;
}

.alert-warning {
    background-color: #fff8e1;
    color: #ff8f00;
    border: 1px solid #ffecb3;
}

/* Password Wrapper Styles */
.password-wrapper {
    position: relative;
    display: inline-block;
    width: 100%;
    margin-bottom: 15px;
}

.password-wrapper input {
    width: 100%;
    padding-right: 44px;
    box-sizing: border-box;
}

.toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    font-size: 18px;
    color: #666;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.toggle-password:hover {
    color: #333;
}

.toggle-password:focus {
    outline: none;
}
    </style>
</head>
<body>

    <div class="banner">
        <div class="form">
            <div class="form-container">
                <div class="form-btn">
                    <span onclick="login()">Login</span>
                    <hr id="indicator">
                </div>
                
                <!-- Alert Box -->
                <div id="alert-box" class="alert-box alert-error"></div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="User Name" name="student_username" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    <div class="password-wrapper">
                        <input type="password" placeholder="Password" name="Password" id="student-password" required>
                        <button type="button" class="toggle-password" aria-pressed="false" aria-label="Show password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
            
                    <button type="submit" class="btn" name="login" style="margin-top:-10px;">Login</button>
                    <a href="student_forgot_password.php">Forgot Password?</a>
                    <div class="signup">
                        <p>New to this website?</p>
                        <a href="student_reg.php">signup</a>
                    </div>
                </form>
           </div>
        </div>
    </div>

    <?php
		if(isset($_POST['login']))
		{
			$res=mysqli_query($db,"SELECT * FROM `student` WHERE student_username='$_POST[student_username]' AND Email='$_POST[Email]' AND password='$_POST[Password]';");
			$count=mysqli_num_rows($res);
			$row=mysqli_fetch_assoc($res);
			if($count==0)
			{
				?>
				<script type="text/javascript">
					showAlert("The username or password doesn't match.", "error");
				</script>
				<?php
			}
			else
			{
				$_SESSION['login_student_username'] = $_POST['student_username'];
				$_SESSION['studentid'] = $row['studentid'];
                $_SESSION['pic'] = $row['studentpic'];
				?>
				<script type="text/javascript">
					showAlert("Login successful! Redirecting...", "success");
					setTimeout(function() {
						window.location="student_dashboard.php";
					}, 1000);
				</script>
				<?php
			}
		}
	?>

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
					showAlert("Registration successful", "success");
                </script>
            <?php
        }
        else
        {
            ?>
                <script type="text/javascript">
					showAlert("This username is already registered.", "error");
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
					showAlert("Registration successful", "success");
                </script>
            <?php
        }
        else
        {
            ?>
                <script type="text/javascript">
					showAlert("This username is already registered.", "error");
                </script>
            <?php
        }
    }
    ?>

    <div class="footer">
        <div class="footer-row">
            <div class="footer-left">
                <h1>Opening Hours</h1>
                <p><i class="far fa-clock"></i>Monday to Friday - 9am to 9pm</p>
                <p><i class="far fa-clock"></i>Saturday to Sunday - 8am to 11pm</p>
            </div>
            <div class="footer-right">
                <h1>Get In Touch</h1>
                <p>#30 abc Colony, xyz City IN<i class="fas fa-map-marker-alt"></i></p>
                <p>example@website.com<i class="fas fa-paper-plane"></i></p>
                <p>+8801515637957<i class="fas fa-phone-alt"></i></p>
            </div>
        </div>
        <div class="social-links">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram-square"></i>
            <i class="fab fa-youtube"></i>
        </div>
    </div>

    <script>
        // Password toggle functionality
        document.querySelector(".toggle-password").addEventListener("click", function() {
            const input = document.getElementById("student-password");
            const isHidden = input.type === "password";
            input.type = isHidden ? "text" : "password";
            this.innerHTML = isHidden ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
            this.setAttribute('aria-pressed', isHidden);
            this.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
        });

        // Alert Box Functionality
        function showAlert(message, type = "error") {
            const alertBox = document.getElementById('alert-box');
            
            // Set message and type
            alertBox.innerText = message;
            alertBox.className = 'alert-box'; // Reset classes
            
            // Add type-specific class
            switch(type) {
                case 'success':
                    alertBox.classList.add('alert-success');
                    break;
                case 'info':
                    alertBox.classList.add('alert-info');
                    break;
                case 'warning':
                    alertBox.classList.add('alert-warning');
                    break;
                default:
                    alertBox.classList.add('alert-error');
            }
            
            // Show alert
            alertBox.style.display = 'block';
            
            // Auto-hide after 5 seconds for success/info messages
            if (type !== 'error') {
                setTimeout(() => {
                    hideAlert();
                }, 5000);
            }
        }

        function hideAlert() {
            const alertBox = document.getElementById('alert-box');
            alertBox.style.display = 'none';
        }

        // Hide alert when clicking on it
        document.getElementById('alert-box').addEventListener('click', function() {
            hideAlert();
        });

        // Form switching functions (if needed)
        var LoginForm = document.getElementById("loginform");
        var regform = document.getElementById("regform");
        var indicator = document.getElementById("indicator");
        
        function reg(){
            regform.style.transform = "translateX(-365px)";
            LoginForm.style.transform = "translateX(-400px)";
            indicator.style.transform = "translateX(150px)";
        }
        function login(){
            regform.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            indicator.style.transform = "translateX(0px)";
        }
    </script>
</body>
</html>
