<?php

include ('./includes/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedValue'])) {
    // Get the selected value from the POST data
    $selectedValue = $_POST['selectedValue'];

    $select_query="select * from products where brand_id=$selectedValue and display_category=1 order by rand()";
    $result_query=mysqli_query($con,$select_query);
      
    echo "<div class='showcase-wrapper has-scrollbar'>";
    
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
        $form_id = "myForm_$product_id";

        echo "
        
        <div class='showcase-container'>

        <div class='showcase'>
        
          <a href='#'  onclick='submitForm(\"$form_id\");' class='showcase-img-box'>
            <img src='admin_area\products/$product_image1' alt='' class='showcase-img'
              width='220px' height='220px'>
          </a>
        
          <div class='showcase-content'>
        
            <a href='#'  onclick='submitForm(\"$form_id\", \"$affilate_link\");'>
              <h4 class='showcase-title'>$product_desription</h4>
            </a>
        
            <a href='#'  onclick='submitForm(\"$form_id\");' class='showcase-category'>$product_title</a>
          </div>
        
        </div>
        <form method='post' action='' id='$form_id'>
        <input type='hidden' name='myHiddenButton' value='$product_id'>
        <input type='hidden' name='affiliate_link' value='$affilate_link'>
        <button type='submit' class='hidden-submit'></button>
        </form>
        </div>
                
                 
        ";
   
    }

echo "</div>";

}


?>
