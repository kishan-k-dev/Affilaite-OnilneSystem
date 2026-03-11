
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Instead of using fit-content, specify a specific width or use auto */
.max-width {
    max-width: 100%; /* You can adjust this value based on your layout */
    width: auto; /* This will ensure it behaves like fit-content */
}

/* For Firefox, use the -moz-fit-content property */
@-moz-document url-prefix() {
    .max-width {
        max-width: -moz-fit-content;
        width: -moz-fit-content;
    }
}

  </style>
</head>
<body>
  


<?php 

   include ('./includes/connect.php');
 


    

                 
                 // Check if the selectedValue parameter is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedValue'])) {
    // Get the selected value from the POST data

    $selectedValue = $_POST['selectedValue'];
    // session_start();
    // $_SESSION['selectedValue'] = 123;
      
    echo " 
    <div class='product-grid'>
    ";

  
               $select_query="select * from products where brand_id=$selectedValue order by rand() limit 0,9";
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
                $form_id = "myForm_$product_id";

                 echo " 
           
         

                 <div class='showcase'>
            
                 <div class='showcase-banner'>
                
                 <a href='#'  onclick='submitForm(\"$form_id\");' >
                   <img src='./admin_area\products/$product_image1' alt='' width='300' height='350' class='product-img default'>
                   <img src='./admin_area\products/$product_image2' alt='' width='300' height='350'class='product-img hover'>
                   <p class='showcase-badge' style=' background: hsl(353, 100%, 78%);;'>$product_discount</p>
                 </a>
                
                 </div>
              
 
                 <div class='showcase-content'>
 
                   <a href='#' class='showcase-category' onclick='submitForm(\"$form_id\", \"$affilate_link\");'>$product_title</a>
 
                   <a href='#' onclick='submitForm(\"$form_id\");' >
                     <h3 class='showcase-title' >$product_desription</h3>
                         </a>
 
                 </div>
                 <form method='post' action='' id='$form_id'>
                 <input type='hidden' name='myHiddenButton' value='$product_id'>
                 <input type='hidden' name='affiliate_link' value='$affilate_link'>
                 <button type='submit' class='hidden-submit'></button>
             </form>
               </div>
               
             
                 ";


               }
              echo " </div>
              ";


            }



              ?>
<script>
function submitForm(formId) {
    // Trigger the hidden form submission
    document.getElementById(formId).submit();
}
</script>


</body>
</html>