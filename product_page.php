<!DOCTYPE html>
<?php include 'db_conn.php'?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tools</title>
        <link rel="stylesheet" href="assets/style/product.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav>
           
            <a href="#" ><img src="assets/images/logo.jpg" style="height:80px;width:140px;"></a>
            <input type="search" placeholder="Enter product"><button type="submit"><i class="fa fa-search"></i></button> 
            <a href="home.php">Home</a>
            <a href="home.php#about">About</a>
            <a href="#"><u>Products</u></a>
            <a href="#">Contact</a>            
            
            <a href="#"><i class="fa fa-shopping-cart"></i> Cart</a> 
            <a href="signup.php"><button class="sign">Sign Up</button></a>
            
        </nav><br><br><br>
        <div class="topnav">
            <a href="?query=Seeds">Seeds</a>
            <a href="?query=Fertilizers">Fertilizers</a>
            <a href="?query=Pesticides">Pesticides</a>
            <a href="?query=Machinery & Tools">Machinery & Tools</a>
            <a href="?query=Others">Others</a>
        </div>
        <center><h2 style="padding-top: 100px;"><?php echo $_GET['query'] ?></h2></center><br><br>
       
        <br><br>
        <center>
        <div class="row">
            <?php 
            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
                  echo " <a href='#'><img src=".$row['Image_URL']." alt='prod_img'></a>";
                  echo "<div class='pro_name'>".$row['Product_Name']."</div>";
                  echo "<div class='price'>₹".$row['Price']."</div>";
                  echo "</div>";
                }
              } 
            
            ?>
        </div>
    </center>
    <br><br><br><br>
    <?php include 'footer.php' ?>
    <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->

        
        
    </body>
</html>