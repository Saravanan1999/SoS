<!DOCTYPE html>
<html lang="en">

    <?php
        include 'db_conn.php';
        session_start();
        $user=$_SESSION['admin'];
    ?>
    <head>
        <title>User List</title>
        <link rel="stylesheet" href="assets/style/admin_login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <style>
            table{
                box-shadow: 8px 8px 16px 4px #9E9E9E;
            }
            tr{
                text-align:center;
            }
            thead{
                background-color:black;
                color:white;
            }
            i{
                cursor: pointer;
            }
            a{
                text-decoration:none;
                color:white;
            }
            a:hover{
                color:orange;
            }
            
        </style>
    </head>
    <body>
    <div class="topnav">
            <div class="ab"><a  href="admin_home.php"> Admin</a></div>
            <div class="ab">Welcome <?php echo $user?> </div>
            <div class="a" onclick="logout()" style="cursor:pointer">Log Out</div>
        </div>
        <center><h1 style="padding-top:50px;">List of Users using <em>"Shades of Spade"<em></h1>
        <br><br><br>
        <?php 
            $result=mysqli_query($conn,"SELECT * FROM `users`") or die("Failed to query database".mysqli_error($conn));
            if ($result->num_rows > 0) {
                
        ?>
            <table class="table table-hover" style="width:80%;" >
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th>Username</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($row1 = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row1['id']."</td>";
                        echo  "<td>".$row1['username']."</td>";
                        echo "<td>".$row1['country']."</td>";
                        echo "<td>".$row1['email']."</td>";
                        echo "<td>".$row1['mobile']."</td>";
                        echo "</tr>";
                    }
                ?>
                    
                </tbody>
            </table>
        <?php
                    
            }
        ?>
            <a style="padding-left:30px;color:blue;text-decoration:underline" href="admin_home.php">Go Back</a>
            </center>
        <script>
            function logout(){
                window.location.href="admin_home.php?logout=yes";
            }
        </script>
        </body>
</html>