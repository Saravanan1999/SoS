<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include 'db_conn.php'?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/style/admin_login.css" />
  </head>
  <body>
    <main>
      <section class="glass">
          <h3>Admin Login</h3>
          
          <form action="#" method="post">
              <label>Username</label><br>
              <input type="text" name="username"><br><br>
              <label>Password</label><br>
              <input type="text" name="password"><br><br>
              <button name="login" value="Log in">Log In</button>

          </form>
          <div class="label">
            <?php
                if ( isset( $_POST['login'] ) ){
                    $username = $_POST['username'];
                    session_start();
                    $_SESSION['user']=$username;
                    $pass = $_POST['password'];
                    
                    $result=mysqli_query($conn,"SELECT * FROM admin WHERE Username='$username'") or die("Failed to query database".mysqli_error($conn));
                    $row=mysqli_fetch_array($result);
                    if($row['Password']==$pass){
                        header('Location: admin_home.php');
                    }
                    else{
                        echo "Wrong username or password";
                    }
                }
            ?>
            </div>
      </section>
      
    </main>
    
  </body>
</html>