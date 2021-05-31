<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
        if(isset($_GET['logout'])){
            session_destroy();
            header("Location: admin_login.php");
        }
        
        if(isset($_SESSION['admin'])){
            $user=$_SESSION['admin'];
        }
        else{
            header("Location: admin_login.php");
        }
    ?>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="assets/style/admin_login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <style>
            ul {
            list-style: none;
            counter-reset: steps;
            }
            ul li {
            counter-increment: steps;
            }
            ul li::before {
            content: counter(steps);
            margin-right: 0.5rem;
            background: #ff6f00;
            color: white;
            width: 1.2em;
            height: 1.2em;
            border-radius: 50%;
            display: inline-grid;
            place-items: center;
            line-height: 1.2em;
            }
            ul ul li::before {
            background: darkorchid;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <div class="ab"> Admin</div>
            <div class="ab">Welcome <?php echo $user?> </div>
            <div class="a" onclick="logout()" style="cursor:pointer"> Log Out</div>
        </div>
        <br><br>
        <center><h1>Choose your course of action</h1>
        <div class = "row" style=padding-top:80px;>
        <div class="manage col-lg-4 col-md-6" style="width:30%;height:350px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <h2>&emsp;&emsp;Manage Users</h2>
            <img src="assets/images/user_manage.jpg"  alt="manage user" /><br>
            <div class="text">
                <ul>
                    <li style="padding-right:140px;padding-top:20px;"><a href="user.php">View and Manage Users</a></li><br>
                    <!-- <li><a href="manage_admin.php">View and Manage Admins</a></li><br> -->
                </ul>
            </div>
        </div>
        <div class="manage col-lg-4 col-md-6"  style="width:30%;height:350px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"> 
            <h2>&emsp;&emsp;Manage Products</h2>&emsp;&emsp;
            <img src="assets/images/product.jpg" alt="manage product"/><br><br>
            <div class="text">
                <ul style="padding-right:90px;">
                    <li><a href="manageproducts.php">View and Manage Products</a></li><br>
                    <li><a href="add_product.php">Add Products</a></li><br>
                </ul>
            </div>
        </div>
        <div class="manage col-lg-4" style="width:30%;height:350px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <h2>&emsp;&emsp;Manage Reviews</h2>&emsp;&emsp;
            <img src="assets/images/review.jpg" alt="manage product"  /><br><br>
            <div class="text">
                <ul style="padding-right:90px;">
                    
                    <li><a href="web_reviews.php">View Website review</a></li><br>
                </ul>
            </div>
        </div>
        </div></center>
        <script>
            function logout(){
                window.location.href="admin_home.php?logout=yes";
            }
        </script>
    </body>
</html>
