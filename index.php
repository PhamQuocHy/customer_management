<?php
    require "dao/pdo.php";
    require_once "global.php";
    require "dao/hang-hoa.php";
    require "dao/img.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HLV STORE</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    
<!-- header section starts      -->

<header>
<?php
require_once('../HLVSTORE/trang-chinh/menu.php');
?>

</header>

<!-- header section ends-->

<!-- search form  -->

<?php
require_once('../HLVSTORE/trang-chinh/timkiem.php')
?>
<!-- home section starts  -->

<section class="home" id="home">
<?php
require_once('../HLVSTORE/trang-chinh/slide.php')
?>
    
</section>

<!-- home section ends -->

<!-- dishes section starts  -->

<section class="dishes" id="dishes">

<?php
    require_once('../HLVSTORE/trang-chinh/spmoi.php')
?>

</section>

<!-- dishes section ends -->

<!-- about section starts  -->

<section class="about" id="about">

<?php
    require_once('../HLVSTORE/trang-chinh/gtgon.php')
?>

</section>

<!-- about section ends -->

<!-- menu section starts  -->

<section class="menu" id="menu">

<?php
    require_once('../HLVSTORE/trang-chinh/sp(view).php')
?> 

</section>

<!-- menu section ends -->

<!-- review section starts  -->

<section class="review" id="review">
<?php
    require_once('../HLVSTORE/trang-chinh/danhgia.php')
?> 
    
    
</section>

<!-- review section ends -->

<!-- order section starts  -->

<section class="order" id="order">
<?php
    require_once('../HLVSTORE/trang-chinh/baohanh.php')
?> 
    

</section>

<!-- order section ends -->

<!-- footer section starts  -->

<section class="footer">
<?php
    require_once('../HLVSTORE/trang-chinh/footer.php')
?>

</section>

<!-- footer section ends -->

<!-- loader part  -->
<!-- <div class="loader-container">
    <img src="images/loader5.gif" alt="">
</div> -->





















<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>