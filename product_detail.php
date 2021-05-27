<!DOCTYPE html>
<html lang="en">
<?php include 'db_conn.php'?>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/style/product.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Tools</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/style/fontawesome.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/owl.css">

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
                            <select class="form-select" aria-label="Default select example">
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
                          <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                        </div>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
