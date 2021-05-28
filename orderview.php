<!DOCTYPE html>
<html lang="en">
<?php 
    include 'db_conn.php';
    session_start();
    
    if(!isset($_SESSION['total'])){
        $_SESSION['total']=0;
        $_SESSION['quan']=0;
    }
    if(isset($_GET['orderno'])){
        $sql ="DELETE From `orders` where `Orderid`='".$_GET['orderno']."';";
        $sql1 = "DELETE From `productorder` where `orderid`='".$_GET['orderno']."';";
        if ($conn->query($sql) == TRUE or die(mysqli_error($conn))) {
            
        }
        if ($conn->query($sql1) == TRUE or die(mysqli_error($conn))) {
        }
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
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
    <br><br><br><br>
    <div class="container">
    <div class="shopping-cart" > 
            <div class="shopping-cart-header">
            <i class="fa fa-shopping-cart cart-icon" ></i><span class="badge"><?php echo $_SESSION['quan'] ?></span>
            <div class="shopping-cart-total">
                <span class="lighter-text">Total:</span>
                <span class="main-color-text total">&#8377;<?php echo $_SESSION['total']; ?></span>
            </div>
            </div> <!--end shopping-cart-header -->

            <ul class="shopping-cart-items" style="height:200px;max-height:300px;overflow-y:scroll">
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
        <br>
        <center><h3>Your Orders:</h3></center>
        <?php
           
            $sql0 = "SELECT * FROM `orders` WHERE `username`='".$_SESSION['user']."';";
            $result0 = $conn->query($sql0)or die(mysqli_error($conn));
            $count=0;
            while($row0 = $result0->fetch_assoc()){
                $sql1 = "SELECT * FROM `productorder` where `Orderid`='".$row0['Orderid']."';";
                $result1 = $conn->query($sql1)or die(mysqli_error($conn));
                $sql = "SELECT SUM(`quantity`) from `productorder` where `Orderid`='".$row0['Orderid']."';";
                $result = $conn -> query($sql) or die(mysqli_error($conn));
                $row = $result -> fetch_assoc();
                
                $quant = $row['SUM(`quantity`)'];
        ?>
        <div class="card" style='margin-top:30px;'>
                <div class="row">
                    <div class="col-md-8 cart" >
                        <div class="title">
                            <div class="row">
                                <div class="col">
                                    <h4><b>Order Id:<?php echo $row0['Orderid']?></b></h4>
                                </div>  
                            <?php 
                                if ($result1->num_rows > 0) {
                                    
                                    while($row1 = $result1->fetch_assoc()){
                                    
                                        $sql2 = "SELECT * FROM `product` where `Product_ID`='".$row1['productid']."';"; 
                                        $result2 = $conn->query($sql2)or die(mysqli_error($conn));
                                        
                                        $row2 = $result2->fetch_assoc();
                                        
                                        echo "<div class='row border-top border-bottom'  style='height:200px' id='rowbr'>";
                                        echo "<div class='row main align-items-center'>";
                                        echo "<div class='col-2'><img class='img-fluid' src='".$row2['Image_URL']."' style='height:50px;width:auto;';></div>";
                                        echo "<div class='col'>";
                                        //echo "<div class='row text-muted'>".$_SESSION['name'][$i]."</div>";
                                        echo "<div class='row'>".$row2['Product_Name']."</div>";
                                        echo "</div>";
                                        echo "<div class='col'><div class='border'>".$row1['quantity']."</div> </div>";
                                        echo "<div class='col'>&#8377;".$row2['Price']."</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        
                                    }
                                }
                            ?>
                            </div>
                            
                        </div>
                        <div class="back-to-shop" style='margin-top:20px;'><button class="btn btn-danger" onclick="cancel(<?php echo $row0['Orderid'] ?>)" name='Cancel Order' id=<?php echo $row0['Orderid'] ?> style='width:60%'> Cancel Order</button></div>
                    </div>
                    
                    <div class="col-md-4 summary">
                        
                                <div>
                                    <h5><b>Summary</b></h5>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col" style="padding-left:0;">Items <?php echo $quant; ?></div>
                                    <div class="col text-right">&#8377;<?php echo $row0['total']-$row0['Shippingcost'] ?></div>
                                </div>
                                <p>SHIPPING</p>
                                <?php 
                                    if($row0['Shippingcost']=="50"){
                                        echo "<div class='col'>Standard-Delivery&emsp;&#8377;50</div><br>";
                                    }
                                    else{
                                       echo "<div class='col' style='padding-left:20px;padding-left:20px;' >Express-Delivery &#8377;100</div><br>";
                                    }
                                    
                                 ?>   
                                
                                
                                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">TOTAL PRICE</div>
                               
                                <div class="col text-right" id="tot">&#8377;<?php echo $row0['total']?></div>   
                </div>
        </div>
                                </div>
                                </div>
        <?php 
            $count+=1;
            }
        ?>
        
    </main>
    <br>
        <?php include 'footer.php' ?>
        <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->

        <script>
        function cancel(a){
            window.location.href="orderview.php?orderno="+a;
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
