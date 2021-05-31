<!DOCTYPE html>
<html lang="en">
    <?php
    include 'db_conn.php';
        session_start();
        $user=$_SESSION['admin'];
    ?>
    <head>
        <title>Reviews</title>
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
            <div class="ab">Hello <?php echo $user?> </div>
            <div class="a">Log Out</div>
        </div>
    <center><h1 style="padding-top:50px;">List of Reviews from users using <em>"Shades of Spade"</em></h1><br><br>
    <?php 
            $result=mysqli_query($conn,"SELECT * FROM `feedback`") or die("Failed to query database".mysqli_error($conn));
            if ($result->num_rows > 0) {
                
        ?>
        <div class="webreviews">
            <table class="table table-hover" style="width:80%;" >
                <thead>
                    <tr>
                        <th>Feedback Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($row1 = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td style='width:150px'>".$row1['feedbackid']."</td>";
                        echo  "<td style='width:150px'>".$row1['firstname']." ".$row1['lastname'] ."</td>";
                        echo "<td style='width:150px'>".$row1['email']."</td>";
                        echo "<td style='width:150px'>".$row1['phone']."</td>";
                        echo "<td style='width:700px'>".$row1['message']."</td>";
                        echo "</tr>";
                    }
                ?>
                    
                </tbody>
            </table>
        <?php
                    
            }
        ?>
    </div>
<br><br>
    <a style="padding-left:30px;color:blue;text-decoration:underline" href="admin_home.php">Go Back</a>
    </center>
    </body>
</html>