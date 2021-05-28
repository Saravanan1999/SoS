<html>
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
    <head>
        <link rel="stylesheet" type="text/css" href="assets/style/home.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
            .carousel-nav-icon {
                height: 48px;
                width: 48px;
            }

            .carousel-item .col, .col-sm, .col-md {
                margin: 8px;
                height: 300px;
                background-size: cover;
                background-position: center center;
            }
        </style>
    </head>
    <body onload="cen()">
        
        <div class="cover">

        </div>
        
        <nav>
           
            <a href="#" ><img src="assets/images/logo.jpg" style="height:80px;width:140px"></a>
            <input type="search" placeholder="Enter product"><button type="submit"><i class="fa fa-search"></i></button>
            <a href="#"><u>Home</u></a>
            <a href="#about">About</a>
            <a href="product_page.php?query=All">Products</a>
            <a href="#">Contact</a>
            
            
            <a href="#" id="cart" style="width:300px;"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $_SESSION['quan'] ?></span></a> 
            
            <?php 
            if(isset($_SESSION['user'])){
                echo "<div class='dropdown'>";
                echo "<button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' onclick='myFunction()' aria-expanded='false' style='margin-right:90px;width:150px;'>".$_SESSION['user']."</button>";
                echo "<div class='dropdown-menu' id='myDropdown' aria-labelledby='dLabel' style='width:200px;text-align:center'>";
                echo "<a href='#' style='display:none'></a>";
                echo "<a class='abc' href='orderview.php' style='font-size:15px;width:200px;text-align:center;;overflow:hidden;padding:0px;'>View Orders</a><hr>";
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
            let car=0;
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
        <img src="assets/images/banner.jpg" style="width:100%"/>
        <div class="onimage">
            <img src="assets/images/leaf.png" class="leaf">
            <p class="wel">Welcome to</p>
            <p class="logo" style="color:#8be848">Shades of spade</p>

        </div>
        <div id="about" class="mov">

        </div>
        <div class="about">
            <div class="des"><br><br>
            <h2>About Shades of spade</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
            <div class="imag">
                <img src="assets/images/about.jpg" style="height:350px;padding:50px;">
            </div>
        </div>
        <?php
            $sql = "SELECT * from `product` where `freq`='yes';";
            $result = $conn->query($sql) or die(mysqli_error($conn));
            if ($result->num_rows > 0) {
        ?>
        <div class="my-5 text-center container">
            <div class="row mb-2">
                <div class="col text-center">
                    <h1>Frequenty Bought Products</h1>
                    
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <a href="#carouselExampleIndicators" role="button"  onclick='prev()'>
                        <div class="carousel-nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
                            </svg>
                        </div>
                    </a>
                </div>
                
                <div class="col-10">
                    <!--Start carousel-->
                    <div id="carouselExampleIndicators" class="carousel slide" >

                        <div class="carousel-inner">
                            <?php 
                                $cnt=0;
                                while($row = $result->fetch_assoc()) {
                                    
                                    if($cnt==0){
                                        
                                        echo "<div class='carousel-item'><div class='row'>";
                                        echo "<div style='background-image:url(".$row['Image_URL'].");color:white;' class='col-12 col-md d-flex align-items-bottom justify-content-center'>";
                                        echo "<div style='position:relative;top:280px;background:black;width:100%;height:30px;'>".$row['Product_Name']."</div>";
                                        echo "</div>";
                                        
                                        $cnt++;
                                    }
                                    else if($cnt==1){
                                        echo "<div style='background-image:url(".$row['Image_URL'].");color:white;' class='col-12 col-md d-flex align-items-center justify-content-center'>";
                                        echo "<div style='position:relative;top:145px;background:black;width:100%;height:30px;'>".$row['Product_Name']."</div>";
                                        echo "</div>";
                                       
                                       $cnt++;
                                    }
                                    else if($cnt==2){
                                        echo "<div style='background-image:url(".$row['Image_URL'].");color:white;' class='col-12 col-md d-flex align-items-center justify-content-center' class='col-12 col-md d-flex align-items-center justify-content-center'>";
                                        echo "<div style='position:relative;top:145px;background:black;width:100%;height:30px;'>".$row['Product_Name']."</div>";
                                        echo "</div></div></div>";
                                      
                                       $cnt=0;
                                    }
                                    
                                }
                            ?>      
                                    
                        </div>            
                                    
                                    
                                        
                                    
                    </div>
                            
                    
                    <!--End carousel-->
                </div>
                <div class="col-1 d-flex align-items-center justify-content-center"><a  href="#carouselExampleIndicators" onclick='next()'>
                    <div class="carousel-nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
                        </svg>
                    </div>
                    </a>
                </div>
            <?php
                }
            ?>
            </div>
        </div>
        <br><br><br>
        <?php include 'footer.php' ?>
        <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->

        <script>
        function cen(){
            var carousel = document.querySelectorAll(".carousel-item");
            carousel[car].className="carousel-item active";
        }
        function prev(){
            var carousel = document.querySelectorAll(".carousel-item");
            var active = document.querySelector(".carousel-item.active");
            
            carousel[car].className="carousel-item";
            
            
            if(car==0){
                car=carousel.length-1;
                carousel[car].className="carousel-item active";
            }
            else{
                carousel[car-1].className="carousel-item active";
                car--;
            }
        }
        function next(){
            var carousel = document.querySelectorAll(".carousel-item");
            var active = document.querySelector(".carousel-item.active");
            
            carousel[car].className="carousel-item";
            
            
            if(car==carousel.length-1){
                car=0;
                carousel[car].className="carousel-item active";
            }
            else{
                carousel[car+1].className="carousel-item active";
                car++;
            }
        }
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