<!DOCTYPE html>
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
<html>
    <head>
        <meta charset="utf-8">
        
        <title>SoS</title>
        <link rel="stylesheet" href="assets/style/product.css">
        <script src='assets/js/prod.js'></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <style>
            .abc{

                color:black;
                z-index: 999; 
            }
            .abc:hover{
                z-index: 999; 
                color:lawngreen;
            }
            nav{
                z-index:999;
            }
            .topnav{
                
                z-index:999;
                
            }
            .dropdown{
                
                z-index: 1;
            }
            .dropdown-menu{
                top:100px;
                z-index: 99; 
                
            }
            .dropdown-menu a{
                z-index:999;
                
            }
            .row img{
                box-shadow: 8px 8px 16px 4px #9E9E9E;
            }
            .price{
                font-size:15px;
                font-weight:800;
            }
            .pro_name{
                margin-top:25px;
                font-size:15px;
                font-weight:800;
                
            }
        </style>
    </head>
    <body onload="change()">
        <?php
            if(isset($_GET['sub'])){
            
                echo "<div id='subc'style='display:none'>".$_GET['sub']."</div>";
            }
            if(isset($_GET['max'])){
                echo "<div id='maxc'style='display:none'>".$_GET['max']."</div>";
            }
            if(isset($_GET['min'])){
                echo "<div id='minc'style='display:none'>".$_GET['min']."</div>";
            }
        ?>
        <nav>
            
            <a href="index.php" ><img src="assets/images/logo.jpg" style="height:80px;width:140px;"></a>
            <input type="search" placeholder="Enter product"><button type="submit" class='search'><i class="fa fa-search"></i></button> 
            <a href="index.php">Home</a>
            <a href="index.php#about">About</a>
            <a href="product_page.php?query=All&min=0&max=5000"><u>Products</u></a>
            <a href="contact.php">Contact</a>            
            
            <a href="#" id="cart" style="width:300px;"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $_SESSION['quan'] ?></span></a> 
            <?php 
            if(isset($_GET['query'])){
                echo "<div id='ids' style='display:none' >".$_GET['query']."</div>";
            }
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

        <br><br><br>
        <div class="topnav">
            <a href="?query=All&min=0&max=5000">All</a>
            <a href="?query=Seeds&min=0&max=5000">Seeds</a>
            <a href="?query=Fertilizers&min=0&max=5000">Fertilizers</a>
            <a href="?query=Pesticides&min=0&max=5000">Pesticides</a>
            <a href="?query=Machinery and Tools&min=0&max=5000">Machinery & Tools</a>
            <a href="?query=Others&min=0&max=5000">Others</a>
        </div>
        <center><h2 style="padding-top: 100px;">
        <?php 
            if(isset($_GET['query'])){
                echo $_GET['query'];
            } 
            else if(isset($_GET['search'])){
                echo $_GET['search'];
            }
        ?>

        </h2></center>
        <div class="center">
        <div class="row" >
        <?php
        if(isset($_GET['search'])){
            $sql = "SELECT * from product where `Product_Name` REGEXP '[.]*".$_GET['search']."[.]*' or `Category` REGEXP '[.]*".$_GET['search']."[.]*' or `subcategory` REGEXP '[.]*".$_GET['search']."[.]*';";
            $result1 = $conn->query($sql);
            if ($result1->num_rows > 0) {
                while($row = $result1->fetch_assoc()) {
                    echo "<div class='col-lg-3 col-md-4 col-sm-6'  >";
                    echo " <a href='product_detail.php?id=".$row['Product_ID']."'><img src=".$row['Image_URL']." alt='prod_img' style='height:300px;width:100%' ></a>";
                    echo "<div style='text-align:center' class='pro_name'>".$row['Product_Name']."</div>";
                    echo "<div style='text-align:center' class='price'>₹".$row['Price']."</div>";
                    echo "</div>";
                }
            }
            else{
                echo "<center><br><br><h2>No products found :(</h2></center>";
            }
            echo "</div>";        

        }

        else{
        ?>

        <div class="center">
            
                <div class="dual-range" data-min="0" data-max="5000" style="margin-left:350px;z-index:1;">
                
                    <span class="handle left" id='mini' style='margin-top:25px;' ></span>
                    <span class="highlight" style='margin-top:25px;'></span>
                    <span class="handle right" id='maxi' style='margin-top:25px;'></span>
                    <button name="button" class='btn btn-success' onclick='filter()'style='margin-left:200px;margin-top:15px;'>Filter</button>
                </div>
                
            </div>
           
        <div class='container' style='width:250px;margin-left:50px;'>
        
            <select class='form-select' id='sub' onchange="sub()">
                
                <option disabled selected value>Select Sub Category</option>
                <?php 
                    if($_GET['query']=='All'){
                        $sql1= "SELECT DISTINCT `subcategory` from product";
                    }
                    else{
                        $sql1= "SELECT DISTINCT `subcategory` from product where `category`='".$_GET['query']."';";
                    }
                    $result1 = $conn->query($sql1);
                    if ($result1->num_rows > 0) {
                        while($row1 = $result1->fetch_assoc()){

                        
                
                ?>
                <option value="<?php echo $row1['subcategory']?>"><?php echo $row1['subcategory']?></option>
                <?php 
                    }
                }
                ?>
            </select><br>
            
        </div>
        
        <br><br>
        <center>
        <div class="row">
            <?php 
            
            if($_GET['query']=='All'){
                if(isset($_GET['sub'])){
                    $sql = "SELECT * FROM product where `subcategory`='".$_GET['sub']."' and `Price` BETWEEN ".$_GET['min']." AND ".$_GET['max'].";";
                    $result = $conn->query($sql) or die(mysqli_error($conn));
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
                        echo " <a href='product_detail.php?id=".$row['Product_ID']."'><img src=".$row['Image_URL']." alt='prod_img' style='height:300px' ></a>";
                        echo "<div class='pro_name'>".$row['Product_Name']."</div>";
                        echo "<div class='price'>₹".$row['Price']."</div>";
                        echo "</div>";
                        }
                    } 
                }
                else{
                    $sql = "SELECT * FROM product where `Price` BETWEEN ".$_GET['min']." AND ".$_GET['max'].";";
                    $result = $conn->query($sql) or die(mysqli_error($conn));
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
                        echo " <a href='product_detail.php?id=".$row['Product_ID']."'><img src=".$row['Image_URL']." alt='prod_img' style='height:300px' ></a>";
                        echo "<div class='pro_name'>".$row['Product_Name']."</div>";
                        echo "<div class='price'>₹".$row['Price']."</div>";
                        echo "</div>";
                        }
                    } 
                }
            }
            
            else{
                if(isset($_GET['sub'])){
                    $sql = "SELECT * FROM product where `subcategory`='".$_GET['sub']."' and `category`='".$_GET['query']."' and `Price` BETWEEN ".$_GET['min']." AND ".$_GET['max'].";";
                    $result = $conn->query($sql) or die(mysqli_error($conn));
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
                        echo " <a href='product_detail.php?id=".$row['Product_ID']."'><img src=".$row['Image_URL']." alt='prod_img' style='height:300px' ></a>";
                        echo "<div class='pro_name'>".$row['Product_Name']."</div>";
                        echo "<div class='price'>₹".$row['Price']."</div>";
                        echo "</div>";
                        }
                    } 
                }
                else{
                    $sql = "SELECT * FROM product where `category`='".$_GET['query']."'and `Price` BETWEEN ".$_GET['min']." AND ".$_GET['max'].";";
                    $result = $conn->query($sql) or die(mysqli_error($conn));
        
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
                        echo " <a href='product_detail.php?id=".$row['Product_ID']."'><img src=".$row['Image_URL']." alt='prod_img' style='height:300px' ></a>";
                        echo "<div class='pro_name'>".$row['Product_Name']."</div>";
                        echo "<div class='price'>₹".$row['Price']."</div>";
                        echo "</div>";
                        }
                    } 
                }
            }
            
            ?>
        </div>
    </center>
    <?php
        }
    ?>
    <br><br><br><br>
    </div>
    <?php include 'footer.php' ?>
    <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->
    <script>
        function filter(){
            if ($('#subc').length > 0){
                var mini = $('#mini').attr('data-value');
                var maxi = $('#maxi').attr('data-value');
                var ids = document.getElementById('ids').innerHTML;
                var sub = document.getElementById('subc').innerHTML;
                window.location.href="product_page.php?query="+ids+"&min="+mini+"&max="+maxi+"&sub="+sub;
            }
            else{
                var mini = $('#mini').attr('data-value');
                var maxi = $('#maxi').attr('data-value');
                var ids = document.getElementById('ids').innerHTML;
                window.location.href="product_page.php?query="+ids+"&min="+mini+"&max="+maxi;
            }
        }
        function change(){
            if ($('#subc').length > 0){
                var ids = document.getElementById('subc').innerHTML;
                var sub = document.getElementById('sub').value=ids;
            }
            var mini = document.getElementById('minc').innerHTML;
            var maxi = document.getElementById('maxc').innerHTML;
            $('#mini').attr('data-value',mini);
            $('#maxi').attr('data-value',maxi);
        }
        function sub(){
            var sub = document.getElementById('sub').value;
            var ids = document.getElementById('ids').innerHTML;
            var mini = $('#mini').attr('data-value');
            var maxi = $('#maxi').attr('data-value');
            window.location.href="product_page.php?query="+ids+"&min="+mini+"&max="+maxi+"&sub="+sub;
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