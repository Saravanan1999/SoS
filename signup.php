<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/style/login.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        
        <div class="cover">
            
        </div>
        <nav>
           
          <a href="home.html" ><img src="assets/images/logo.jpg" style="height:80px;width:140px"></a>
            <input type="search" placeholder="Enter product"><button type="submit"><i class="fa fa-search"></i></button>
            <a href="home.php">Home</a>
            <a href="home.php#about">About</a>
            <a href="product_page.php">Products</a>
            <a href="#">Contact</a>
            
            
            <a href="#"><i class="fa fa-shopping-cart"></i> Cart</a> 
            <a href="login.php"><button class="sign">Log In</button></a>
            
        </nav>
<main >
  <form action="" >
  <div class="logincontainer">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email" name="email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-]+$" required><br>
    <label for="Username"><b>Username</b></label><br>
    <input type="text" placeholder="Enter Username" name="username" required><br>

    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" minlength="8" required><br>

    <label for="psw-repeat"><b>Repeat Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" minlength="8" required><br>

    
    <label for="number"><b>Mobile Number</b></label><br>
    <input type="tel" placeholder="Mobile Number" name="psw-repeat" pattern="\d*" minlength="10" maxlength="10" required><br>
    <label for="country"><b>Country</b></label><br>
    <select>
      <option value="Australia">Australia</option>
      <option value="Brazil">Brazil</option>
      <option value="Canada">Canada</option>
      <option value="China">China</option>
      <option value="China">France</option>
      <option value="China">Germany</option>
      <option value="India">India</option>
      <option value="Italy">Italy</option>
      <option value="Japan">Japan</option>
      <option value="Mexico">Mexico</option>
      <option value="Spain">Spain</option>
      <option value="Sweden">Sweden</option>
      <option value="United Arab Emirates	">United Arab Emirates	</option>
      <option value="United Kingdom">United Kingdom</option>
      <option value="United States">United States</option>
    </select>
 
      
    <div class="clearfix">
      <input type="submit" value="Sign Up">
    </div>
  </div>
</form>

</main>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include 'footer.php' ?>
        <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->

      
    </body>
</html>