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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
   
</head>
<body style="background-image: url('images/admini4.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; "></body>
    <div class="search-bar admin-search">
        <form action="" method='post'>
            <input type="search" name='search' placeholder='Search by Author Name' required>
            <button type='submit' name='submit'><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="request-table">
        <div class="request-container">
            <h2 class="request-title student-info-title"><p style="color: #FFFFFF;">List of Authors
</p>
</h2>
            <?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * FROM authors where authorname like '%$_POST[search]%'; ");
			if(mysqli_num_rows($q)==0)
			{
				echo "<div class='no-results'>";
                echo "<i class='fas fa-search'></i>";
                echo "<p>Sorry! No Authors found. Try searching again</p>";
                echo "</div>";

			}
			else
			{
				echo "<div class='table-wrapper'>";
                echo "<table class='modern-table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Author ID</th>";
                echo "<th>Author Name</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while($row=mysqli_fetch_assoc($q))
                {
                    echo "<tr>";
                    echo "<td data-label='Author ID'>" . $row['authorid'] . "</td>";
                    echo "<td data-label='Author Name'>" . $row['authorname'] . "</td>";
                    echo "<td data-label='Action'>";
                    echo "<div class='action-buttons'>";
                    echo "<a href='edit_author.php?ed=" . $row['authorid'] . "' class='btn-edit'>";
                    echo "<i class='fas fa-edit'></i> Edit";
                    echo "</a>";
                    echo "<a href='delete_author.php?del=" . $row['authorid'] . "' class='btn-delete' onclick='return confirmDelete()'>";
                    echo "<i class='fas fa-trash-alt'></i> Delete";
                    echo "</a>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
		    }
		}
			//if button is not pressed
		else
		{
			$res=mysqli_query($db,"SELECT * FROM authors; ");
            echo "<div class='table-wrapper'>";
            echo "<table class='modern-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Author ID</th>";
            echo "<th>Author Name</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                echo "<td data-label='Author ID'>" . $row['authorid'] . "</td>";
                echo "<td data-label='Author Name'>" . $row['authorname'] . "</td>";
                echo "<td data-label='Action'>";
                echo "<div class='action-buttons'>";
                echo "<a href='edit_author.php?ed=" . $row['authorid'] . "' class='btn-edit'>";
                echo "<i class='fas fa-edit'></i> Edit";
                echo "</a>";
                echo "<a href='delete_author.php?del=" . $row['authorid'] . "' class='btn-delete' onclick='return confirmDelete()'>";
                echo "<i class='fas fa-trash-alt'></i> Delete";
                echo "</a>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            }
        ?> 
        </div>
    </div>
    <!-- <div class="footer">
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
            <p>&copy; 2021 Copyright by Nazre Imam Tahmid</p>
        </div>
    </div> -->
    <!-- <script>
        function del(){
            var proceed = confirm("Are you sure want to delete?");
            if(proceed){
                window.location="delete_author.php";
            }
            else{
                window.location="manage_authors.php";
            }
        }
    </script> -->
</body>
</html>
