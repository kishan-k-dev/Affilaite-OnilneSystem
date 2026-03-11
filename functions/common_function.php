 <!-- displaying selected btand category -->
 
 <?php
function getcategories(){
    global $con;
// Check if the selectedValue parameter is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedValue'])) {
    // Get the selected value from the POST data
    $selectedValue = $_POST['selectedValue'];



    $query = "SELECT * FROM category WHERE brand_id = $selectedValue";
    $result_quary = mysqli_query($con, $query);

    if ($result_quary) {
        while ($row = mysqli_fetch_assoc($result_quary)) {
            $category_title = $row['category_title'];
            $category_id = $row['category_id'];
            $category_image = $row['category_image'];

            echo "<div class='accordion'>
                    <div class='accordion-content'>
                        <header>
                        <div>
                        <img src='admin_area\category_image/$category_image' alt='clothes' width='20' height='20'>

                            <span class='title'>$category_title</span>
                            </div>
                            <i class='fa-solid fa-plus'></i>
                        </header>

                        <div class='description'>";

            $query_sub = "SELECT * FROM sub_category WHERE brand_id = $selectedValue and category_id=$category_id";
            $result_quary_sub = mysqli_query($con, $query_sub);
            while ($row_sub = mysqli_fetch_assoc($result_quary_sub)) {
                $category_title_sub = $row_sub['sub_cat_title'];
                $category_sub_id = $row_sub['sub_cat_id'];

                echo "<div> <a href='product_category.php?category_sub=$category_sub_id&category_id=$category_id&brand_id=$selectedValue&sub_cat_title=$category_title_sub' class='description-link'>$category_title_sub</a>
                </div>";
            }

            echo "</div>
                </div>
            </div>";
        }
    }

    exit(); // Ensure that the script stops execution after sending the response
}

}



function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
  //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
  }  


//   $get_ip_add = getIPAddress();



function mainbanners(){

    $query = "SELECT * FROM main_banner";
    $result_quary = mysqli_query($con, $query);
    global $con;

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

}
?>