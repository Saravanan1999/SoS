<html>
    <head>
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
        <link rel="stylesheet" type="text/css" href="assets/style/login.css"> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <style>
            .abc{
                color:black;
            }
            .abc:hover{
                
                color:lawngreen;
            }
            .dropdown-menu{
                top:55px;
                z-index: 99; 
                
            }
        </style>
        <style>
            form a{
                color:black;
                text-decoration:none;
            }
        </style>
    </head>
    <body>
    
        <div class="cover">
            
        </div>
        <nav>
        
            <a href="index.php" ><img src="assets/images/logo.jpg" style="height:80px;width:140px"></a>
            <input type="search" placeholder="Enter product" id='search'><button type="submit" onclick='search()'><i class="fa fa-search"></i></button>
            <a href="index.php">Home</a>
            <a href="index.php#about">About</a>
            <a href="product_page.php?query=All&min=0&max=5000">Products</a>
            <a href="contact.php"><u>Contact</u></a>
            
            
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
                        //echo "<button class='item-detail' style='background-color:red;width:20px;' >Remove<i class='fa fa-remove'></i></button>";
                        echo "</li>";
                    }
                    
                ?>
               
                    
                
               
                </ul>

                <a href="shopping_cart.php" class="button">Checkout <i class="fa fa-chevron-right"></i></a>
            </div> <!--end shopping-cart -->
            </div><br><br>
            <div class="container">
		<div class="innerwrap">
		
			<section class="section1 clearfix">
				<div class="textcenter">
					
					
					<h1>Contact Us</h1>
				</div>
			</section>
		
			<section class="section2 clearfix">
				<div class="col2 column1 first">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.0016964237752!2d79.15722245033282!3d12.971742990810974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bad479f0ccbe067%3A0xfef222e5f36ecdeb!2sVellore%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1622349334338!5m2!1sen!2sin" width="100%" height="550" style="border:0;overflow:hidden;" allowfullscreen="" loading="lazy"></iframe>
					
				</div>
				<div class="col2 column2 last">
					<div class="sec2innercont">
						<div class="sec2addr">
							<p><span class="collig">Address :</span> Tiruvalam Rd, Katpadi, Vellore, Tamil Nadu 632014</p>
							<p><span class="collig">Phone : </span> +918888888888</p>
							<p><span class="collig">Email :</span> support@sos.com</p>
						</div>
					</div>
					<div class="sec2contactform">
						<h3 class="sec2frmtitle">Drop Us a Message</h3>
						<form action="#" method="post">
							<div class="clearfix">
								<input class="col2 first" type="text" name="firstname" placeholder="FirstName" required>
								<input class="col2 last" type="text" name="lastname" placeholder="LastName" required>
							</div>
							<div class="clearfix">
								<input  class="col2 first" type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" style="border: 0;height:40px;font-family: sans-serif;margin: 7px 0; background: #EDEDED;" required>
								<input class="col2 last" type="text" name="phone" placeholder="Contact Number"  minlength="9" maxlength="15" pattern="^[0-9]{9,15}$" required>
							</div>
							<div class="clearfix">
								<textarea name="message"  maxlength="65535" cols="30" rows="7" Placeholder="Your message here..."  required></textarea>
							</div>
							<div class="clearfix"><input type="submit" name="submit" value="Send"></div>
						</form>
                        <?php
                            if(isset($_POST['submit'])){
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $message = htmlspecialchars($_POST['message']);
                                $sql = "INSERT INTO `feedback`(`firstname`, `lastname`, `email`, `phone`, `message`) VALUES ('$firstname','$lastname','$email','$phone','$message')";
                                
                                if ($conn->query($sql) == TRUE or die(mysqli_error($conn))) {
                                    echo "<h3>Feedback sent successfully!!</h3>";
                                }
                                else{
                                    echo "<h3>Feedback was not sent successfully!!</h3>";
                                }

                            }
                        ?>
					</div>

				</div>
			</section>
		
		</div>
	</div>      

            <br><br>
            
            
            
            
            
            <?php include 'footer.php' ?>
    <!--<embed type="text/html" src="footer.html" style="width:100%;height:340px">-->
    <script>
        function search(){
            var key = document.getElementById("search").value;
            window.location.href="product_page.php?search="+key;
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