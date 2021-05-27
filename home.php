<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/style/home.css">
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
            <a href="#"><u>Home</u></a>
            <a href="#about">About</a>
            <a href="product_page.php?query=All">Products</a>
            <a href="#">Contact</a>
            
            
            <a href="#"><i class="fa fa-shopping-cart"></i> Cart</a> 
            <a href="signup.php"><button class="sign">Sign Up</button></a>
            
        </nav>
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
        <center>
        <div class="freq-bought">
            <br>
            <h2>Frequently bought products:</h2><br>
            <figure>
            <a href="#"><img src="assets/images/black.jpg" style="width:200px;"></a>
            <figcaption>consectetur adipiscing elit, sed do eiusmod tempor incididunt<br><br>
                <button class="buy">Buy me</button>
            </figcaption>
            </figure>
            <figure>
              <a href="#">  <img src="assets/images/black.jpg" style="width:200px;"></a>
              <figcaption>consectetur adipiscing elit, sed do eiusmod tempor incididunt<br><br>
                <button class="buy">Buy me</button>
            </figcaption>
        </figure>
            <figure>
               <a href="#"> <img src="assets/images/black.jpg" style="width:200px;"></a>
               <figcaption>consectetur adipiscing elit, sed do eiusmod tempor incididunt<br><br>
                <button class="buy">Buy me</button>
            </figcaption>
        </figure>
            <figure>
              <a href="#">  <img src="assets/images/black.jpg" style="width:200px;"></a>
            <figcaption>consectetur adipiscing elit, sed do eiusmod tempor incididunt<br><br>
                <button class="buy">Buy me</button>
            </figcaption>
            </figure>
            
            
        </div></center><br><br><br>
        <?php include 'footer.php' ?>
        <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->

      
    </body>
</html>