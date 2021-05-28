<!DOCTYPE html>
<html lang="en">
<?php 
    include 'db_conn.php';
    session_start();
    if(isset($_SESSION['placed'])){
        
    }
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
        <link rel="stylesheet" href="assets/style/shop.css">
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
    </head>
  <body>
  <div class="cover">

</div>

<nav>
   
    <a href="index.php" ><img src="assets/images/logo.jpg" style="height:80px;width:140px"></a>
    <input type="search" placeholder="Enter product"><button type="submit" ><i class="fa fa-search"></i></button>
    <a href="index.php">Home</a>
    <a href="index.php#about">About</a>
    <a href="product_page.php?query=All">Products</a>
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
    <br><br><br><br>
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
                    echo "<li class='clearfix' id='clrfx'>";
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
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart" style="height:500px;overflow-y:scroll;">
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h4><b>Enter shipping Address</b></h4>
                            </div>
                            <form action="#" method="post">
                            <div class='row '>
                              <span><label style="margin-top:20px;">Enter Full Name:</label>
                                <input type="text" class='form-control' name="name" style="width:300px;" required></span>
                                <span><label style="margin-top:20px;">Address:</label>
                                <input type="text" class='form-control' name="add" style="width:300px;"  required></span>
                                <span><label style="margin-top:20px;">City:</label>
                                <input type="text" class='form-control' name="city" style="width:300px;" required></span>
                                <span><label style="margin-top:20px;">State/Province/Region:</label>
                                <input type="text" class='form-control' name="state" style="width:300px;" required></span>
                                <span><label style="margin-top:20px;">ZIP:</label>
                                <input type="text" class='form-control' name="zip" style="width:300px;" pattern="[0-9]{5,6}" required></span>
                                <span><label for="country" style="margin-top:20px;">Country:</label>
                                <select  class="form-select" style="width:300px;"  name='country'>
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
                                </select></span>
                                
                                <span><label for="country" style="margin-top:20px;">Phone Number:</label>
                                <input type="text" class='form-control' name="phone" pattern="[0-9]{10}" style="width:300px;" required></span>
                                <input type="submit" value="Submit" class="btn btn-primary"  id="checkout" name="address" style="width:300px;margin-left:10px;margin-top:20px;background-color: #0d6efd;">
                            </form>
                            <?php
                                if(isset($_POST['address'])){
                                    $_SESSION['nameadd']=$_POST['name'];
                                    $_SESSION['addr'] = $_POST['add'];
                                    $_SESSION['city'] = $_POST['city'];
                                    $_SESSION['state'] = $_POST['state'];
                                    $_SESSION['zip'] = $_POST['zip'];
                                    $_SESSION['country'] = $_POST['country'];
                                    $_SESSION['phone'] = $_POST['phone'];
                                    echo "<h4 style='margin-top:20px;'>Address added Successfully</h4>";
                                }

                            ?>
                                <div class="back-to-shop" style='margin-top:20px;'><a href="product_page.php?query=All">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                            
                            </div>

                        </div></div>
                </div>
                            <div class="col-md-4 summary">
                                <div>
                                    <h5><b>Summary</b></h5>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col" style="padding-left:0;">Items <?php echo $_SESSION['quan']; ?></div>
                                    <div class="col text-right">&#8377;<?php echo $_SESSION['total'] ?></div>
                                </div>
                                <p>SHIPPING</p>
                                <?php 
                                    if($_SESSION['ship']=="50"){
                                        echo "<div class='col'>Standard-Delivery&emsp;&#8377;50</div><br>";
                                    }
                                    else{
                                       echo "<div class='col' style='padding-left:20px;padding-left:20px;' >Express-Delivery &#8377;100</div><br>";
                                    }
                                    
                                 ?>   
                                
                                
                                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">TOTAL PRICE</div>
                                <div id="hid" style="display:none"><?php echo $_SESSION['total']?> </div>
                                <div class="col text-right" id="tot">&#8377;<?php echo $_SESSION['totship']?></div>
                                <form action="#" method="post" style='margin:0px'>
                                </div> <input type='submit' class="btn btn-primary btn-block" name="place" id="checkout" style='margin:0px' value='Place Order'></form>
                                <?php
                                    if(isset($_POST['place'])){
                                       
                                        if(isset($_SESSION['nameadd'])){
                                            
                                            $name = $_SESSION['nameadd'];
                                            $addr = $_SESSION['addr'];
                                            $city = $_SESSION['city'];
                                            $state = $_SESSION['state'];
                                            $country = $_SESSION['country'];
                                            $phone = $_SESSION['phone'];
                                            $user = $_SESSION['user'];
                                            $total = $_SESSION['totship'];
                                            $ship = $_SESSION['ship'];
                                            
                                            $sql0 = "SELECT * FROM `orders` WHERE `orderid`=(SELECT max(`orderid`) FROM `orders`);";
                                            $result0 = $conn->query($sql0)or die(mysqli_error($conn));
                                            
                                            $row0 = $result0->fetch_assoc(); 
                                            
                                            $orderid = $row0['Orderid']+1;
                                            
                                            $sql1 = "INSERT INTO `orders`(`Username`, `name`, `Address`, `City`, `State`, `Country`, `Phone`, `total`, `Shippingcost`) VALUES ('$user','$name','$addr','$city','$state','$country','$phone','$total','$ship');";
                                            
                                            if ($conn->query($sql1) == TRUE or die(mysqli_error($conn))) {
                                                $arr = $_SESSION['name'];
                                                
                                                for($i=0;$i<count($arr);$i++){
                                                    $nme = $_SESSION['name'][$i];
                                                    $qty = $_SESSION['quantity'][$i];
                                                    $price = $_SESSION['price'][$i];
                                                    $sql3 = "SELECT * from `product` where `Product_Name`='$name'";
                                                    $result3 = $conn->query($sql3)or die(mysqli_error($conn));
                                                    $row3 = $result3->fetch_assoc(); 
                                                    $productid = $row3['Product_ID'];
                                                    $sql2 = "INSERT INTO `productorder`(`productid`, `orderid`, `price`, `quantity`) VALUES ('$productid','$orderid','$price','$qty')";
                                                    $conn->query($sql2);
                                                    
                                                }
                                                echo "<h4 style='margin-top:20px;margin-left:70px;'>Order Placed</h4>";
                                               
                                                unset($_SESSION['total']);
                                                unset($_SESSION['quan']);
                                                unset($_SESSION['name']);
                                                unset($_SESSION['price']);
                                                unset($_SESSION['quantity']);
                                                unset($_SESSION['ship']);
                                                unset($_SESSION['totship']);
                                                unset($_SESSION['url']);
                                                unset($_SESSION['placed']);
                                                
                                                
                                                
                                            }
                                            else{
                                                echo "<h4 style='margin-top:20px;margin-left:20px;'>Could not place the order</h4>";
                                            }
                                        }
                                        
                                        else{
                                            echo "<h4 style='margin-top:20px;margin-left:20px;color:red'>Add Shipping address</h4>";
                                        }
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    
                    </main><br>
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