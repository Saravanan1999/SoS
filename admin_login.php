<!DOCTYPE html>
<html lang="en">

  <head>
  <?php 
    include 'db_conn.php';
    if(isset($_SESSION['admin'])){
      header("Location:admin_home.php");
    }
  ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/style/admin_login.css" />
    <style>
      
      form{
        margin-top:100px;
        position:relative;
        left:-140px;
        
      }
      button{
        margin-right:220px;
        background: linear-gradient(
          to right bottom,
          rgba(255, 255, 255, 0.7),
          rgba(255, 255, 255, 0.3)
        );
        border: none;
        width: 200px;
        padding: 0.5rem;
        border-radius: 2rem;
        cursor: pointer;
      }
      label{
        margin-left:20px;
      }
      input{
        margin-right:50px;
      }
      h3{
        margin-left:160px;
      }
    </style>
  </head>
  <body>
    <main>
      <section class="glass">
          <h3>Admin Login</h3>
          
          <form action="#" method="post" >
              <label>Username</label><br>
              <input type="text" name="username" required><br><br>
              <label>Password</label><br>
              <input type="password" name="password" required><br><br>
              <button name="submit" value="Log in">Log In</button>

          </form>
          <div class="label">
            <?php
              if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password = hash('sha512',$password);
                $sql = "Select * from admin where Username='".$username."';";
                $result = $conn->query($sql) or die(mysqli_error($conn));
                session_start();
                $_SESSION['admin']=$username;
                echo $_SESSION['admin'];
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if($row['Password']===$password){
                        echo "Correct Password";
                        
                        header('Location: admin_home.php');
                    }
                    else{
                      echo "Wrong Password";
                    }
                }
                else{
                  echo "Wrong username";
                }
                
            }
            
            ?>
            </div>
      </section>
      
    </main>
    
  </body>
</html>