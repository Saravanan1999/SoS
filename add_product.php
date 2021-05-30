<!DOCTYPE html>
<html>
    <?php include 'db_conn.php'?>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="assets/style/admin_login.css">
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
        <div class="nav2">Add Product</div>
        <div class="form">
            <center>
            <form action="add_product.php" method="post" enctype="multipart/form-data" style="border:1px solid black;">
                <label>Product Name:</label><br><br>
                <input type="text" name="name"><br><br>
                <label>Product Category:</label><br><br>
                <input type="text" name="category"><br><br>
                <label>Product Subcategory:</label><br><br>
                <input type="text" name="sub"><br><br>
                <label>Product Price:</label><br><br>
                <input type="number" name="price" step="any"><br><br>
                <label>Product Description:</label><br><br>
                <textarea name="description" cols="32" rows="10"></textarea><br><br>
                <label>Frequently bought:</label>
                <input type="radio" name="freq" value="yes" style="padding:0px;margin:0px;width:10px;">Yes
                <input type="radio" name="freq" value="no" style="padding:0px;margin:0px;width:10px;">No<br><br>
                <label>Select product image to upload:</label><br><br>
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                <button name="submit" value="Add Product" name="submit">Add Product</button>
            </form>
            <?php
            
            if(isset($_POST["submit"])) {
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
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                
                } 
                else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        
                        $result2=mysqli_query($conn,"INSERT INTO product(Product_Name, Category, Price, Description, Image_URL,freq,subcategory) values('$name','$category',$price,'$description','$target_file','$freq','$sub');")or die("Could not read table");
                        if($result2){
                            echo "The file has been uploaded.";
                        }
                        else{
                            echo "Sorry, there was an error uploading your file.";
                        }
                    } 
                    else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }

        ?>
</center>
        </div>
        <script>
            function logout(){
                window.location.href="admin_home.php?logout=yes";
            }
        </script>
        
    </body>
</html>