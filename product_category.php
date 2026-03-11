
<?php
  include ('./includes/connect.php');

  
  include('functions/common_function.php');
  
  getcategories();




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
            padding: 5px 15px; 

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
            margin-top: 5px;
            margin-bottom: 2px;
            margin-left: 7px;
            height: 0;
            font-size: 15px;
            color: #333;
            font-weight: 400;
            padding: 0px 10px;
            transition: all 0.2s linear;
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
      

        <div class="header-search-container">
          
          <input type="search" id="search" name="search" class="search-field" placeholder="Enter your product name..." autocomplete="off">

          <button class="search-btn" onclick="search()">
            <ion-icon name="search-outline"></ion-icon>
          </button> 

          <div id="search-results"></div>

          
        </div>
       

        <div class="header-user-actions">
        <style>
            .custom-dropdown img {

  margin-top: 2px;
}
          </style>
  <div class="custom-dropdown">
    <select id="mySelect" class="select_brand" style="width: 150px; height: 600px;">
        <?php
                       if(isset($_GET['brand_id'])){
                        $brand_id=$_GET['brand_id'];
                            $select_quary="select * from brands where brand_id=$brand_id";
                            $result_quary=mysqli_query($con,$select_quary);
                            while($row=mysqli_fetch_assoc($result_quary)){
                                $brand_title=$row['brand_title'];
                                $brand_id=$row['brand_id'];
                                $brand_image=$row['brand_image'];
                                echo " <option value='$brand_id' data-image='admin_area\brand_image/$brand_image' >$brand_title</option> ";

                            }
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
            <i class="uil uil-user"></i>
          </button>

        </div>

      </div>

    </div> 

    <script>
    
    // Function to handle the search button click
    function search() {
        var searchValue = $('#search').val();
        var selectedValue = $('#mySelect').val();
        
        // Redirect to the search_results.php page with search value and selected value
        window.location.href = 'search_data.php?search=' + encodeURIComponent(searchValue) + '&selectedValue=' + encodeURIComponent(selectedValue);
    }
    </script>
<!-- window navbar close -->
<!-- -------------------- -->


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
            - PRODUCT GRID
          -->

          <style>
            

@media (max-width:531px){
    
    .product-grid {
     width: 400px;%;
     
     display: grid;
     grid-template-columns: repeat(2, 1fr); 
 
      gap: 20px;
    }
    }
    @media (max-width:480px){
        
    .product-grid {
     width:350px;
     
     display: grid;
     grid-template-columns: repeat(2, 1fr); 
  
      gap: 20px;
    }
    }
  
          </style>

          <div class="product-main">

            <h2 class="title" style="margin-top:30px;"><?php if(isset($_GET['sub_cat_title'])){ 
            $sub_cat_title=$_GET['sub_cat_title'];
            echo  $sub_cat_title; } ?></h2>

            <div class="product-grid">

            <!-- <div id="product-containerA"></div> -->



<?php 

   include ('./includes/connect.php');
 
                 
                 // Check if the selectedValue parameter is set
                 if(isset($_GET['category_sub'])){
                    $sub_cat_id=$_GET['category_sub'];
                 if(isset($_GET['category_id'])){
                    $category_id=$_GET['category_id'];




    echo " 
    <div class='product-grid'>";

          
               $select_query="select * from products where sub_cat_id=$sub_cat_id and category_id=$category_id";
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
                $affilate_link=$row['affilate']; 
                $product_image1=$row['product_image1']; 
                $product_image2=$row['product_image2']; 

                 echo "
                 <div class='showcase'>

                 <div class='showcase-banner'>
 
                 <a href='$affilate_link' target='_blank' >
                   <img src='admin_area\products/$product_image1' alt='' width='300' height='350' class='product-img default'>
                   <img src='admin_area\products/$product_image2' alt='' width='300' height='350'class='product-img hover'>
 
                   <p class='showcase-badge' style=' background: hsl(353, 100%, 78%);;'>$product_discount</p>
                   </a>
                 </div>
 
                 <div class='showcase-content'>
 
                   <a href='$affilate_link' class='showcase-category' target='_blank' >$product_title</a>
 
                   <a href='$affilate_link' target='_blank' >
                     <h3 class='showcase-title'>$product_desription</h3>
                         </a>
 
                 </div>
 
               </div>
                 ";


               }
              echo " </div>
              ";
            }
        }
            
              ?>

     

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

<!-- <div id="content-container"></div> -->

         
        


  <!--
    - FOOTER
  -->
  <?php
include ('./includes\footer.html');
?>







  <script>
       
    </script>
    
  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  
</body>

</html>