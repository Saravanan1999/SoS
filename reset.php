<html>
    <head>
    <?php 
        include 'db_conn.php';
        session_start();
        
        if(!isset($_SESSION['total'])){
            $_SESSION['total']=0;
            $_SESSION['quan']=0;
        }
        if(isset($_GET['logout'])){
            session_destroy();
            header("location: index.php");
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
            .abc{
                color:black;
            }
            .abc:hover{
                
                color:lawngreen;
            }
            .dropdown-menu{
                top:55px;
                z-index: 99; 
                
            }
        </style>
        <style>
            form a{
                color:black;
                text-decoration:none;
            }
        </style>
    </head>
    <body>
    
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
                echo "<div class='dropdown'>";
                echo "<button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' onclick='myFunction()' aria-expanded='false' style='margin-right:90px;width:150px;'>".$_SESSION['user']."</button>";
                echo "<div class='dropdown-menu' id='myDropdown' aria-labelledby='dLabel' style='width:200px;text-align:center'>";
                echo "<a href='#' style='display:none'></a>";
                echo "<a class='abc' href='#' style='font-size:15px;width:200px;text-align:center;;overflow:hidden;padding:0px;'>View Orders</a><hr>";
                echo "<a class='abc' href='reset.php' style='font-size:15px;width:200px;padding:0px;text-align:center;'>Reset Password</a><hr>";
                echo "<a class='abc' href='index.php?logout=true' style='font-size:15px;width:200px;padding:0px;text-align:center;'>Logout</a>";
                echo "<a href='#' style='display:none'></a>";
                echo "</div>";
                echo "</div>";
            }
            else{
                echo "<a href='signup.php'><button class='sign'>Sign Up</button></a>";
            }
            ?>
            
        </nav>
        <script>
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }
        </script>
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
        <h1>Reset Password</h1>
    
    <hr>
        <label for="prepsw"><b>Previous Password</b></label><br>
        <input type="password" placeholder="Enter Previous Password" name="prepwd" required><br>
        <label for="psw"><b>New Password</b></label><br>
        <input type="password" placeholder="Enter New Password" name="psw" required><br>
        <label for="repsw"><b>New Password</b></label><br>
        <input type="password" placeholder="Re-enter New Password" name="repsw" required><br>
        <input type="submit" name='submit'value="Reset"><br><br>
        <!--<label class="psw">Forgot <a href="forgotpassword.html">password?</a></label><br>-->
        
            
    
    </div>
 
    </form>
    <div >
    <?php
        if(isset($_POST['submit'])){
            $username = $_SESSION['user'];
            $password = $_POST['prepwd'];
            $newpass = $_POST['psw'];
            $repsw = $_POST['repsw'];
            $password = hash('sha512',$password);
            $sql = "Select * from users where username='".$username."';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if($row['password']===$password){
                    if($newpass == $repsw){
                        $newpass = hash('sha512',$newpass);
                        $sql = "Update users set password='".$newpass."' where username='".$username."';";
                        if ($conn->query($sql) == TRUE or die(mysqli_error($conn))) {
                            echo "<h3 style='color:black;position:relative;top:20px;left:570px'>Password Reset Successfully</h3><br><br>";
                        }
                        else{
                            echo "<h3 style='color:red;position:relative;top:20px;left:570px'>Password Reset Failed</h3><br><br>";
                        }
                    }
                    else{
                        echo "<h3 style='color:red;position:relative;top:20px;left:570px'>Wrong Retyped Password</h3><br><br>";
                    }
                }
                else{
                    echo "<h3 style='color:red;position:relative;top:20px;left:590px'>Wrong Current Password</h3><br>";
                }
            }
            else{
                echo "<h3 style='color:red;position:relative;top:550px;left:590px'>Username does not exist</h3><br>";
            }
            
        }
    ?>
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