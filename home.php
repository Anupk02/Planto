<?php
session_start();

if (isset($_SESSION['status'])) {
    echo "<script>alert('thanks for login.')</script>";

    unset($_SESSION['status']);
}

if (!isset($_SESSION['user'])) {
  header("Location: http://localhost/nursey/index.php");
  exit;
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script>
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
                    <li><a  id="navb" href="home.php"><i  class="fa-solid fa-house"></i> HOME</a></li>
                    <div class="subnav">
                    <li class="subnav-item"><a id="navb" href="home.php">PLANTS <i class="fa-solid fa-chevron-down"></i></a>
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
                    <li><a  id="navb" href="content.html" target="_blank">CONTENT</a></li>
                    <li><a id="navb" href="about.html" target="_blank">ABOUT</a></li>
                    <li><a id="navb" href="fedback.html" target="_blank">FEADBACK</a></li>
                    <div class="search-box">
                    <button class="btn-search"><i class="fas fa-search"></i></button>
                    <input type="text" class="input-search" id="inp" placeholder="Type to Search..">
                    </div>
                    <div class="Admin-btn">
                    <a href="" class="btn-search" style="color:green;margin-right:30px;gap:5px;"><i class="fa-solid fa-user"></i>  <?php echo $_SESSION['user'] ?></a>
                    </div>
                    <div class="login-btn">
                    <a href="logout.php" onclick="return confirm('Are You sure you want to logout?');"><button  class="btn-search"><i class="fa-solid fa-sign-out"></i> Logout</button></bytton></a>
                    </div>
                    <div class="login-cart">
                    <button class="btn-search cart1"  id="cart-icon"><i class="fa-solid fa-cart-shopping"></i> cart</i></button>
                  </div>
                  <div class="cart">
                    <h2 class="cart-title">Your cart</h2>
                    <div class="cart-content">
                    </div>
                    <div class="total">
                      <div class="total-title">Total</div>
                      <div class="total-price">₹0</div>
                    </div>
                    <button type="button" class="btn-buy">Buy Now</button>
                    <i class="fa-solid fa-xmark" id="close-cart"></i>
                    <script src="cart.js"></script>
                  </div>
                </ul>   
              </div>
            </div>  
          </div>
        <hr class="new">
        
        <br>
        <br>
        <div class="back">
          <h3 style="text-align: center;margin-left: 243px; margin-right: 258px;">
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
              <h6 class="product-title tooltip">Jasminum sambac, Mogra, Arabian Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹299</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant2.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Peace Lily, Spathiphyllum - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹169</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant3.jpg" alt="icon"class="product-img">
              <h6 class="product-title tooltip">Miniature Rose, Button Rose (Any Color) - Plant <span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹299</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant4.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Parijat Tree, Parijatak, Night Flowering Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹359</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant5.jpg" alt="icon"class="product-img">
              <h6 class="product-title tooltip">Damascus Rose, Scented Rose (Any Color) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹299</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant6.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Elephant bush, Portulacaria afra, Jade plant (Green) - Succulent Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹349</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant7.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Krishna Tulsi Plant, Holy Basil, Ocimum tenuiflorum (Black) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹259</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant8.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Raat Ki Rani, Raat Rani, Night Blooming Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹299</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant9.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Madhumalti Dwarf, Rangoon Creeper - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹369</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>   
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant10.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Piper Betel, Maghai Paan - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹311</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant11.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Lemon Grass - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹298</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant12.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Rosemary - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹249</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant13.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Syngonium (Pink) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹169</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant14.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Chlorophytum, Spider Plant - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹285</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant15.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Rose (Red) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹244</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant16.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">2 Layer Lucky Bamboo Plant in a Bowl with Pebbles<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹359</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant17.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Kunda, Downy Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹289</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant18.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Portulaca, 9 O Clock (Any Color) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹139</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant19.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Clitoria Ternatea, Gokarna (Blue) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹248</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant20.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Krishna Kamal, Passion flower, Passiflora incarnata (Purple) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹274</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant21.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Aloe vera - Succulent Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹260</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant22.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Areca Palm (Small) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹144</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant23.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Citronella, Odomas - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹255</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant24.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Curry Leaves, Kadi Patta, Murraya koenigii, Meetha Neem - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹274</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant25.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Money plant marble prince, Scindapsus n joy - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹180</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant26.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Kagzi Nimboo, Lemon Tree - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹512</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant27.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Hibiscus, Gudhal Flower (Red Double) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹232</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant28.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Curtain creeper, Vernonia creeper, Parda bel - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹301</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant29.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Creeping fig Plant, Ficus pumila - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹297</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant30.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Adenium Plant, Desert Rose (Grafted, Any Color) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹334</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant31.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Graptoveria opalina - Succulent Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹188</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant32.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Orange Fruit, Santra ( Grafted ) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹512</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant33.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Nephrolepis exaltata bosteniensis, Boston Fern - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹360</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant34.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Jade Bonsai - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹2099</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            
              <p id="not-found" style="display: none;" class="not-found">No matching products found.</p>
              <script src="search.js"></script>
              <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="icon-box">
                        <i class="fa-solid fa-check"></i>
                      </div>				
                      <h4 class="modal-title w-100">Thank you!</h4>	
                    </div>
                    <div class="modal-body">
                      <p class="text-center">Your product has been added to the cart.</p>
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
                  <h6 class="product-title tooltip">Air Plant, Tillandsia ionantha Guatemala (Large) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹359</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Ananas - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹664</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Zinn - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹132</scan>0 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
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
          <p><a href="home.php">HOMEPAGE</a></p>
          <p><a href="about.html" target="_blank">About us</a></p>
          <p><a href="home.php">HELP</a></p>
          <p><a href="fedback.html" target="_blank">FEADBACK</a></p>
          <P><button id="cart3" class="lof1"><i class="fa-solid fa-cart-shopping"></i> Cart</button></P>
          <p><a href="privacy.html" target="_blank">POLICIES</a></p>
        </div>
        <div class="column">
          <h2>Follow us</h2>
          <P><a href="home.php"><i class="fa-brands fa-facebook"></i> FACEBOOK</a></P>
          <P><a href="home.php"><i class="fa-brands fa-twitter"></i> TWITTER</a></P>
          <p><a href="home.php"><i class="fa-brands fa-instagram"></i> INSTAGRAM</a></p>
          <p><a href="https://www.linkedin.com/in/koturwar-anupkumar-sheshrao-1b861a259/" target="_blank"><i class="fa-brands fa-linkedin"></i> LINKEDIN</a></p>
          <p><a href=""><i class="fa-solid fa-phone"></i> 91 8999881962</a></p>
        </div>
      <script>
      const link = document.getElementById('cart3');
      const button = document.getElementById('cart-icon');
  
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