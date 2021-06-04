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
        <style>
            .cart {
                background-color: #fff;
                padding: 4vh 5vh;
                border-bottom-left-radius: 1rem;
                border-top-left-radius: 1rem
            }

            @media(max-width:767px) {
                .cart {
                    padding: 4vh;
                    border-bottom-left-radius: unset;
                    border-top-right-radius: 1rem
                }
            }

            .summary {
                background-color: #ddd;
                border-top-right-radius: 1rem;
                border-bottom-right-radius: 1rem;
                padding: 4vh;
                color: rgb(65, 65, 65)
            }

            @media(max-width:767px) {
                .summary {
                    border-top-right-radius: unset;
                    border-bottom-left-radius: 1rem
                }
            }

            .summary .col-2 {
                padding: 0
            }

            .summary .col-10 {
                padding: 0
            }

            .row {
                margin: 0
            }

            .title b {
                font-size: 1.5rem
            }

            .main {
                margin: 0;
                padding: 2vh 0;
                width: 100%
            }

            .col-2,
            .col {
                padding: 0 1vh
            }

            a {
                padding: 0 1vh
            }

            .close {
                margin-left: auto;
                font-size: 0.7rem
            }

            img {
                width: 3.5rem
            }

            .back-to-shop {
                margin-top: 4.5rem
            }

            h5 {
                margin-top: 4vh
            }

            hr {
                margin-top: 1.25rem
            }

            form {
                padding: 2vh 0
            }

            select {
                border: 1px solid rgba(0, 0, 0, 0.137);
                padding: 1.5vh 1vh;
                margin-bottom: 4vh;
                outline: none;
                width: 100%;
                background-color: rgb(247, 247, 247)
            }

            input {
                border: 1px solid rgba(0, 0, 0, 0.137);
                padding: 1vh;
                margin-bottom: 4vh;
                outline: none;
                width: 100%;
                background-color: rgb(247, 247, 247)
            }

            input:focus::-webkit-input-placeholder {
                color: transparent
            }

            .btn {
                background-color: #000;
                border-color: #000;
                color: white;
                width: 100%;
                font-size: 0.7rem;
                margin-top: 4vh;
                padding: 1vh;
                border-radius: 0
            }
            a{
                color:white;
                text-decoration:none;
            }
            a:hover{
                color:orange;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <div class="ab" style="margin-right:1000px;"><a  href="admin_home.php"> Admin</a></div>
            <div class="ab">Welcome <?php echo $user?> </div>
            <div class="a" onclick="logout()" style="cursor:pointer"> Log Out</div>
        </div><br>
        <center><h3>List of Orders:</h3></center>
        <?php
           
            $sql0 = "SELECT * FROM `orders`;";
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
                                    <h4><b>Order Id:<?php echo $row0['Orderid']." from ".$row0['Username'] ?></b></h4>
                                    
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
                                        //echo "<div class='row text-muted'>".$row0['Username']."</div>";
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
                        
                    </div>
                    
                    <div class="col-md-4 summary">
                        
                                <div>
                                    <h5><b>Summary</b></h5>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col" style="padding-left:7px;margin-left:0;">Items <?php echo $quant; ?></div>
                                    <div class="col text-right" style='padding-left:8px;'>&#8377;<?php echo $row0['total']-$row0['Shippingcost'] ?></div>
                                </div><br>
                                <div class='row'>
                                <div class='col'><b><u>SHIPPING</u></b></div>
                                </div>
                                <div class='row'>
                                <?php 
                                    if($row0['Shippingcost']=="50"){
                                        echo "<div class='col'>Standard-Delivery</div>";
                                        echo "<div class='col text-right'>&#8377;50</div><br>";
                                    }
                                    else{
                                       echo "<div class='col'>Express-Delivery</div>";
                                       echo "<div class='col text-right'>&#8377;100</div><br>";
                                    }
                                    
                                 ?>   
                                
                                </div><br>
                                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">TOTAL PRICE</div>
                               
                                <div class="col text-right" id="tot">&#8377;<?php echo $row0['total']?></div>   
                            </div>
                            <hr>
                            <div class="row">
                                    <div class='col'>Username:</div>
                                    <div class='col text-right'><?php echo $row0['Username'] ?> </div>
                            </div><br>
                            <div class="row">
                                    <div class='col'>Name:</div>
                                    <div class='col text-right'><?php echo $row0['name'] ?> </div>
                            </div><br>
                            <div class="row">
                                    <div class='col'>Address:</div>
                                    <div class='col text-right'><?php echo $row0['Address'] ?> </div>
                            </div><br>
                            <div class="row">
                                    <div class='col'>City:</div>
                                    <div class='col text-right'><?php echo $row0['City'] ?> </div>
                            </div><br>
                            <div class="row">
                                    <div class='col'>State:</div>
                                    <div class='col text-right'><?php echo $row0['State'] ?> </div>
                            </div><br>
                            <div class="row">
                                    <div class='col'>Country:</div>
                                    <div class='col text-right'><?php echo $row0['Country'] ?> </div>
                            </div><br>
                            <div class="row">
                                    <div class='col'>Contact:</div>
                                    <div class='col text-right'><?php echo $row0['Phone'] ?> </div>
                            </div>
        </div>
                                </div>
                                </div>
        <?php 
            $count+=1;
            }
        ?>
        
    </main>
    <script>
            function logout(){
                window.location.href="admin_home.php?logout=yes";
            }
    </script>
    </body>
</html>