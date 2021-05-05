<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
        $user=$_SESSION['user'];
    ?>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="assets/style/admin_login.css">
    </head>
    <body>

        <div class="topnav">
            <div class="ab"> Admin</div>
            <div class="ab">Welcome <?php echo $user?> </div>
            <div class="a">Log Out</div>
        </div>
        <div class="manage">
            <h2>&emsp;&emsp;Manage Users</h2>
            <img src="assets/images/user_manage.jpg" alt="manage user" /><br>
            <div class="text">
                <ul>
                    <li><a href="user.php">View and Manage Users</a></li><br>
                    <li><a href="manage_admin.php">View and Manage Admins</a></li><br>
                </ul>
            </div>
        </div>
        <div class="manage" style="width:30%;height:350px;"> 
            <h2>&emsp;&emsp;Manage Produts</h2>&emsp;&emsp;
            <img src="assets/images/product.jpg" alt="manage product" style="width:200px" /><br><br>
            <div class="text">
                <ul>
                    <li><a href="product.php">View and Manage Products</a></li><br>
                    <li><a href="add_product.php">Add Products</a></li><br>
                </ul>
            </div>
        </div>
        <div class="manage" style="width:30%;height:350px;">
            <h2>&emsp;&emsp;Manage Reviews</h2>&emsp;&emsp;
            <img src="assets/images/review.jpg" alt="manage product" style="width:200px" /><br><br>
            <div class="text">
                <ul>
                    <li><a href="review.php">View Product review</a></li><br>
                    <li><a href="web_reviews.php">View Website review</a></li><br>
                </ul>
            </div>
        </div>
    </body>
</html>
