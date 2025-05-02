<?php
session_start();
$errorMessage = ''; // Default error message
$successMessage = ''; // Default success message
include 'db.php';

// Check if there's an error or success message stored in session
if (isset($_SESSION['errorMessage'])) {
    $errorMessage = $_SESSION['errorMessage'];
    unset($_SESSION['errorMessage']); // Clear the error message from the session
}

if (isset($_SESSION['successMessage'])) {
    $successMessage = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']); // Clear the success message from the session
}

$userData = [];  // Initialize an empty array to hold user data
if (isset($_SESSION['user']) && is_numeric($_SESSION['user'])) {
    $user = $_SESSION['user'];  // The user ID is stored in the session variable 'user'
    echo "User ID from session: " . $user;  // Debugging: Check if the session user ID is valid

    $sql = "SELECT username, email, homeaddress, contact FROM usersheet WHERE id = ?";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);  // Log MySQL error if prepare fails
    }

    $stmt->bind_param("i", $user); // 'i' means the parameter is an integer
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($username, $email, $homeaddress, $contact);
        $stmt->fetch();
        $userData = [
            'username' => $username,
            'email' => $email,
            'homeaddress' => $homeaddress,
            'contact' => $contact
        ];
    } else {
        echo "No user found with the provided ID.";  // Debugging: Display error if no user is found
    }

    $stmt->close();
} else {
    echo "Invalid or missing session user value";  // Debugging: Display error if session 'user' is not set or is invalid
}
?>

<!DOCTYPE html>
<html>
<title>Azul Cosmetics</title>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=0.5"> 
   <link rel="stylesheet" href="homepage.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Unna:ital,wght@1,700&display=swap" rel="stylesheet">
</head>

<body>
   <header class="hp-header">
      <div class="logo" style="font-weight: bold;">
        <a href="Homepage.html"><img src="images/azul-logo.png" alt=""></a>
        <a href="">Home</a>
     
        <div class="dropdown2" >
           <a href="allproduct.html">Categories</a> 
           
            <div class="content2" style="margin-top: 10px;" >
               <a style="margin:  0 ; border: none;" href="eyes.html">Eyes</a>
               <a style="margin: 0 ;  border: none; " href="face.html">Face</a>
               <a style="margin:0 ;  border: none; " href="hair.html">Hair</a>
               <a style="margin: 0 ;  border: none; " href="lips.html">Lips</a>
               <a style="margin: 0 ;  border: none; " href="nails.html">Nails</a>
               <a style="margin:0 ;  border: none; " href="skins.html">Skin</a>
               <a style="margin: 0 ;  border: none; " href="others.html">Others</a>  
            </div>
        </div>
        <a href="aboutus.html">About us |</a>
        <a href="about devs.html">About Devs |</a>
     
      </div>   
      <div class="search-bar">
         <form action="">
         <div class="search-container"> 
     
     <input type="search" name="" class="search" placeholder="Lipstick, Foundation. etc...">
     <button type="submit"><i class="material-icons">search</i>Search</button>
     
     </div>
     </form>
      </div>
     
     <div class="settings">
         
        <a href="profile.html"> <i class="material-icons">account_circle</i></a>
         <a href="payment mode.html"><i class="material-icons">shopping_cart</i>
         </a>
          <div class="dropdown">
             <button> <i class="material-icons">reorder</i></button>
                <div class="content">  
                      <a href="profile.html">Account</a>
                      <a href="signin1.html">Logout</a>
                     <a href="purchases.html">Purchases</a>
            </div>
         </div>
      </div>
   </header>   
<div class="banner">

</div>
 
<div>
  <section class="slide-container">

    <div class="slide-wrapper">

      
<div class="slider">
 
   <a href="lips.html" class="slider-item">
       <img id="slide1" src="images/Lips.png" alt="">
   </a>
   <a href="Azul Exquisite Perfume.html" class="slider-item">
       <img id="slide2"  src="images/Perfume Banner.png" alt="">
   </a>
   <a href="skins.html" class="slider-item">
       <img id="slide3" src="images/Skin Banner.png" alt="">
   </a>
</div>

      <div class="slider-nav">
        <a href="#slide1"></a>
        <a href="#slide2"></a>
        <a href="#slide3"></a>

      </div>
    </div>
  
</div>


<section class="top-sales">

   <h1 style=" font-family: 'Poppins', sans-serif; text-align: center;margin: 50px 0px 0px 0px;">POPULAR ITEMS</h1>
   <hr>

<div class="sales-container">
   <div class="first-row">
        <div class="first-item">
        <img src="images/concealer.png" alt="">
        
        <div class="details"><a href="Azul Glam Concealer.html"><h1>Azul Glam Concealer</h1></div></a>
        
      </div>
      <div class="second-item">
         <img src="images/lipstick.png" alt="">
        <div class="details"><a href="Azul Majestic Lipstick.html"><h1>Azul Majestic Lipstick</h1></div></a>
      </div>
      <div class="third-item">
         <img src="images/eyeshadow.png" alt="">
         <div class="details"><a href="Azul Dreamy Eyeshadow.html"><h1>Azul Dreamy Eyeshadow</h1></div></a>
      </div>
</div>
<div class="second-row">
<div class="first-item">
   <img src="images/perfume.png" alt="">
   <div class="details"><a href="Azul Exquisite Perfume.html"><h1>Azul Exquisite Perfume</h1></div></a>
 </div>
 <div class="second-item">
    <img src="images/artificial nails.png" alt="">
   <div class="details"><a href="Azul Divine Artificial Nails.html"><h1>Azul Divine Artificial Nails</h1></div></a>
 </div>
 <div class="third-item">
    <img src="images/moisturizer.png" alt="">
    <div class="details"><a href="Azul Ideal Tinted Moisturizer.html"><h1>Azul Ideal Tinted Moisturizer</h1></div></a>
 </div>
</div>
<div class="third-row">
<div class="first-item">
   <img src="images/eyeliner2.png" alt="">
   <div class="details"><a href="Azul Celestial Eyeliner.html"><h1>Azul Celestial Eyeliner</h1></div></a>
 </div>
 <div class="second-item">
    <img src="images/remover.png" alt="">
   <div class="details"><a href="Azul Coveted Make Up Remover .html"><h1>Azul Coveted Make Up Remover</h1></div></a>
 </div>
 <div class="third-item">
    <img src="images/brush.png" alt="">
    <div class="details"><a href="Azul Lovely Make up Brush.html"><h1>Azul Lovely Make up Brush</h1></div></a>
 </div>
</div>

</section>

<section class="new-items">
   <h1 style="font-family: 'Poppins', sans-serif; text-align: center;margin: 50px 0px 0px 0px;">NEW ARRIVALS</h1><hr>
<div class="new-container">

   <div class="row1">
    <div class="col1">
      <a href="Azul Brilliant Corrector.html">
         <div class="item-container">
            
            <img src="images/corrector.png" alt="">
            <p style="margin: 0;">₱323.00</p>
         </div>
   
         <div class="item-details">
            
            <H1 style="margin: 0%;padding: 10px;">Azul Brilliant Corrector</H1>
            <i class="large material-icons" style="margin: 0%;">fiber_new<i class="large material-icons"  style="margin: 10px;">add_shopping_cart</i></i>
            <p style="margin: 0%;padding: 0%;">the pinnacle of colour correction and skincare, you can flaunt a radiant, flawless complexion.</p>
               </div>
            </a>
          </div>


          <div class="col2">
            <a href="Azul Glam Concealer.html">
               <div class="item-container">
                  
                  <img src="images/concealer.png" alt="">
                  <p style="margin: 0;">₱385.00</p>
               </div>
         
               <div class="item-details">
                  
                  <H1 style="margin: 0%;padding: 10px;">Azul Glam Concealer</H1>
                  <i class="large material-icons" style="margin: 0%;">fiber_new<i class="large material-icons"  style="margin: 10px;">add_shopping_cart</i></i>
                  <p style="margin: 0%;padding: 0%;">  you can uncover a whole new level of flawless beauty.</p>
                     </div>
                  </a>
                </div>
         </div>
       <div class="row2">
         <div class="col1">
            <a href="Azul Harmonious Eyebrow.html">
               <div class="item-container">
                  
                  <img src="images/Azul Harmonious Eyebrow.jpg" alt="">
                  <p style="margin: 0;">550.00</p>
               </div>
         
               <div class="item-details">
                  
                  <H1 style="margin: 0%;padding: 10px;">Azul Harmonious Eyebrow</H1>
                  <i class="large material-icons" style="margin: 0%;">fiber_new<i class="large material-icons"  style="margin: 10px;">add_shopping_cart</i></i>
                  <p style="margin: 0%;padding: 0%;"> Discover the key to flawlessly shaped and defined eyebrows with Azul Harmonious Eyebrow,</p>
                     </div>
                  </a>
                </div>
      
      
                <div class="col2">
                  <a href="Azul Ethereal Lip Balm.html">
                     <div class="item-container">
                        
                        <img src="images/lipbalm.png" alt="">
                        <p style="margin: 0;">550.00</p>
                     </div>
               
                     <div class="item-details">
                        
                        <H1 style="margin: 0%;padding: 10px;">Azul Ethereal Lip Balm</H1>
                        <i class="large material-icons" style="margin: 0%;">fiber_new<i class="large material-icons"  style="margin: 10px;">add_shopping_cart</i></i>
                        <p style="margin: 0%;padding: 0%;">  its divine combination of moisture and a delicate pop of colour, this entrancing lip balm is more than just a cosmetic accessory.</p>
                           </div>
                        </a>
                      </div>


       </div>

      </div>
    </div>
</section>
</body>
</html>