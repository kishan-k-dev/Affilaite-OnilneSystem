
<?php
  include ('./includes/connect.php');

 include('functions/common_function.php');
  
 getcategories();

 session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["myHiddenButton"])) {
  // Split the combined values
  // list($product_id, $brand_id) = explode(",", $_POST["myHiddenButton"]);
  $values_after_submission = $_POST["myHiddenButton"];
    $get_ip_add = getIPAddress();
  
  // Insert into the database
  $insert_query = "INSERT INTO click_products (user_ip, product_id) VALUES ('$get_ip_add', '$values_after_submission')";
  $result = mysqli_query($con, $insert_query);

  if ($result) {
      echo "Data inserted successfully!";

      // Redirect to the affiliate link
      header("Location: " . $_POST['affiliate_link']);
      exit();
  } else {
      echo "Error inserting data: " . mysqli_error($con);
      exit(); // Stop further execution
  }
}

 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hiddin_banner"])) {
  // Split the combined values
  // list($product_id, $brand_id) = explode(",", $_POST["myHiddenButton"]);
  $values_after_submissions = $_POST["hiddin_banner"];
    $get_ip_add = getIPAddress();
  
  // Insert into the database
  $insert_query = "INSERT INTO click_banners (user_ip, banner_id) VALUES ('$get_ip_add', '$values_after_submissions')";
  $result = mysqli_query($con, $insert_query);

  if ($result) {
      echo "Data inserted successfully!";

      // Redirect to the affiliate link
      header("Location: " . $_POST['affiliate_link']);
      exit();
  } else {
      echo "Error inserting data: " . mysqli_error($con);
      exit(); // Stop further execution
  }
}

//  $brandId = isset($_SESSION['brandId']) ? $_SESSION['brandId'] : 'Not available';


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cashback.com</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/head1.jpgk" type="image/x-icon">

  <!--
    - custom css link
  -->
  <!-- <link rel="stylesheet" href="./assets/css/style-prefix.css"> -->
<link rel="stylesheet" href="./assets\css\style.css">
  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/thinline.css">

     <!-- Include jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <!-- Include Select2 CSS and JS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
          

    <!-- categoty pluse and minuse -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<style>
        .accordion-content header .title-link,
    .accordion-content .description .description-link {
        text-decoration: none; /* Remove default underline for the anchor */
        color: #333; /* Set the color for the anchor text */
        transition: color 0.2s linear; /* Add transition effect for color change */
    }

    .accordion-content header .title-link:hover,
    .accordion-content .description .description-link:hover {
        color: #007bff; /* Change color on hover */
    }

    .description-link{
        padding: 3px;
    }
    
    .accordion {
            max-width: 430px;
            width: 100%;
            margin: 5px 0px;
            padding: 15px;
            /* border-radius: 8px; */
        }

        .accordion .accordion-content {
            margin: -25px ;
            /* border-radius: 4px; */
            overflow: hidden;
        }

        .accordion-content.open {
            padding-bottom: 7px;
            padding-top: 10px;
        
        }

        .accordion-content header {
            display: flex;
            min-height: 40px;
            padding: 10px 15px;
            cursor: pointer;
            align-items: center;
            justify-content: space-between;
            transition: all 0.2s linear;

        }


        .accordion-content.open header {
            min-height: 30px;
            /* border-bottom:1px solid black; */
            padding: 2px 15px; 

        }

        .accordion-content header .title {
            font-size: 19px;
            font-weight: 500;
            color: #333;
            border-bottom: none;


        }

        .accordion-content header i {
            font-size: 15px;
            color: #333;
        }

        .accordion-content .description {
            margin-top: 1px;
            margin-bottom: 2px;
            margin-left: 7px;
            height: 0;
            font-size: 15px;
            color: #333;
            font-weight: 400;
            padding: 0px 10px;
            transition: all 0.2s linear;
        }
/* ===================================== */

        /*-----------------------------------*\
  #PRODUCT GRID
\*-----------------------------------*/

.product-main {  margin-bottom: 30px; }

.product-grid {
 width:980px;
 display: grid;
  gap: 25px;
}


.product-grid .showcase {
  border: 1px solid hsl(0, 0%, 93%);
  border-radius: 10px;
  overflow: hidden;
  transition: 0.2s ease;
}

.product-grid .showcase:hover { box-shadow: 0 0 10px hsla(0, 0%, 0%, 0.1); }

.product-grid .showcase-banner { position: relative; }

.product-grid .product-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: 0.2s ease;
}

.product-grid .product-img.default {
  position: relative;
  z-index: 1;
}

.product-grid .product-img.hover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 2;
  opacity: 0;
}

.product-grid .showcase:hover .product-img.hover { opacity: 1; }

.product-grid .showcase:hover .product-img.default { opacity: 0; }

.product-grid .showcase:hover .product-img { transform: scale(1.1); }

.product-grid .showcase-badge {
  position: absolute;
  top: 15px;
  left: 15px;
  background: hsl(0, 0%, 47%);
  font-size: 0.813rem;
  font-weight: 500;
  color: hsl(0, 100%, 100%);
  padding: 0 8px;
  border-radius: var(--border-radius-sm);
  z-index: 3;
}

.product-grid .showcase-badge.angle {
  top: 8px;
  left: -29px;
  transform: rotate(-45deg);
  text-transform: uppercase;
  font-size: 11px;
  padding: 5px 40px;
}

.product-grid .showcase-badge.black { background:hsl(0, 0%, 13%); }

.product-grid .showcase-badge.pink { background: hsl(0, 0%, 47%); }

/* .product-grid .showcase-actions {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  transform: translateX(50px);
  transition: 0.2s ease;
  z-index: 3;
}  */

 .product-grid .showcase:hover .showcase-actions { transform: translateX(0); }
/* 
.product-grid .btn-action {
  background: hsl(0, 100%, 100%);
  color: hsl(0, 0%, 47%);
  margin-bottom: 5px;
  border: 1px solid hsl(0, 0%, 93%);
  padding: 5px;
  border-radius: 5px;
  transition: 0.2s ease;
} */

/* .product-grid .btn-action:hover {
  background: hsl(0, 0%, 13%);
  color: hsl(0, 100%, 100%);
  border-color: hsl(0, 0%, 13%);
} */

.product-grid .showcase-content { padding: 15px 20px 0; }

.product-grid .showcase-category {
  color: hsl(353, 100%, 78%);
  font-size: 0.75rem;
  font-weight: 500;
  text-transform: uppercase;
  margin-bottom: 10px;
}

.product-grid .showcase-title {
  color: hsl(0, 0%, 47%);
  font-size: 0.813rem;
  font-weight: 300;
  text-transform: capitalize;
  letter-spacing: 1px;
  margin-bottom: 10px;
  transition: 0.2s ease;
} 

.product-grid .showcase-title:hover { color: hsl(0, 0%, 13%); }

@media (max-width: 480px) {

    
.product-grid {
 width:100%;

 display: grid;
    
  /* grid-template-columns: 1fr; */

  gap: 25px;
}
}

@media (max-width:531px){
    
.product-grid {
 width:100%;
 
 display: grid;


  gap: 25px;
}
}
@media (max-width:480px){
    
.product-grid {
 /* display: flex; */
 width:100%;
 
 display: grid;
    /* align-items: center; */
  /* justify-content: center; */
  /* grid-template-columns: 1fr; */

  gap: 25px;
}
}

  


</style>

</head>

<body>



  <!--
    - MODAL not used
  -->
  <div class="overlay" data-overlay></div>



  <div class="modal" data-modal>

    <div class="modal-close-overlay" data-modal-overlay></div>

    <div class="modal-content">

      <button class="modal-close-btn" data-modal-close>
        <ion-icon name="close-outline"></ion-icon>
      </button>

      <div class="newsletter-img">
        <img src="./assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
      </div>

      <div class="newsletter">

        <form action="#">

          <div class="newsletter-header">

            <h3 class="newsletter-title">Subscribe Newsletter.</h3>

            <p class="newsletter-desc">
              Subscribe the <b>Anon</b> to get latest products and discount update.
            </p>

          </div>

          <input type="email" name="email" class="email-field" placeholder="Email Address" required>

          <button type="submit" class="btn-newsletter">Subscribe</button>

        </form>

      </div>

    </div>

  </div>





<!--\ ----------------------/-->
 <!--window navigation bar  -->
 <!--------------------------->

    <div class="header-main">

      <div class="container">

        <a href="#" class="header-logo">
          <img src="./assets/images/logo/logo3.jpg" alt="Anon's logo" class="large" width="150" height="34">
          <img src="./assets/images/logo/head1.jpg" alt="Anon's logo" class="small" width="50" height="26">

          <!-- <h2 width="150" height="34">CASHBACK</h2> -->
        </a>
      
<!-- <form action=""> -->

        <div class="header-search-container">
          
          <input type="search" id="search" name="search" class="search-field" placeholder="Enter your product name..." autocomplete="off">

          <button class="search-btn" onclick="search()">
            <ion-icon name="search-outline"></ion-icon>
          </button> 

          <div id="search-results"></div>

          
        </div>
       
        <!-- </form> -->

        <div class="header-user-actions">
        <style>
            .custom-dropdown img {

  margin-top: 2px;
}
          </style>
  <div class="custom-dropdown">
    <select id="mySelect" class="select_brand" name="select_brands" style="width: 150px; height: 600px;">
        <?php
                            $select_quary="select * from brands";
                            $result_quary=mysqli_query($con,$select_quary);
                            while($row=mysqli_fetch_assoc($result_quary)){
                                $brand_title=$row['brand_title'];
                                $brand_id=$row['brand_id'];
                                $brand_image=$row['brand_image'];
                                echo " <option value='$brand_id' data-image='admin_area\brand_image/$brand_image' >$brand_title</option> ";

                            }

                            ?> 
    </select>
 </div>


          <button class="action-btn">
            <i class="uil uil-image-upload"></i>           
          </button> 

          <button class="action-btn">
            <i class="uil uil-wallet"></i>  
            <span class="count">0</span>           
          </button>
     

          <button class="action-btn">
            <a href="user_area\index.php" style="color:rgb(78, 75, 75);"><i class="uil uil-user"></i></a>
            
          </button>

        </div>

      </div>

    </div> 

<!-- 
    <div class="result-box">
    
    </div> -->
<!-- window navbar close -->
<!-- -------------------- -->

     <script>


   // Your existing JavaScript code here
  //  .replace(/%20/g, '+')
  // .replace(/ /g, '+')
    // Function to handle the search button click
    function search() {
      // var searchValue = encodeURIComponent($('#search').val()).replace(/%20/g, '+');
      var searchValue = $('#search').val();

        var selectedValue = $('#mySelect').val();
        
        // Redirect to the search_results.php page with search value and selected value
        window.location.href = 'search_data.php?search=' + encodeURIComponent(searchValue) + '&selectedValue=' + encodeURIComponent(selectedValue);
    }

</script>

     

<!-- /--------/ -->
<!-- category 1 -->
<!-- ---------- -->



    <div class="category-1">

      <div class="container">

        <div class="category-item-container-1 has-scrollbar">

          <div class="category-item-1">

            <div class="category-img-box-1">
              <img src="./assets/images/icons/dress.svg" alt="dress & frock" width="20">
            </div>

            <div class="category-content-box-1">

              <div class="category-content-flex-1">
                <h3 class="category-item-title-1">Dress & frock</h3>
              </div>
              
            </div>

          </div>

      

          <div class="category-item-1">

            <div class="category-img-box-1">
              <img src="./assets/images/icons/coat.svg" alt="winter wear" width="20">
            </div>

           
            <div class="category-content-box-1">

              <div class="category-content-flex-1">
                <h3 class="category-item-title-1">Dress & frock</h3>
              </div>
              
            </div>

          </div>
<!-- ========================= -->

        </div>

      </div>

    </div>

    
<!-- category 1 close -->


<!-- --------------- -->
<!-- window nav bar -->
<!-- --------------- -->
    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="#" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Categories</a>

            <div class="dropdown-panel">

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="#">Electronics</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Desktop</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Laptop</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Camera</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Tablet</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Headphone</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">
                    <img src="./assets/images/electronics-banner-1.jpg" alt="headphone collection" width="250"
                      height="119">
                  </a>
                </li>

              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="#">Men's</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Formal</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Casual</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Sports</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Jacket</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Sunglasses</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">
                    <img src="./assets/images/mens-banner.jpg" alt="men's fashion" width="250" height="119">
                  </a>
                </li>

              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="#">Women's</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Formal</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Casual</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Perfume</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Cosmetics</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Bags</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">
                    <img src="./assets/images/womens-banner.jpg" alt="women's fashion" width="250" height="119">
                  </a>
                </li>

              </ul>

              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="#">Electronics</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Smart Watch</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Smart TV</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Keyboard</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Mouse</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">Microphone</a>
                </li>

                <li class="panel-list-item">
                  <a href="#">
                    <img src="./assets/images/electronics-banner-2.jpg" alt="mouse collection" width="250" height="119">
                  </a>
                </li>

              </ul>

            </div>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">home application</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">kitchen</a>
              </li>

              <li class="dropdown-item">
                <a href="#">furniture</a>
              </li>

              <li class="dropdown-item">
                <a href="#">smart gadgets</a>
              </li>

              <li class="dropdown-item">
                <a href="#">accessories</a>
              </li>

            </ul>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Men's</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">Shirt</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Shorts & Jeans</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Safety Shoes</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Wallet</a>
              </li>

            </ul>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Women's</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">Dress & Frock</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Earrings</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Necklace</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Makeup Kit</a>
              </li>

            </ul>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Jewelry</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">Earrings</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Couple Rings</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Necklace</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Bracelets</a>
              </li>

            </ul>
          </li>

         

          <li class="menu-category">
            <a href="#" class="menu-title">Blog</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Hot Offers</a>
          </li>

        </ul>

      </div>

    </nav>
<!-- -------------------- -->
<!-- -----mobile bottom----- -->
<!-- -------------------- -->
    <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn">
        <ion-icon name="home-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="heart-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="grid-outline"></ion-icon>
      </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <a href="#" class="menu-title">Home</a>
        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Men's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shirt</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shorts & Jeans</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Safety Shoes</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Wallet</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Women's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Dress & Frock</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Makeup Kit</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Jewelry</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Couple Rings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Bracelets</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">home application</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">kitchen</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">furniture</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">smart gadgets</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">accessories</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Blog</a>
        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Hot Offers</a>
        </li>

      </ul>

      <div class="menu-bottom">

        <ul class="menu-category-list">

          <li class="menu-category">

            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Language</p>

              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>

              <li class="submenu-category">
                <a href="#" class="submenu-title">English</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Espa&ntilde;ol</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Fren&ccedil;h</a>
              </li>

            </ul>

          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Currency</p>
              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="#" class="submenu-title">USD &dollar;</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">EUR &euro;</a>
              </li>
            </ul>
          </li>

        </ul>

        <ul class="menu-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>

    </nav>

  </header>
<!-- brands -->


<!--
    - MAIN
  -->
  <main>

    <!--
      - BANNER
    -->



    <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

        <?php
    $query = "SELECT * FROM main_banner";
    $result_quary = mysqli_query($con, $query);

    while($row=mysqli_fetch_assoc($result_quary)){
      $banner_id=$row['banner_id']; 
      $banner_title=$row['banner_title']; 
      $banner_sub_title=$row['banner_sub_title']; 
      $affilate_link=$row['affilate_link']; 
      $banner_image=$row['banner_image']; 
      $form_id = "myForm_$banner_id";
echo "
<div class='slider-item'>

<img src='admin_area\main_banner/$banner_image' alt='women's latest fashion sale' class='banner-img'>

<div class='banner-content'>
<a href='#' onclick='submitForm(\"$form_id\", \"$affilate_link\");'>
  <p class='banner-subtitle'>$banner_title</p>

  <h2 class='banner-title'>$banner_sub_title</h2>
</a>
 

  <a href='#' onclick='submitForm(\"$form_id\", \"$affilate_link\");' class='banner-btn'>Shop now</a>

<form method='post' action='' id='$form_id'>
<input type='hidden' name='hiddin_banner' value='$banner_id'>
<input type='hidden' name='affiliate_link' value='$affilate_link'>
<button type='submit' class='hidden-submit'></button>
</form>

</div>

</div>
";
    }
   ?>

</div>
      
      </div>
    
    </div>



  

    <!--
      - CATEGORY
    -->

    <div class="category">

      <div class="container">

        <div class="category-item-container has-scrollbar">

          <div class="category-item">

            <div class="category-img-box">
              <img src="./assets/images/icons/dress.svg" alt="dress & frock" width="30">
            </div>

            <div class="category-content-box">

              <div class="category-content-flex">
                <h3 class="category-item-title">Dress & frock</h3>

              </div>


            </div>

          </div>

          <div class="category-item">

<div class="category-img-box">
  <img src="./assets/images/icons/watch.svg" alt="watch" width="30">
</div>

<div class="category-content-box">

  <div class="category-content-flex">
    <h3 class="category-item-title">Watch</h3>

  </div>

  <a href="#" class="category-btn">Show all</a>

</div>

</div>

          
         
<!-- end -->

        </div>

      </div>

    </div>


    <!-- suggestion product -->
    
    <form action="post">

    
    <div class="category-3">

      <div class="container">
        <h3 class="suggested-itom">Suggested for you</h3>

        <div class="category-item-container-3 has-scrollbar">
         
          <div class="category-item-3">
          
            <p class="header-discount">GET 25RS FROM CASHBACK.COM</p>

            <button>
            <div class="category-img-box-3">
              <a href="#"><img src="./assets\images\products\shirt-1.jpg" alt="dress & frock" width="200">
              </a>
            </div>
          </button>
            <div class="category-content-box-3">
            
              <div class="category-content-flex-3">
                <h3 class="category-item-title-3">Dress & frock</h3>
              </div>
            <button>
              <a href="#" class="category-btn-3">More</a>
            </button>
            </div>
        
          </div>
      

          <div class="category-item-3">
            <p class="header-discount">Save 25RS from Cashback</p>

            <div class="category-img-box-3">
              <img src="./assets\images\products\shoe-4.jpg" alt="dress & frock" width="200">
            </div>

            <div class="category-content-box-3">

              <div class="category-content-flex-3">
                <h3 class="category-item-title-3">Dress & frock</h3>
              </div>

              <a href="#" class="category-btn-3">More</a>

            </div>

          </div>

 




</div>

</div>

</form>

        </div>

      </div>

    </div>





    <!--
      - PRODUCT
    -->

    <div class="product-container">

      <div class="container">


        <!--
          - SIDEBAR
        -->

        <div class="sidebar  has-scrollbar" data-mobile-menu>

          <div class="sidebar-category">

            <div class="sidebar-top">
              <h2 class="sidebar-title">Category</h2>

              <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
              </button>
           </div>

           <div>
            <ul class="sidebar-menu-category-list">

              <li class="sidebar-menu-category">

                <!-- Container to load content -->
             <div id="content-container"></div>
     

             

              </li>

          
<!-- ============= -->

            </ul>

         
            </div>
          </div>

          <div class="product-showcase">

            <h3 class="showcase-heading">best selling  items</h3>

            <div class="showcase-wrapper">

              <div class="showcase-container">

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/1.jpg" alt="baby fabric shoes" width="75" height="75"
                      class="showcase-img">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">baby fabric shoes</h4>
                    </a>

                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <div class="price-box">
                      <del>$5.00</del>
                      <p class="price">$4.00</p>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/2.jpg" alt="men's hoodies t-shirt" class="showcase-img"
                      width="75" height="75">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">men's hoodies t-shirt</h4>
                    </a>
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-half-outline"></ion-icon>
                    </div>

                    <div class="price-box">
                      <del>$17.00</del>
                      <p class="price">$7.00</p>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/3.jpg" alt="girls t-shirt" class="showcase-img" width="75"
                      height="75">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">girls t-shirt</h4>
                    </a>
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-half-outline"></ion-icon>
                    </div>

                    <div class="price-box">
                      <del>$5.00</del>
                      <p class="price">$3.00</p>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/4.jpg" alt="woolen hat for men" class="showcase-img" width="75"
                      height="75">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">woolen hat for men</h4>
                    </a>
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <div class="price-box">
                      <del>$15.00</del>
                      <p class="price">$12.00</p>
                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

<!-- sidebar window close -->



<!--
            - PRODUCT MINIMAL
          -->

        <div class="product-box">

          
          <div class="product-minimal">

            <div class="product-showcase">

              <h2 class="title">Furnitures</h2>

              <!-- <div class="showcase-wrapper has-scrollbar"> -->

              <!-- <div class="showcase-container"> -->



              <div id="Furnitures"></div>
            
              <!-- </div> -->

    
                


<!--     -->
              <!-- </div> -->

            </div>



            <div class="product-showcase">
            
              <h2 class="title">Kitchens item</h2>
            
              <!-- <div class="showcase-wrapper  has-scrollbar"> -->
            <div id="Kitchens"></div>
                
              <!-- </div> -->
            
            </div>




            <div class="product-showcase">
            
              <h2 class="title">Luxury Beauty</h2>
            
              <!-- <div class="showcase-wrapper  has-scrollbar"> -->
            
            <div id="LuxuryBeauty"></div>
            
            
              <!-- </div> -->
            
            </div>

          </div>



          <!--
            - PRODUCT FEATURED
          -->

          <div class="product-featured">

            <h2 class="title">Deal of the day</h2>

            <div class="showcase-wrapper has-scrollbar">

              <div class="showcase-container">

                <div class="showcase">
                  
                  <div class="showcase-banner">
                    <img src="./assets/images/products/shampoo.jpg" alt="shampoo, conditioner & facewash packs" class="showcase-img">
                  </div>

                  <div class="showcase-content">
                    
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>
                    </div>

                    <a href="#">
                      <h3 class="showcase-title">shampoo, conditioner & facewash packs</h3>
                    </a>

                    <p class="showcase-desc">
                      Lorem ipsum dolor sit amet consectetur Lorem ipsum
                      dolor dolor sit amet consectetur Lorem ipsum dolor
                    </p>

                  

                    <div class="countdown-box">

                      <p class="countdown-desc">
                        Hurry Up! Offer ends in:
                      </p>

                      <div class="countdown">

                        <div class="countdown-content">

                          <p class="display-number">360</p>

                          <p class="display-text">Days</p>

                        </div>

                        <div class="countdown-content">
                          <p class="display-number">24</p>
                          <p class="display-text">Hours</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">59</p>
                          <p class="display-text">Min</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">00</p>
                          <p class="display-text">Sec</p>
                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

              <div class="showcase-container">
              
                <div class="showcase">
              
                  <div class="showcase-banner">
                    <img src="./assets/images/products/jewellery-1.jpg" alt="Rose Gold diamonds Earring" class="showcase-img">
                  </div>
              
                  <div class="showcase-content">
              
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>
                    </div>
              
                    <h3 class="showcase-title">
                      <a href="#" class="showcase-title">Rose Gold diamonds Earring</a>
                    </h3>
              
                    <p class="showcase-desc">
                      Lorem ipsum dolor sit amet consectetur Lorem ipsum
                      dolor dolor sit amet consectetur Lorem ipsum dolor
                    </p>
              
                    <div class="countdown-box">
              
                      <p class="countdown-desc">Hurry Up! Offer ends in:</p>
              
                      <div class="countdown">
                        <div class="countdown-content">
                          <p class="display-number">360</p>
                          <p class="display-text">Days</p>
                        </div>
              
                        <div class="countdown-content">
                          <p class="display-number">24</p>
                          <p class="display-text">Hours</p>
                        </div>
              
                        <div class="countdown-content">
                          <p class="display-number">59</p>
                          <p class="display-text">Min</p>
                        </div>
              
                        <div class="countdown-content">
                          <p class="display-number">00</p>
                          <p class="display-text">Sec</p>
                        </div>
                      </div>
              
                    </div>
              
                  </div>
              
                </div>
              
              </div>
              
              <div class="showcase-container">

                <div class="showcase">
                  
                  <div class="showcase-banner">
                    <img src="./assets/images/products/shampoo.jpg" alt="shampoo, conditioner & facewash packs" class="showcase-img">
                  </div>

                  <div class="showcase-content">
                    
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>
                    </div>

                    <a href="#">
                      <h3 class="showcase-title">shampoo, conditioner & facewash packs</h3>
                    </a>

                    <p class="showcase-desc">
                      Lorem ipsum dolor sit amet consectetur Lorem ipsum
                      dolor dolor sit amet consectetur Lorem ipsum dolor
                    </p>

                    

                    <div class="countdown-box">

                      <p class="countdown-desc">
                        Hurry Up! Offer ends in:
                      </p>

                      <div class="countdown">

                        <div class="countdown-content">

                          <p class="display-number">360</p>

                          <p class="display-text">Days</p>

                        </div>

                        <div class="countdown-content">
                          <p class="display-number">24</p>
                          <p class="display-text">Hours</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">59</p>
                          <p class="display-text">Min</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">00</p>
                          <p class="display-text">Sec</p>
                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>



          <!--
            - PRODUCT GRID
          -->

          <div class="product-main">

            <h2 class="title">New Products</h2>

            <div class="product-grid">

         <!-- <div class="showcase">

                <div class="showcase-banner">

                  <img src="./assets/images/products/jacket-3.jpg" alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
                  <img src="./assets/images/products/jacket-4.jpg" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">

                  <p class="showcase-badge">15%</p>


                </div>

                <div class="showcase-content">

                  <a href="#" class="showcase-category">jacket</a>

                  <a href="#">
                    <h3 class="showcase-title">Mens Winter Leathers Jackets</h3>
                  </a>

          
                </div>

              </div> -->

    

            

         

              <!-- <?php
              $select_query="select * from products where brand_id=1";
               $result_query=mysqli_query($con,$select_query);
              //  echo $row['product_title'];
        
               while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id']; 
                $brand_id=$row['brand_id']; 
                $category_id=$row['category_id']; 
                $sub_cat_id=$row['sub_cat_id']; 
                $product_title=$row['product_title']; 
                $product_desription=$row['product_desription']; 
                $product_keyword=$row['product_keywords']; 
                $product_discount=$row['product_discount']; 
                $product_image1=$row['product_image1']; 
                $product_image2=$row['product_image2']; 

                 echo "
                 <div class='showcase'>

                 <div class='showcase-banner'>
 
                   <img src='admin_area\products/$product_image1' alt='' width='300' class='product-img default'>
                   <img src='admin_area\products/$product_image2' alt='' width='300' class='product-img hover'>
 
                   <p class='showcase-badge' style=' background: hsl(353, 100%, 78%);;'>$product_discount</p>
 
                 </div>
 
                 <div class='showcase-content'>
 
                   <a href='#' class='showcase-category'>$product_title</a>
 
                   <a href='#'>
                     <h3 class='showcase-title'>$product_desription</h3>
                         </a>
 
                 </div>
 
               </div>
                 ";


               }
               ?> -->
            
         
         
  
            <div id="product-containerA"></div>
       

            </div>
            

          </div>

        </div>

      </div>

    </div>





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

      <div class="container">

        <div class="testimonials-box">

          <!--
            - TESTIMONIALS
          -->

          <div class="testimonial">

            <h2 class="title">testimonial</h2>

            <div class="testimonial-card">

              <img src="./assets/images/logo/head1.jpg" alt="alan doe" class="testimonial-banner" width="80" height="80">

              <p class="testimonial-name">Mr_Pavan</p>

              <p class="testimonial-title">CEO & Founder Invision</p>

              <img src="./assets/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26">

              <p class="testimonial-desc">
                Lorem ipsum dolor sit amet consectetur Lorem ipsum
                dolor dolor sit amet.
              </p>

            </div>

          </div>



          <!--
            - CTA
          -->

          <div class="cta-container">

            <img src="./assets/images/cta-banner.jpg" alt="summer collection" class="cta-banner">

            <a href="#" class="cta-content">

              <p class="discount">25% Discount</p>

              <h2 class="cta-title">Summer collection</h2>

              <p class="cta-text">Starting @ $10</p>

              <button class="cta-btn">Shop now</button>

            </a>

          </div>



          <!--
            - SERVICE
          -->

          <div class="service">

            <h2 class="title">Our Services</h2>

            <div class="service-container">

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="boat-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Worldwide Delivery</h3>
                  <p class="service-desc">For Order Over $100</p>

                </div>

              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="rocket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Next Day delivery</h3>
                  <p class="service-desc">UK Orders Only</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="call-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Best Online Support</h3>
                  <p class="service-desc">Hours: 8AM - 11PM</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="arrow-undo-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Return Policy</h3>
                  <p class="service-desc">Easy & Free Return</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="ticket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">30% money back</h3>
                  <p class="service-desc">For Order Over $100</p>
              
                </div>
              
              </a>

            </div>

          </div>

        </div>

      </div>

    </div>


    <?php
// include ('youscript.php');
?>
<!-- <div id="content-containersa">

</div> -->


<style>
  /* .header-search-container {
    max-width: 400px;
    margin: 50px auto;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
} */

#search-results {
  /* 473 */
    margin-top: 346px;     
    border: 1px solid #ccc;
    border-top: none;
    display: none;
    z-index: 4;
    position: absolute;
    background-color: white;
    overflow-y: scroll;

width: 690px;
height:300px;
  
}

#search-results div {
    padding: 10px;
    cursor: pointer;
}

#search-results div:hover {
    background-color: #f2f2f2;
}

@media (max-width:480px){

  #search-results {
    width: 362px;

/* height:300px; */
  }

}
@media (max-width:531px){
   
  #search-results {
  width: 362px;
  }
}
</style>

<!-- <div class="search-container">
        <label for="search">Search:</label>
        <input type="search" id="search" name="search" autocomplete="off">
        <div id="search-results"></div>
    </div> -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>      -->
        


  <!--
    - FOOTER
  -->
  
<?php
include ('./includes\footer.html');
?>





  <script>
       'use strict';


// mobile menu variables
const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
const overlay = document.querySelector('[data-overlay]');

for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

  // mobile menu function
  const mobileMenuCloseFunc = function () {
    mobileMenu[i].classList.remove('active');
    overlay.classList.remove('active');
  }

  mobileMenuOpenBtn[i].addEventListener('click', function () {
    mobileMenu[i].classList.add('active');
    overlay.classList.add('active');
  });

  mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
  overlay.addEventListener('click', mobileMenuCloseFunc);

}





// accordion variables
const accordionBtn = document.querySelectorAll('.mainMenu');
const accordion = document.querySelectorAll('.subMenu');

for (let i = 0; i < accordionBtn.length; i++) {

  accordionBtn[i].addEventListener('click', function () {

    const clickedBtn = this.nextElementSibling.classList.contains('active');

    for (let i = 0; i < accordion.length; i++) {

      if (clickedBtn) break;

      if (accordion[i].classList.contains('active')) {

        accordion[i].classList.remove('active');
        accordionBtn[i].classList.remove('active');

      }

    }

    this.nextElementSibling.classList.toggle('active');
    this.classList.toggle('active');

  });

}

// search feild

// let Availablekeywords = [
// 'mobile',
//   'phone',
//   'web',
//   'whers out the',
//   'br bro',
//   'hggugu',
//   'hggugu',
//   'hggugu',
//   'hggugu',
//   'hggugu',
//   'hgngugu',
//   'hgngugu',
//   'hgngugu',
//   'hgngugu',
//   'hngugu',
// ];
const resultsbox = document.querySelector(".result-box");
const inputbox= document.getElementById("input-box");

// inputbox.onkeyup = function(){
//   let result = [];
//   let input = inputbox.value;
//   if(input.length){
//       result = Availablekeywords.filter((keyword)=>{
//        return   keyword.toLowerCase().includes(input.toLowerCase());
//       });
//       console.log(result);
//   }
//   display(result);
//   if(!result.length){
//       resultsbox.innerHTML='';
//   }
// }


function display(result){
  const content = result.map((list)=>{
      return"<li onclick=selectInput(this)>" + list + "</li>";

  });
  resultsbox.innerHTML = "<ul>" +content.join('')+ "</ul>";
}

function selectInput(list){
  inputbox.value= list.innerHTML;
  resultsbox.innerHTML= '';

}


// ===============================

$(document).ready(function() {
    $("#search").on("input", function() {
        var query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                url: "searchs.php",
                method: "POST",
                data: {query: query},
                success: function(data) {
                    $("#search-results").html(data).show();
                }
            });
        } else {
            $("#search-results").hide();
        }
    });

    $(document).on("click", "#search-results div", function() {
        var result = $(this).text();
        $("#search").val(result);
        $("#search-results").hide();
    });

    // Prevent form submission when pressing Enter key
    $("#search").closest('form').submit(function(event) {
        event.preventDefault();
    });

    // Hide results when clicking outside the search box
    $(document).on("click", function(e) {
        if (!$(e.target).closest("#search-results").length) {
            $("#search-results").hide();
        }
    });
});

// ================================
$(document).ready(function() {
        $('#mySelect').select2({
            templateResult: formatResult,
            templateSelection: formatSelection,
            minimumResultsForSearch: Infinity,
            closeOnSelect: true // Close the dropdown after selecting an option
        });

        function formatResult(option) {
            if (!option.id) {
                return option.text;
            }

            var $option = $('<span><img src="' + $(option.element).data('image') + '" class="img-flag" /> ' + option.text + '</span>');
            return $option;
        }

        function formatSelection(option) {
            if (!option.id) {
                return option.text;
            }

            var $option = $('<span><img src="' + $(option.element).data('image') + '" class="img-flag"  /> ' + option.text + '</span>');
            return $option;
        }

        // Event listener for form submission
        $('#mySelect').on('change', function() {
            // e.preventDefault(); 
            var selectedValue = $(this).val();
            loadContent(selectedValue);
            loadContentProduct(selectedValue);
            loadContentFurnitures(selectedValue);
            loadContentKitchens(selectedValue);
            loadContentLuxuryBeauty(selectedValue);
        });

        // Function to load content using AJAX
        function loadContent(value) {
            $.ajax({
                url: '', // Include the same page or provide the correct path
                type: 'POST',
                data: { selectedValue: value },
                success: function(response) {
                    // Display the loaded content in the container
                    $('#content-container').html(response);
                    setupAccordion();
                },
                error: function() {
                    alert('Error loading content');
                }
            });
        }

        function loadContentProduct(value) {
            $.ajax({
                url: 'product.php', // Include the same page or provide the correct path
                type: 'POST',
                data: { selectedValue: value },
                success: function(response) {
                    // Display the loaded content in the container
                    $('#product-containerA').html(response);
                    setupAccordion();
                },
                error: function() {
                    alert('Error loading content');
                }
            });
        }

        function loadContentFurnitures(value) {
            $.ajax({
                url: 'Furnitures.php', // Include the same page or provide the correct path
                type: 'POST',
                data: { selectedValue: value },
                success: function(response) {
                    // Display the loaded content in the container
                    $('#Furnitures').html(response);
                    setupAccordion();
                },
                error: function() {
                    alert('Error loading content');
                }
            });
        }

        function loadContentKitchens(value) {
            $.ajax({
                url: 'Kitchens.php', // Include the same page or provide the correct path
                type: 'POST',
                data: { selectedValue: value },
                success: function(response) {
                    // Display the loaded content in the container
                    $('#Kitchens').html(response);
                    setupAccordion();
                },
                error: function() {
                    alert('Error loading content');
                }
            });
        }
        function loadContentLuxuryBeauty(value) {
            $.ajax({
                url: 'LuxuryBeauty.php', // Include the same page or provide the correct path
                type: 'POST',
                data: { selectedValue: value },
                success: function(response) {
                    // Display the loaded content in the container
                    $('#LuxuryBeauty').html(response);
                    setupAccordion();
                },
                error: function() {
                    alert('Error loading content');
                }
            });
        }

        // Trigger an initial content load when the page is ready
        var initialValue = $('#mySelect').val();
        loadContent(initialValue);
       
        // Trigger an initial content load when the page is ready
        var initialValue = $('#mySelect').val();
        loadContentProduct(initialValue);

        // Trigger an initial content load when the page is ready
        var initialValue = $('#mySelect').val();
        loadContentFurnitures(initialValue);

        // Trigger an initial content load when the page is ready
        var initialValue = $('#mySelect').val();
        loadContentKitchens(initialValue);

        // Trigger an initial content load when the page is ready
        var initialValue = $('#mySelect').val();
        loadContentLuxuryBeauty(initialValue);




        // Function to set up accordion behavior
        function setupAccordion() {
            const accordionContent = document.querySelectorAll(".accordion-content");

            accordionContent.forEach((item, index) => {
                let header = item.querySelector("header");
                header.addEventListener("click", () => {
                    item.classList.toggle("open");

                    let description = item.querySelector(".description");
                    if (item.classList.contains("open")) {
                        description.style.height = `${description.scrollHeight}px`;
                        item.querySelector("i").classList.replace("fa-plus", "fa-minus");
                    } else {
                        description.style.height = "0px";
                        item.querySelector("i").classList.replace("fa-minus", "fa-plus");
                    }
                    removeOpen(index);
                });
            });

            function removeOpen(index1) {
                accordionContent.forEach((item2, index2) => {
                    if (index1 != index2) {
                        item2.classList.remove("open");

                        let des = item2.querySelector(".description");
                        des.style.height = "0px";
                        item2.querySelector("i").classList.replace("fa-minus", "fa-plus");
                    }
                });
            }
        }
    });
    </script>
    
  <!--
    - custom js link
  -->
  <!-- <script src="./assets/js/script.js"></script> -->

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  
</body>

</html>