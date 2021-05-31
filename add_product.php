<!DOCTYPE html>
<html>
    <?php include 'db_conn.php'?>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="assets/style/admin_login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <?php
        session_start();
        if(isset($_GET['logout'])){
            session_destroy();
            header("Location: admin_login.php");
        }
        if(isset($_SESSION['admin'])){
            $user=$_SESSION['admin'];
        }
        else{
            header("Location: admin_login.php");
        }
        ?>
    </head>
    <body>
        <div class="topnav">
            <div class="ab"> Admin</div>
            <div class="ab">Welcome <?php echo $user?> </div>
            <div class="a" onclick="logout()" style="cursor:pointer"> Log Out</div>
        </div>
        
        <div class="form">
            <center>
                <h1 style="margin-right:30px;">Add Products</h2>
            <form action="add_product.php" method="post" enctype="multipart/form-data" >
                <label><h4>Product Name:</h4></label>
                <input type="text" class="form-control" name="name"><br>
                <label><h4>Product Category:</h4></label>
                <input type="text" class="form-control" name="category"><br>
                <label><h4>Product Subcategory:</h4></label>
                <input type="text" class="form-control" name="sub"><br>
                <label><h4>Product Price:</h4></label>
                <input type="number" class="form-control" name="price" step="any"><br>
                <label><h4>Product Description:</h4></label>
                <textarea name="description" class="form-control" cols="23" rows="10" style="width:500px;"></textarea><br>
                <label><h4>Frequently bought:</h4></label>
                <input type="radio" name="freq" value="yes" style="padding:0px;margin:0px;width:10px;">Yes
                <input type="radio" name="freq" value="no" style="padding:0px;margin:0px;width:10px;">No<br><br>
                <label>Select product image to upload:</label><br><br>
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                <button name="submit" class="btn btn-primary" value="Add Product" name="submit">Add Product</button>
            </form><br>
           
            <?php
            
            if(isset($_POST["submit"])) {
                error_reporting(0);
                $name= $_POST['name'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $description=$_POST['description'];
                $target_dir = "uploads/";
                $sub = $_POST['sub'];
                $freq = $_POST['freq'];
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "<h6>File is an image - " . $check["mime"] . ".</h6>";
                    $uploadOk = 1;
                } 
                else {
                    echo "<h6>File is not an image.</h6>";
                    $uploadOk = 0;
                }
            
                if (file_exists($target_file) && $uploadOk!=0) {
                    echo "<h6>Sorry, file already exists or no file found.</h6>";
                    $uploadOk = 0;
                }
                if ($_FILES["fileToUpload"]["size"] > 500000 && $uploadOk!=0) {
                    echo "<h6>Sorry, your file is too large.</h6>";
                    $uploadOk = 0;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $uploadOk!=0) {
                    echo "<h6>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h6>";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    echo "<h6>Sorry, your file was not uploaded.</h6>";
                
                } 
                else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        
                        $result2=mysqli_query($conn,"INSERT INTO product(Product_Name, Category, Price, Description, Image_URL,freq,subcategory) values('$name','$category',$price,'$description','$target_file','$freq','$sub');")or die("Could not read table");
                        if($result2){
                            echo "<h6>The file has been uploaded.</h6>";
                        }
                        else{
                            echo "<h6>Sorry, there was an error uploading your file.</h6>";
                        }
                    } 
                    else {
                        echo "<h6>Sorry, there was an error uploading your file.</h6>";
                    }
                }
            }
            
        ?>
       <a href="admin_home.php" style="margin-top:40px;margin-right:40px;">Go back</a><br><br><br>
</center>
        </div>
        <script>
            function logout(){
                window.location.href="admin_home.php?logout=yes";
            }
        </script>
        
    </body>
</html>