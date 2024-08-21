<?php
session_start();

if (isset($_POST['submit'])) {
  $conn = mysqli_connect("localhost", "root", "", "customers");
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM customerdata WHERE email = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
      $_SESSION['user'] = $row['username'];
      header("Location: http://localhost/nursey/home.php");
      $_SESSION['status'] = "<you havae successfully logined.>";
      exit;
    } else {
      echo "<div class='alert alert-danger'>Invalid password</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>Invalid email</div>";
  }
}

if (isset($_POST['save'])) {
  $conn = mysqli_connect("localhost", "root", "", "customers");
  $user = $_POST['user'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  // Check if username exists
  $checkUsernameQuery = "SELECT * FROM customerdata WHERE LOWER(TRIM(username)) = LOWER(TRIM('$user'))";
  $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

  if (mysqli_num_rows($checkUsernameResult) > 0) {
    echo "<div class='alert alert-danger'>Username already exists</div>";
  } else {
    // Check if email exists
    $checkEmailQuery = "SELECT * FROM customerdata WHERE LOWER(TRIM(email)) = LOWER(TRIM('$email'))";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
      echo "<div class='alert alert-danger'>Email already exists</div>";
    } else {
      if ($password === $cpassword) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 

        $sqli = "INSERT INTO customerdata (username, email, password) VALUES ('$user', '$email', '$hashedPassword')";
        if (mysqli_query($conn, $sqli)) {
          echo "<div class='alert alert-success'>Hello $user, you have registered successfully</div>";
        } else {
          echo "Error: " . mysqli_error($conn);
        }
      } else {
        echo "<div class='alert alert-danger'>Passwords do not match</div>";
      }
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planto</title>
    <link rel="icon" type="image/x-icon" href="fevicon.png">
    <link href="font-awesome/css/fontawesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="header.css?v=1">
    <link rel="stylesheet" href="/css/all.min.css">
    <script src="jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

</head>
<body>
    <div class="main">
        <div class="header">
          <div class="icon">
            <img src="logo_thumbnail.png" class="logo" alt="icon">
          </div>
        
            <div class="menu-bar">
              <div class="navbar">
                <ul>
                    <li><a  id="navb" href="index.php"><i  class="fa-solid fa-house"></i> HOME</a></li>
                    <div class="subnav">
                    <li class="subnav-item"><a id="navb" href="index.php">PLANTS <i class="fa-solid fa-chevron-down"></i></a>
                      <div class="sub-menu-1">
                      <ul>
                        <li><a href="#section1"><i class="fa-solid fa-leaf"></i>   Air Plants</a></li>
                        <li><a href="#section2"><i class="fa-solid fa-leaf"></i>   Aquatic Plants</a></li>
                        <li><a href="#section3"><i class="fa-solid fa-leaf"></i>   Herb plants</a></li>
                        <li><a href="#section4"><i class="fa-solid fa-leaf"></i>   Fruit plants</a></li>
                        <li><a href="#section5"><i class="fa-solid fa-leaf"></i>   Flower plants</a></li>
                        <li><a href="#section6"><i class="fa-solid fa-leaf"></i>   Decoration plants</a></li>
                        <li><a href="#section7"><i class="fa-solid fa-leaf"></i>   Bonsai plants</a></li>
                      </ul>        
                    </li></div>
                    <li><a  id="navb" href="content.html">CONTENT</a></li>
                    <li><a id="navb" href="about.html">ABOUT</a></li>
                    <li><a id="navb" href="fedback.html">FEADBACK</a></li>
                    <div class="search-box">
                    <button class="btn-search"><i class="fas fa-search"></i></button>
                    <input type="text" class="input-search" id="inp" placeholder="Type to Search..">
                    </div>

                    <div class="login-btn">
                    <button id="form-open" class="btn-search" ><i class="fa-solid fa-user"></i>    Login</button>
                    </div>
                    <div class="login-cart">
                    <button class="btn-search cart1 add-to-cart" ><i class="fa-solid fa-cart-shopping"></i> cart</i></button>
                  </div>
                </ul>   
              </div>
            </div>  
          </div>
              <section class="home">
                <div class="form_container">
                  <i class="uil uil-times form_close"></i>
                  <!-- Login From -->
                    <div class="form login_form">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">   
                      <h2><i class="fa-solid fa-user"></i>  login</h2>  
                      <div class="input_box">
                        <input type="email" name="email" placeholder="Enter your email" class="form-control" required />
                        <i class="uil uil-envelope-alt email"></i>
                      </div>
                      <div class="input_box">
                        <input type="password" name="password" placeholder="Enter your password" class="form-control" minlength="4" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                      </div>
          
                      <div class="option_field">
                        <span class="checkbox">
                          <input type="checkbox" id="check" />
                          <label for="check">Remember me</label>
                        </span>
                        <a href="#" class="forgot_pw">Forgot password?</a>
                      </div>
          
                      <button class="button" name="submit" class="form-open btn btn-success" value="login" >Login Now</button>
          
                      <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
                    </form>
                  </div>                       
                <!-- Signup From -->
                <div class="form signup_form">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                      <h2><i class="fa-solid fa-user-plus"></i> Signup</h2>
                      <div class="input_box">
                        <input type="text" name="user" placeholder="Username" class="form-control" required />
                        <i class="uil uil-envelope-alt email"></i>
                      </div>
                      <div class="input_box">
                        <input type="email" name="email" placeholder="Enter your email" class="form-control" required />
                        <i class="uil uil-envelope-alt email"></i>
                      </div>
                      <div class="input_box">
                        <input type="password" name="password" placeholder="Create password" class="form-control" minlength="4" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                      </div>
                      <div class="input_box">
                        <input type="password" name="cpassword" placeholder="Confirm password" class="form-control" minlength="4" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                      </div>
          
                      <button class="button" name="save" class="form-open btn btn-success" value="Register">Signup Now</button>
          
                      <div class="login_signup">Already have an account? <a href="#" id="login" >Login</a></div>
                    </form>
                  </div>
                </div>
              </section>
              <script src="login.js"></script>                  

        <hr class="new">
        <br>
        <br>
          <div class="back">
          <h3 style="text-align: center;margin-left: 243px;margin-right: 258px;" class="shine1">
          "From our hands to your garden, we offer the finest selection of nursery plants for your botanical paradise."
          </h3>
        </div>
        <br>
        
        <section class="shop_container">
          <h2 class="section-title">Nursery plant shop</h2> 
          <br>
          <scan class="producth">TRENDING  PRODUCTS</scan> 
<form>
<div class="form-group">
<label for="ship-address" class="form-label">
<i class="fas fa-map-marker-alt"></i>
Deliver to*
</label>
<div class="input-wrapper">
<input  name="ship-address" class="ship-address" required   placeholder="Enter a location">
</div>
</div>
</form>


          <div class="inner-wrap content-wrap">
            <hr class="hr3">
            
          <div class="product-grid">
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant1.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Jasminum sambac, Mogra, Arabian Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹299 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant2.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Peace Lily, Spathiphyllum - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹169 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant3.jpg" alt="icon"class="product-img">
              <h6 class="tooltip">Miniature Rose, Button Rose (Any Color) - Plant <span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹299 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant4.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Parijat Tree, Parijatak, Night Flowering Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹359 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant5.jpg" alt="icon"class="product-img">
              <h6 class="tooltip">Damascus Rose, Scented Rose (Any Color) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹299 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant6.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Elephant bush, Portulacaria afra, Jade plant (Green) - Succulent Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹349 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant7.jpg" alt="icon" class="product-imgage">
              <h6 class="tooltip">Krishna Tulsi Plant, Holy Basil, Ocimum tenuiflorum (Black) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹259 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant8.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Raat Ki Rani, Raat Rani, Night Blooming Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹299 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant9.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Madhumalti Dwarf, Rangoon Creeper - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹369 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>   
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant10.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Piper Betel, Maghai Paan - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹311 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant11.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Lemon Grass - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹298 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant12.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Rosemary - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹249 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant13.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Syngonium (Pink) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹169 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant14.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Chlorophytum, Spider Plant - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹285 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant15.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Rose (Red) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹244 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant16.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">2 Layer Lucky Bamboo Plant in a Bowl with Pebbles<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹359 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant17.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Kunda, Downy Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹289 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant18.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Portulaca, 9 O Clock (Any Color) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹139 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant19.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Clitoria Ternatea, Gokarna (Blue) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹248 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant20.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Krishna Kamal, Passion flower, Passiflora incarnata (Purple) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹274 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant21.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Aloe vera - Succulent Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹260 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant22.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Areca Palm (Small) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹144 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant23.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Citronella, Odomas - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹255 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant24.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Curry Leaves, Kadi Patta, Murraya koenigii, Meetha Neem - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹274 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant25.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Money plant marble prince, Scindapsus n joy - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹180 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant26.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Kagzi Nimboo, Lemon Tree - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹512 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant27.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Hibiscus, Gudhal Flower (Red Double) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹232 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant28.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Curtain creeper, Vernonia creeper, Parda bel - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹301 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant29.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Creeping fig Plant, Ficus pumila - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹297 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant30.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Adenium Plant, Desert Rose (Grafted, Any Color) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹334 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant31.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Graptoveria opalina - Succulent Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹188 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant32.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Orange Fruit, Santra ( Grafted ) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹512 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant33.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Nephrolepis exaltata bosteniensis, Boston Fern - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹360 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant34.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Jade Bonsai - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1">₹2099 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            
              <p id="not-found" style="display: none;" class="not-found">No matching products found.</p>
              <script src="search.js"></script>
              <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                  <div class="modal-content">
                    <div class="modal-body">
                      <p class="text-center" style="color: tomato;">"Welcome to our online shop! Please login first to discover our wide range of products."</p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                    </div>
                  </div>
                </div>
              </div>
              <script>
              document.addEventListener("DOMContentLoaded", function() {
              var addToCartButtons = document.querySelectorAll(".add-to-cart");
              var modal = document.querySelector("#myModal");
              var body = document.querySelector("body");
              addToCartButtons.forEach(function(button) {
              button.addEventListener("click", function() {
              modal.style.display = "block";
              body.classList.add("modal-open");
              });
          });
            var okBtn = modal.querySelector(".btn-success");
            okBtn.addEventListener("click", function() {
            modal.style.display = "none";
            body.classList.remove("modal-open");
            });
          });
  </script>        
          </div>
        </div>
      </section> 
  <section class="shop_container" id="section1">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Air Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Air Plant, Tillandsia ionantha Guatemala (Large) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹359 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Ananas - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹664 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Zinn - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹1320 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Loving Touch - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹859 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant5.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Living Pearls - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹1009 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant6.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Air Plant, Tillandsia ionantha var. ionantha - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹359 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section>   
<section class="shop_container" id="section2">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Aquatic Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Lotus, Nelumbo Nucifera (Pink) - Plant<span class="tooltip-text">Images are for reference purposes only. Actual products may vary in shape or appearance based on climate, age, height, etc. The product is replaceable but not returnable.</span></h6>
                  </div> 
                  <p class="product-price1">₹878 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Water Lily, Nymphae Nouchali (Blue) - Plant<span class="tooltip-text">nouchali is a day-blooming non-viviparous plant with submerged roots and stems. Part of the leaves are submerged, while others rise slightly above the surface. The leaves are round and green on top; they usually have a darker underside.</span></h6>
                  </div> 
                  <p class="product-price1">₹304 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Water Canna, Thalia Dealbata - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹470 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Victoria lily - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹498 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant5.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Water Coleus indoor plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹480 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant6.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Philodendron<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹370<button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant7.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Peace Lily<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹740 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 
<section class="shop_container" id="section3">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Herb Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Mexican mint, Patharchur, Ajwain Leaves - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹230 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Thyme, Thymus vulgaris - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹260 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Badi Elaichi, Black Cardamom - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹411<button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Thai Basil, Ocimum thyrsiflora - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹208<button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant5.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Brahmi, Gotu Kola, Centella asiatica - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹300<button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant6.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Shatavari Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹466<button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant7.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Live Tulsi Herbal Live Plant | Tulsi Plant (Rama Tulsi & Krishna Tulsi) with Pots<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹201<button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 
<section class="shop_container" id="section4">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Fruit Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Kagzi Nimboo, Lemon Tree - Plant<span class="tooltip-text">Kagzi Lime is popular for its beautiful appearance and pleasing flavour and for its excellent food qualities.</span></h6>
                  </div> 
                  <p class="product-price1">₹505 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Nimboo, Lemon Tree - Plant<span class="tooltip-text">Growing Lemon plant is an easy way to add a tropical flair to your garden. When you know its unique health benefits, and how to care for Lemon plants, you will be rewarded with many years of lovely fruit.</span></h6>
                  </div> 
                  <p class="product-price1">₹399 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Pomegranate, Annar, Anar (Grafted) - Plant<span class="tooltip-text">Enjoy the delicious and nutritious watery, red arils of Pomegranate by growing easily at your home.</span></h6>
                  </div> 
                  <p class="product-price1">₹369 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Orange Fruit, Santra ( Grafted ) - Plant<span class="tooltip-text">Orange trees are widely grown in tropical and subtropical climates for their sweet fruit. The fruit of the orange tree can be eaten fresh, or processed for its juice or fragrant peel.</span></h6>
                  </div> 
                  <p class="product-price1">₹549 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant5.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Guava Tree, Amrud, Psidium guajava (Grown through seeds) - Plant<span class="tooltip-text">Enjoy the delicious and nutritious watery, red arils of Pomegranate by growing easily at your home.</span></h6>
                  </div> 
                  <p class="product-price1">₹232 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant6.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Mango Tree (Kesar, Grafted) - Plant<span class="tooltip-text">Mango Kesar smell is its most distinguishing feature, the colour of the pulp resembling saffron, the spice it is named after.</span></h6>
                  </div> 
                  <p class="product-price1">₹454 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant7.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Grape, Angoor (Seedless) - Plant<span class="tooltip-text">Mango Kesar smell is its most distinguishing feature, the colour of the pulp resembling saffron, the spice it is named after.</span></h6>
                  </div> 
                  <p class="product-price1">₹508 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant8.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Dragon Fruit - Plant<span class="tooltip-text">Mango Kesar smell is its most distinguishing feature, the colour of the pulp resembling saffron, the spice it is named after.</span></h6>
                  </div> 
                  <p class="product-price1">₹375 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 

<section class="shop_container" id="section5">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Flower Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Air Plant, Tillandsia ionantha Guatemala (Large) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹359 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Ananas - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹664 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Zinn - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹1320 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 
<section class="shop_container" id="section6">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Decoration Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Air Plant, Tillandsia ionantha Guatemala (Large) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹359 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Ananas - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹664 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Zinn - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹1320 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 
<section class="shop_container" id="section7">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Bonsai Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Air Plant, Tillandsia ionantha Guatemala (Large) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹359 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Ananas - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹664 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="tooltip">Zinn - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1">₹1320 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 


      <!--main-->
      <button onclick="topFunction()" id="top" title="Go to top">Top  <i class="fa-solid fa-arrow-up-from-bracket"></i></button>
            
      <script>
        let mybutton = document.getElementById("top");
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }

        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
        </script>
      <!--footer-->
      <div class="footer">
        <hr class="new1">
      <div class="row">
        <div class="column">
          <h2>Gardening Knowlege</h2>
          <p><a  href="https://www.skynursery.com/blog/" target="_blank">BLOG</a></p>
          <p><a  href="https://www.woodlandtrust.org.uk/blog/2018/04/why-plants-are-important/" target="_blank">IMPORTANCE</a></p>
          <p><a  href="https://whyfarmit.com/baby-nursery-plants/" target="_blank">TOP 20 Plants</a></p>
          <p><a  href="https://en.wikipedia.org/wiki/Plant_nursery" target="_blank">WIKIPEDIA</a></p>
          <p><a  href="content.html" target="_blank">CONTENT</a></p>
        </div>
        <div class="column">
          <h2>Useful Links</h2>
          <p><a href="index.php">HOMEPAGE</a></p>
          <p><a href="about.html" target="_blank">About us</a></p>
          <p><a href="index.php">HELP</a></p>
          <p><a href="fedback.html" target="_blank">FEADBACK</a></p>
          <p><a  class="add-to-cart">CART</a></p>
          <p><a href="privacy.html" target="_blank">POLICIES</a></p>
        </div>
        <div class="column">
          <h2>Follow us</h2>
          <P><button id="lof" class="lof1"><i class="fa-regular fa-user"></i> LOGIN</button></P>
          <P><a href="index.php"><i class="fa-brands fa-facebook"></i> FACEBOOK</a></P>
          <P><a href="index.php"><i class="fa-brands fa-twitter"></i> TWITTER</a></P>
          <p><a href="index.php"><i class="fa-brands fa-instagram"></i> INSTAGRAM</a></p>
          <p><a href="https://www.linkedin.com/in/koturwar-anupkumar-sheshrao-1b861a259/" target="_blank"><i class="fa-brands fa-linkedin"></i> LINKEDIN</a></p>
          <p><a href="#"><i class="fa-solid fa-phone"></i> 91 8999881962</a></p>
        </div>
      <script>
      const link = document.getElementById('lof');
      const button = document.getElementById('form-open');
  
        link.addEventListener('click', function(event) {
        event.preventDefault();
  
        button.click();
        });
        </script>
      
      <hr class="new1">
      <h2>© 2023 Planto Nursery. All rights reserved.</h2>
      <hr class="new1">
    </div>
    </div>
  </div> 
</body>
</html>