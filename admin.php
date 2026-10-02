
<?php

    include "connection.php";
    include "admin_navbar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management System - Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
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
            width: 0px;
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

        .alert-box {
            display: none;
            padding: 12px 15px;
            margin: 10px 0;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s ease;
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
               
                <div id="alert-box" class="alert-box alert-error"></div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="User Name" name="username" required>
                    <div class="password-wrapper">
                        <input type="password" placeholder="Password" name="password" id="admin-password" required>
                        <button type="button" class="toggle-password" aria-pressed="false" aria-label="Show password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <button type="submit" class="btn" name="login">Login</button>
                    <a href="admin_forgot_password.php">Forgot Password?</a>
                </form>
            </div>
        </div>
    </div>

    <?php

		if(isset($_POST['login']))
		{
			$res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
			$count=mysqli_num_rows($res);
            $row=mysqli_fetch_assoc($res);
			if($count==0)
			{
				?>
				<script type="text/javascript">
					document.getElementById('alert-box').style.display = 'block';
					document.getElementById('alert-box').innerText = "The username or password doesn't match.";
				</script>
				<?php
			}
			else
			{
				$_SESSION['login_admin_username']=$_POST['username'];
                $_SESSION['pic1'] = $row['pic'];
                $_SESSION['stdusername']='';
				?>
				<script type="text/javascript">
					window.location="admin_dashboard.php";
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
          <!--  <div class="footer-middle">
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14603.750746881911!2d90.34330166977537!3d23.785233199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c094bd84832f%3A0xac81089e47ea5cdd!2sBangla%20College%20Central%20Library!5e0!3m2!1sen!2sbd!4v1615122444874!5m2!1sen!2sbd" width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy" aria-hidden="false"></iframe>
            </div>-->
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
        document.querySelector(".toggle-password").addEventListener("click", function() {
            const input = document.getElementById("admin-password");
            const isHidden = input.type === "password";
            input.type = isHidden ? "text" : "password";
            this.innerHTML = isHidden ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
            this.setAttribute('aria-pressed', isHidden);
            this.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
        });
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
    </script>
  
</body>
</html>
