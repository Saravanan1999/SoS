<!DOCTYPE html>
<html lang="en">
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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/style/product.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">-->

    <title>Tools</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- Bootstrap core CSS -->
   <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/style/fontawesome.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/owl.css">
    <style>
            .abc{
                color:black;
            }
            .abc:hover{
                
                color:lawngreen;
            }
            .dropdown{
                z-index: 999;
            }
            .dropdown-menu{
                top:55px;
                z-index: 99; 
                
            }
        </style>
  </head>
  <body>
  <?php
        $sql = "SELECT * FROM product where Product_ID='".$_GET['id']."';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Id = $row['Product_ID'];
            $description = $row['Description'];
            $Image_URL = $row['Image_URL'];
            $Product_Name = $row['Product_Name'];
            $Price = $row['Price'];
        }
        else{
            header("Location: '/product_page.php'");
        } 
    ?>
  <?php
    if(isset($_SESSION['user'])){
        if(isset($_POST['submit'])){
        $quantity = $_POST['quan'];
        if($_SESSION['total']==0){
            $_SESSION['name']=array();
            array_push($_SESSION['name'],$Product_Name);
            $_SESSION['quantity']=array();
            array_push($_SESSION['quantity'],$quantity);
            $_SESSION['url']=array();
            array_push($_SESSION['url'],$row['Image_URL']);
            $_SESSION['price']=array();
            array_push($_SESSION['price'],$Price);
            $_SESSION['total']=$Price*$quantity;
            $_SESSION['quan']=$quantity;
        }
        else{
            $arr = $_SESSION['name'];
            
            if(in_array($Product_Name, $arr)){
                $id = array_search($Product_Name,$arr);
            
                $_SESSION['quantity'][$id]+=$quantity;
                $_SESSION['total']+=$Price*$quantity;
                $_SESSION['quan']+=$quantity;
            }
            else{
                array_push($_SESSION['name'],$Product_Name);
                array_push($_SESSION['quantity'],$quantity);
                array_push($_SESSION['url'],$row['Image_URL']);
                array_push($_SESSION['price'],$Price);
                $_SESSION['total']+=$Price*$quantity;
                $_SESSION['quan']+=$quantity;
            }
        }
        
        }
    }
    else{
        echo "<div id='no' style='display:none'>true</div>";
    }

?>

    <nav>
           
           <a href="index.php" ><img src="assets/images/logo.jpg" style="height:80px;width:140px;"></a>
           <input type="search" placeholder="Enter product"><button type="submit"><i class="fa fa-search"></i></button> 
           <a href="index.php">Home</a>
           <a href="index.php#about">About</a>
           <a href="#"><u>Products</u></a>
           <a href="#">Contact</a>            
           
           <a href="#" id="cart" style="width:300px;"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $_SESSION['quan'] ?></span></a> 
           <?php 
            if(isset($_SESSION['user'])){
                echo "<div class='dropdown'>";
                echo "<button id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' onclick='myFunction()' aria-expanded='false' style='margin-right:90px;width:150px;'>".$_SESSION['user']."</button>";
                echo "<div class='dropdown-menu' id='myDropdown' aria-labelledby='dLabel' style='width:200px;text-align:center'>";
                echo "<a href='#' style='display:none'></a>";
                echo "<a class='abc' href='#' style='font-size:15px;width:200px;text-align:center;;overflow:hidden;padding:0px;'>View Orders</a><hr>";
                echo "<a class='abc' href='#' style='font-size:15px;width:200px;padding:0px;text-align:center;'>Reset Password</a><hr>";
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
                        echo "&emsp;<a href='#'><span class='badge' style='background-color:red'><i class='fa fa-remove'></i></span></a>";
                        echo "</li>";
                    }
                    
                ?>
               
                    
                
               
                </ul>

                <a href="shopping_cart.php" class="button">Checkout <i class="fa fa-chevron-right"></i></a>
            </div> <!--end shopping-cart -->
        </div>
    <br><br><br>
    
    <div class="products">
        <div class="container">
            <div class="row">
            <div class="col-md-4 col-xs-12">
                <div>
                <img src=<?php echo $row['Image_URL']?> alt="" class="img-fluid wc-image">
                </div>
                <br>
                
            </div>

            <div class="col-md-8 col-xs-12">
                <form action="#" method="post" class="form">
                <h2><?php echo $Product_Name ?></h2>

                <br>

                <p class="lead">
                    <strong class="text-primary">&#8377;<?php echo $Price ?></strong>
                </p>

                <br>

                <p class="lead">
                    <?php echo $description ?>
                </p>

                <br> 

                
                    
                <div class="col-sm-8">
                    <label>Quantity</label>

                   <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <select class="form-select" name="quan" aria-label="Default select example">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                          <button name="submit" id='tocart' class="btn btn-primary btn-block" >Add to Cart</button>
                        </div>
                    </div>
                    </div>
                </div>
                </form>
               
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Buy Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            To buy products, please log in or Sign Up. 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script>
        if($('#no').length > 0){
            $(document).ready(function(){
                $("#exampleModal").modal('show');
            });
        }
    </script>
    <script>
        
        if($('#no').length > 0){
            document.getElementById("tocart").disabled = true;
           
        }
        else{
            document.getElementById("checkout").disabled = false;
        }
        
        
        if ($('#clrfx').length > 0){
          (function(){
            
            
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
      
    <!-- Bootstrap core JavaScript -->
   <!--<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
