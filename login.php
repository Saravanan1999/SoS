<html>
    <head>
    <?php 
        include 'db_conn.php';
        session_start();
        
        if(!isset($_SESSION['total'])){
            $_SESSION['total']=0;
            $_SESSION['quan']=0;
        }
    ?>
        <link rel="stylesheet" type="text/css" href="assets/style/login.css"> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <style>
            form a{
                color:black;
                text-decoration:none;
            }
        </style>
    </head>
    <body>
    <?php
        if(isset($_POST['submit'])){
            $username = $_POST['uname'];
            $password = $_POST['psw'];
            $password = hash('sha512',$password);
            $sql = "Select * from users where username='".$username."';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if($row['password']===$password){
                    $_SESSION['user']=$username;
                    echo "<h3 style='position:relative;top:550px;left:640px'>Login Successful</h3><br>";
                }
                else{
                    echo "<h3 style='color:red;position:relative;top:550px;left:640px'>Wrong Password</h3><br>";
                }
            }
            else{
                echo "<h3 style='color:red;position:relative;top:550px;left:590px'>Username does not exist</h3><br>";
            }
            header("location: index.php");
        }
    ?>
        <div class="cover">
            
        </div>
        <nav>
           
          <a href="index.php" ><img src="assets/images/logo.jpg" style="height:80px;width:140px"></a>
            <input type="search" placeholder="Enter product"><button type="submit"><i class="fa fa-search"></i></button>
            <a href="index.php">Home</a>
            <a href="index.php#about">About</a>
            <a href="product_page.php">Products</a>
            <a href="#">Contact</a>
            
            
            <a href="#" id="cart" style="width:300px;"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $_SESSION['quan'] ?></span></a> 
            <?php 
            if(isset($_SESSION['user'])){
                echo "<div style='color:white;padding-right:40px;'>".$_SESSION['user']."</div>";
            }
            else{
                echo "<a href='signup.php'><button class='sign'>Sign Up</button></a>";
            }
            ?>
            
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
                        echo "<li class='clearfix' id='clrfx' >";
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
  <main>
  <form  action="" method="post">
    
    <div class="logincontainer">
        <h1>Log In</h1>
    
    <hr>
        <label for="uname"><b>Username</b></label><br>
        <input type="text" placeholder="Enter Username" name="uname" required><br>
        <label for="psw"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="psw" required><br>
        <input type="submit" name='submit'value="Log In"><br><br>
        <!--<label class="psw">Forgot <a href="forgotpassword.html">password?</a></label><br>-->
        <label>Don't have an account? <a href="signup.html">Register</a></label><br><br><br>
            
    
    </div>
 
    </form>
    <div >
    
    </div><br>
</main>
    <?php include 'footer.php' ?>
    <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->
    <script>
        if ($('#clrfx').length > 0){
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
        }
      </script>
      
    </body>
</html>