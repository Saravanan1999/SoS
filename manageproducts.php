<!DOCTYPE html>
<html>
    <?php 
        include 'db_conn.php';
        if(isset($_GET['rem'])){
            $sql = "Delete from `product` where `Product_ID`='".$_GET['rem']."';";
            if($conn->query($sql) == TRUE or die(mysqli_error($conn))){
                echo "<script>alert('Product Id:".$_GET['rem']." deleted.')</script>";
                
            }
            
        }
        if(isset($_POST['submit'])){
            $val = $_POST['value'];
            $sql = "Update `product` set `Product_Name`='".$val."' where `Product_ID`=".$_COOKIE['key'].";";
            if ($conn->query($sql) == TRUE or die(mysqli_error($conn))) {
                echo "<script>alert('Updated Successfully')</script>";
                unset($_POST['submit']);
            }
        }
        if(isset($_POST['submitdes'])){
            $val = $_POST['des'];
            $sql = "Update `product` set `Description`='".$val."' where `Product_ID`=".$_COOKIE['key'].";";
            if ($conn->query($sql) == TRUE or die(mysqli_error($conn))) {
                echo "<script>alert('Updated Successfully')</script>";
                unset($_POST['submitdes']);
            }
        }
        if(isset($_POST['submitprice'])){
            $val = $_POST['price'];
            $sql = "Update `product` set `Price`='".$val."' where `Product_ID`=".$_COOKIE['key'].";";
            if ($conn->query($sql) == TRUE or die(mysqli_error($conn))) {
                echo "<script>alert('Updated Successfully')</script>";
                unset($_POST['submitprice']);
            }
        }
        if(isset($_POST['submitfreq'])){
            $val = $_POST['freq'];
            $sql = "Update `product` set `freq`='".$val."' where `Product_ID`=".$_COOKIE['key'].";";
            if ($conn->query($sql) == TRUE or die(mysqli_error($conn))) {
                echo "<script>alert('Updated Successfully')</script>";
                unset($_POST['submitfreq']);
            }
        }
        if(isset($_POST['submitcat'])){
            $val = $_POST['cat'];
            $sql = "Update `product` set `category`='".$val."' where `Product_ID`=".$_COOKIE['key'].";";
            if ($conn->query($sql) == TRUE or die(mysqli_error($conn))) {
                echo "<script>alert('Updated Successfully')</script>";
                unset($_POST['submitcat']);
            }
        }
        if(isset($_POST['submitsub'])){
            $val = $_POST['sub'];
            $sql = "Update `product` set `subcategory`='".$val."' where `Product_ID`=".$_COOKIE['key'].";";
            if ($conn->query($sql) == TRUE or die(mysqli_error($conn))) {
                echo "<script>alert('Updated Successfully')</script>";
                unset($_POST['submitsub']);
            }
        }
    ?>
    
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="assets/style/admin_login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <style>
            table{
                box-shadow: 8px 8px 16px 4px #9E9E9E;
            }
            tr{
                text-align:center;
            }
            thead{
                background-color:black;
                color:white;
            }
            i{
                cursor: pointer;
            }
            a{
                text-decoration:none;
                color:white;
            }
            a:hover{
                color:orange;
            }
            
        </style>
    </head>
    <body>
        <div class="topnav" >
            <div class="ab" style='margin-right:1100px;'><a  href="admin_home.php"> Admin</a></div>
            
            <div class="ab">Welcome <?php echo $user?> </div>
            
            
            <div class="a" onclick="logout()" style="cursor:pointer"> Log Out</div>
        </div>
        <center><h1 style="padding-top:50px;">List of Products at <em>"Shades of Spade"<em></h1>
        <br><br><br>
        <?php 
            $result=mysqli_query($conn,"SELECT * FROM `product`") or die("Failed to query database".mysqli_error($conn));
            if ($result->num_rows > 0) {
                
        ?>
            <table class="table table-hover" style="width:80%;" >
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Sub-category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image_URL</th>
                        <th>Frequently Bought</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $count=0;
                    while($row1 = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row1['Product_ID']."</td>";
                        echo  "<td>".$row1['Product_Name']."<br><i class='fa fa-pencil' onclick='modename(".$row1['Product_ID'].")' aria-hidden='true'></i></td>";
                        echo "<td>".$row1['Category']."<br><i class='fa fa-pencil' onclick='modecat(".$row1['Product_ID'].")' aria-hidden='true'></i></td>";
                        echo "<td>".$row1['subcategory']."<br><i class='fa fa-pencil' onclick='modesub(".$row1['Product_ID'].")'aria-hidden='true'></i></td>";
                        echo "<td>₹".$row1['Price']."<br><i class='fa fa-pencil' onclick='modeprice(".$row1['Product_ID'].")'aria-hidden='true'></i></td>";
                        echo "<td>".$row1['Description']."<br><i class='fa fa-pencil' onclick='modedes(".$row1['Product_ID'].")' aria-hidden='true'></i></td>";
                        echo "<td>".$row1['Image_URL']."<br></td>";
                        echo "<td>".$row1['freq']."<br><i class='fa fa-pencil' onclick='modefreq(".$row1['Product_ID'].")' aria-hidden='true'></i></td>";
                        echo "<td><button class='btn btn-danger' onclick=rem(".$row1['Product_ID'].")>Remove</button></td>";
                        echo "</tr>";
                        $count+=1;
                    }
                ?>
                    
                </tbody>
            </table>
        <?php
                    
            }
        ?>
        

        <!-- The Modal -->
        <div id="Modalname" class="modalname">

        <!-- Modal content -->
            <div class="modal-content">
            
                <span class="close">&times;</span>
                <h3>Enter Value to change to</h3><br>
                <center>
                <form action="#" method="Post">
                    <input type="text" class='form-control' name="value" style='width:200px;margin-left:100px;' required><br>
                    <input type="submit" class='btn btn-primary' style='width:200px;margin-left:100px;' name="submit">
                </form>
                
                </center>
            </div>
        </div>
        <div id="Modalprice" class="modalprice">

        <!-- Modal content -->
            <div class="modal-content">
            
                <span class="close">&times;</span>
                <h3>Enter Value to change to</h3><br>
                <center>
                <form action="#" method="Post">
                    <input type="text" class='form-control' name="price" pattern="[0-9]*" style='width:200px;margin-left:100px;' required><br>
                    <input type="submit" class='btn btn-primary' style='width:200px;margin-left:100px;' name="submitprice">
                </form>
                
                </center>
            </div>
        </div>
        <div id="textareaModal" class="modaltext">
            <div class="modal-content">
            
                <span class="close" onclick='closetext()'>&times;</span>
                <h3>Enter Value to change to</h3><br>
                <center>
                <form action="#" method="Post">
                    <textarea class='form-control' name='des' required> </textarea><br>
                    <input type="submit" class='btn btn-primary' style='width:200px;margin-left:100px;' name="submitdes">
                </form>
            </center>
            </div>
        </div>
        <div id="Modalfreq" class="modalfreq">

        <!-- Modal content -->
            <div class="modal-content">
            
                <span class="close">&times;</span>
                <h3>Click yes or no</h3><br>
                <center>
                <form action="#" method="Post">
                    <input type="radio" name="freq" value='yes' style='width:20px;margin-left:80px' required>yes <input type='radio' style='width:20px;' name='freq' value='no' required> no<br><br>
                    <input type="submit" class='btn btn-primary' style='width:200px;margin-left:100px;' name="submitfreq">
                </form>
                
                </center>
            </div>
        </div>
        <div id="Modalcat" class="modalcat">

        <!-- Modal content -->
            <div class="modal-content">
            
                <span class="close">&times;</span>
                <h3>Choose the Category:</h3><br>
                <center>
                <form action="#" method="Post">
                    <select class='form-select' name="cat">
                        <option value="Seeds">Seeds</option>
                        <option value="Fertilizers">Fertilizers</option>
                        <option value="Pesticides">Pesticides</option>
                        <option value="Machinery and Tools">Machinery and Tools</option>
                        <option value="Others">Others</option>
                    </select><br>
                    <input type="submit" class='btn btn-primary' style='width:200px;margin-left:100px;' name="submitcat">
                </form>
                
                </center>
            </div>
        </div>
        <div id="Modalsub" class="modalsub">

        <!-- Modal content -->
            <div class="modal-content">
            
                <span class="close">&times;</span>
                <h3>Enter Value to change to</h3><br>
                <center>
                <form action="#" method="Post">
                    <input type="text" class='form-control' name="sub" style='width:200px;margin-left:100px;' required><br>
                    <input type="submit" class='btn btn-primary' style='width:200px;margin-left:100px;' name="submitsub">
                </form>
                
                </center>
            </div>
        </div>
        <script>
            var modalname = document.getElementById("Modalname");
            var modaltext = document.getElementById("textareaModal");
            var modalprice = document.getElementById("Modalprice");
            var modalfreq= document.getElementById("Modalfreq");
            var modalsub= document.getElementById("Modalsub");
            var modalcat= document.getElementById("Modalcat");
            var spanname = document.getElementsByClassName("close")[0];
            var spandes = document.getElementsByClassName("close")[2];
            
            var spanprice = document.getElementsByClassName("close")[1];
            var spanfreq = document.getElementsByClassName("close")[3];
            var spancat = document.getElementsByClassName("close")[4];
            var spansub = document.getElementsByClassName("close")[5];
            spanfreq.onclick = function() {
                modalname.style.display = "none";
            }
            spansub.onclick = function() {
                modalsub.style.display = "none";
            }
            spancat.onclick = function() {
                modalcat.style.display = "none";
            }
            spanname.onclick = function() {
                modalname.style.display = "none";
            }
            spanprice.onclick = function() {
                modalprice.style.display = "none";
            }
            
            function closetext() {
                modaltext.style.display = "none";
            }
            function modename(id){
                modalname.style.display = "block";
                document.cookie = "key="+id;
            }
            function modecat(id){
                modalcat.style.display = "block";
                document.cookie = "key="+id;
            }
            function modefreq(id){
                modalfreq.style.display = "block";
                document.cookie = "key="+id;
            }
            function modedes(){
                modaltext.style.display = "block";
                document.cookie = "key="+id;
            }
            function modeprice(){
                modalprice.style.display = "block";
                document.cookie = "key="+id;
            }
            function modesub(){
                modalsub.style.display = "block";
                document.cookie = "key="+id;
            }
            function rem(num){
                if(confirm("Deleting Product ID:"+num+" Please press 'Yes' to continue or 'Cancel' to not delete the product")){
                    window.location.href="manageproducts.php?rem="+num;
                }
            }
            function logout(){
                window.location.href="admin_home.php?logout=yes";
            }
        </script>
        <a href="admin_home.php" style="margin-top:40px;margin-right:40px;">Go back</a><br><br><br>
    </body>
</html>