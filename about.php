<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/parts.webp" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Welcome to Rajan multi centre, your go-to destination for top-quality boat motor parts and engines. As passionate boating enthusiasts ourselves, we understand the importance of reliable performance on the water.

At Rajan multi centre, we're committed to providing our customers with the best products and service possible. With a focus on quality, affordability, and expertise, we aim to be your trusted partner in keeping your vessel running smoothly and efficiently.

With a wide selection of parts and engines from leading manufacturers, backed by our knowledgeable team, we strive to ensure that you find the perfect solution for your boating needs. Whether you're a weekend warrior or a seasoned sailor, we've got you covered.

Thank you for choosing Rajan multi centre for all your boat motor parts and engine needs. We look forward to helping you make every boating experience unforgettable!.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>











<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>