<html>
    <?php 
        include 'db_conn.php';
        session_start();
        
        if(!isset($_SESSION['total'])){
            $_SESSION['total']=0;
            $_SESSION['quan']=0;
        }
    ?>
    <head>
      
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
           
          <a href="home.html" ><img src="assets/images/logo.jpg" style="height:80px;width:140px"></a>
            <input type="search" placeholder="Enter product"><button type="submit"><i class="fa fa-search"></i></button>
            <a href="home.php">Home</a>
            <a href="home.php#about">About</a>
            <a href="product_page.php">Products</a>
            <a href="#">Contact</a>
            
            
            <a href="#" id="cart" style="width:300px;"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $_SESSION['quan'] ?></span></a> 
            <a href="login.php"><button class="sign">Log In</button></a>
            
        </nav>
        <div class="container">
        <div class="shopping-cart">
                <div class="shopping-cart-header">
                <i class="fa fa-shopping-cart cart-icon" ></i><span class="badge"><?php echo $_SESSION['quan'] ?></span>
                <div class="shopping-cart-total">
                    <span class="lighter-text">Total:</span>
                    <span class="main-color-text total">&#8377;<?php echo $_SESSION['total']; ?></span>
                </div>
                </div> <!--end shopping-cart-header -->

                <ul class="shopping-cart-items" style="max-height:300px;overflow-y:scroll">
                <?php 
                    $arr = $_SESSION['name'];
                    for($i=0;$i<count($arr);$i++){
                        $url = $_SESSION['url'][$i];
                        echo "<li class='clearfix'>";
                        echo "<img src = '".$url."' />";
                        echo "<span class='item-name'>".$_SESSION['name'][$i]."</span>";
                        echo " <span class='item-price'>&#8377;".$_SESSION['price'][$i]."</span>";
                        echo "<span class='item-quantity'>Quantity:".$_SESSION['quantity'][$i]."</span>";
                        //echo "<button class='item-detail' style='background-color:red;width:20px;' >Remove<i class='fa fa-remove'></i></button>";
                        echo "</li>";
                    }
                    
                ?>
               
                    
                
               
                </ul>

                <a href="shopping_cart.php" class="button">Checkout <i class="fa fa-chevron-right"></i></a>
            </div> <!--end shopping-cart -->
        </div>
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
    <select style="height:50px;">
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include 'footer.php' ?>
        <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->
        <script>
          (function(){
            $(document).click(function() {
                var $item = $(".shopping-cart");
                if ($item.hasClass("active")) {
                $item.removeClass("active");
                }
            });
            
            $('.shopping-cart').each(function() {
                var delay = $(this).index() * 50 + 'ms';
                $(this).css({
                    '-webkit-transition-delay': delay,
                    '-moz-transition-delay': delay,
                    '-o-transition-delay': delay,
                    'transition-delay': delay
                });
            });
            $('#cart').click(function(e) {
                e.stopPropagation();
                $(".shopping-cart").toggleClass("active");
            });
            
            $('#addtocart').click(function(e) {
                e.stopPropagation();
                $(".shopping-cart").toggleClass("active");
            });


            
            })();
      </script>
      
    </body>
</html>