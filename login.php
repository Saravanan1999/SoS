<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/style/login.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <div class="cover">
            
        </div>
        <nav>
           
          <a href="home.php" ><img src="assets/images/logo.jpg" style="height:80px;width:140px"></a>
            <input type="search" placeholder="Enter product"><button type="submit"><i class="fa fa-search"></i></button>
            <a href="home.php">Home</a>
            <a href="home.php#about">About</a>
            <a href="product_page.php">Products</a>
            <a href="#">Contact</a>
            
            
            <a href="#"><i class="fa fa-shopping-cart"></i> Cart</a> 
            <a href="signup.php"><button class="sign">Sign Up</button></a>
            
        </nav>
        <div></div>
  <main>
  <form  action="">
    
    <div class="logincontainer">
        <h1>Log In</h1>
    
    <hr>
        <label for="uname"><b>Username</b></label><br>
        <input type="text" placeholder="Enter Username" name="uname" required><br>
        <label for="psw"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="psw" required><br>
        <input type="submit" value="Log In"><br><br>
        <!--<label class="psw">Forgot <a href="forgotpassword.html">password?</a></label><br>-->
        <label>Don't have an account? <a href="signup.html">Register</a></label><br><br><br>
            
    
    </div>
 
    </form>
</main>
    <?php include 'footer.php' ?>
    <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->

      
    </body>
</html>