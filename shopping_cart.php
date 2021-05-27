<html>
    <?php 
        include 'db_conn.php';
        session_start();
        
        if(!isset($_SESSION['total'])){
            $_SESSION['total']=0;
            $_SESSION['quan']=0;
        }
        if(isset($_GET['rem'])){
            if($_GET['rem']==0){
                array_shift($_SESSION['name']);
                array_shift($_SESSION['price']);
                array_shift($_SESSION['quantity']);
                array_shift($_SESSION['url']);
            }
            else{
                array_splice($_SESSION['name'], $_GET['rem'], $_GET['rem']); 
                array_splice($_SESSION['price'], $_GET['rem'], $_GET['rem']); 
                array_splice($_SESSION['quantity'], $_GET['rem'], $_GET['rem']); 
                array_splice($_SESSION['url'], $_GET['rem'], $_GET['rem']); 
            }
            $_SESSION['total']=0;
            $_SESSION['quan']=0;
            for($i=0;$i<count($_SESSION['name']);$i++){
                $_SESSION['total']+=$_SESSION['price'][$i]*$_SESSION['quantity'][$i];
                $_SESSION['quan']+=$_SESSION['quantity'][$i];
            }
        }
        if(isset($_GET['qua'])){
            $_SESSION['quantity'][$_GET['pos']]=$_GET['qua'];
            $_SESSION['total']=0;
            $_SESSION['quan']=0;
            for($i=0;$i<count($_SESSION['name']);$i++){
                $_SESSION['total']+=$_SESSION['price'][$i]*$_SESSION['quantity'][$i];
                $_SESSION['quan']+=$_SESSION['quantity'][$i];
            }
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
        
    </head>
    <body>
        
        <div class="cover">

        </div>
        
        <nav>
           
            <a href="#" ><img src="assets/images/logo.jpg" style="height:80px;width:140px"></a>
            <input type="search" placeholder="Enter product"><button type="submit"><i class="fa fa-search"></i></button>
            <a href="home.php">Home</a>
            <a href="home.php#about">About</a>
            <a href="product_page.php?query=All">Products</a>
            <a href="#">Contact</a>
            
            
            <a href="#" id="cart" style="width:300px;"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $_SESSION['quan'] ?></span></a> 
            
            <a href="signup.php"><button class="sign">Sign Up</button></a>
            
        </nav><br><br><br><br>
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
        <main>
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart" style="height:500px;overflow-y:scroll;">
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h4><b>Shopping Cart</b></h4>
                            </div>
                            <div class="col align-self-center text-right text-muted"><?php echo $_SESSION['quan'] ?> items</div>
                        </div>
                    </div>
                    <div id="something">
                    <?php 
                        for($i=0;$i<count($_SESSION['name']);$i++){
                            echo "<div class='row border-top border-bottom' id='rowbr'>";
                            echo "<div class='row main align-items-center'>";
                            echo "<div class='col-2'><img class='img-fluid' src='".$_SESSION['url'][$i]."' style='height:50px;width:auto;';></div>";
                            echo "<div class='col'>";
                            //echo "<div class='row text-muted'>".$_SESSION['name'][$i]."</div>";
                            echo "<div class='row'>".$_SESSION['name'][$i]."</div>";
                            echo "</div>";
                            echo "<div class='col'> <a href='#' onclick='decrease(".$i.")' >-</a><a href='#' class='border'>".$_SESSION['quantity'][$i]."</a><a href='#' onclick='increase(".$i.")'>+</a> </div>";
                            echo "<div class='col'>&#8377;".$_SESSION['price'][$i]."<a href='#'><span class='close' id='remove' onclick='rem(".$i.")' style='margin-left:50px'>&#10005;</span></a></div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                    </div>
                    <script>
                        
                        if ($('#rowbr').length > 0) {
            
                        }
                        else{
                            document.getElementById('something').innerHTML='<center><h3>Your cart is empty :(</h3></center>';
                            document.getElementById("checkout").disabled = true;
                        }
                        function rem(a){
                            window.location.href="shopping_cart.php?rem="+a.toString();
                        }
                        function decrease(a){
                            var val = document.querySelectorAll(".border");
                            var x, i;
                            x=val.length;
                            var y;
                            for(i=0;i<x;i++){
                                if(i==a){
                                    y=val[i].innerHTML;
                                    if(parseInt(val[i].innerHTML)>1){
                                        
                                        y = parseInt(val[i].innerHTML)-1;
                                        window.location.href="shopping_cart.php?qua="+y.toString()+"&pos="+a.toString();
                                        break;
                                    }
                                }
                                
                            }

                        }
                        function increase(a){
                            var val = document.querySelectorAll(".border");
                            var x, i;
                            x=val.length;
                            var y;
                            for(i=0;i<x;i++){
                                if(i==a){
                                    y=val[i].innerHTML;
                                    if(parseInt(val[i].innerHTML)<9){
                                        y = parseInt(val[i].innerHTML)+1;
                                        window.location.href="shopping_cart.php?qua="+y.toString()+"&pos="+a.toString();
                                        break;
                                    }
                                }
                                
                            }

                        }
                    </script>
                    <div class="back-to-shop"><a href="product_page.php?query=All">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS <?php echo $_SESSION['quan']; ?></div>
                        <div class="col text-right">&#8377;<?php echo $_SESSION['total'] ?></div>
                    </div>
                    <form>
                        <p>SHIPPING</p> <select id="delivery" onclick="del()">
                            <option class="text-muted" value="50">Standard-Delivery- &#8377;50</option>
                            <option class="text-muted" value="100">Express-Delivery- &#8377;100</option>
                        </select>
                        
                    </form>
                    <script>
                        function del(){
                            var total = parseInt(document.getElementById('hid').innerHTML);
                            var ship = parseInt(document.getElementById('delivery').value);
                            var totship = total+ship;
                            document.getElementById('tot').innerHTML=totship;
                        }
                    </script>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div id="hid" style="display:none"><?php echo $_SESSION['total']?> </div>
                    <div class="col text-right" id="tot"></div>
                    </div> <button class="btn btn-primary btn-block" id="checkout">CHECKOUT</button>
                    <script>
                        
                        if ($('#rowbr').length > 0){
                            document.getElementById("checkout").disabled = false;
                        }
                        else{
                            
                            document.getElementById("checkout").disabled = true;
                        }
                    </script>
                </div>
            </div>
        </div>
        </main><br>
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