<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Info-System</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kreon:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />
  <link rel="stylesheet" href="{{ asset('css/merch.css') }}">
</head>
<body>

    <header>
    <div class="logo">
      <img src="img/is.png" alt="Logo">
      <h1>INFO-SYSTEM</h1>
    </div>
    <div class="users-area">
      <!-- Notification icon -->
    <i class="fa-solid fa-bell notification-icon"></i>
      <span class="user-name">{{ Auth::user()->name }}</span>
      <img 
    src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('img/user.png') }}" 
    alt="User Icon" 
    class="user-icon" 
    id="user-icon">

    <!-- Dropdown menu -->
    <div id="user-menu">
      <i class="fa-regular fa-circle-xmark" id="user-menu-close"></i>
      <h3>Student Profile</h3>
      <hr>
      <ul>
        <li><a href="home">Home</a></li>
        <li><a href="view">View Profile</a></li>
        <li><a href="edit">Edit Profile</a></li>
        <li><a href="/login">Log Out</a></li>
      </ul>
    </div>

      <i class="fa-solid fa-bars" id="menu-icon"></i> 
    </div>

  </header>
  
  <div id="sidebar-menu">
    <i class="fa-regular fa-circle-xmark" id="close-icon"></i>
    <ul>
      <li><a href="home" class="active">Home</a></li>
      <li><a href="membership">Membership</a></li>
      <li><a href="#">Learning Materials</a></li>
      <li><a href="#">Events</a></li>
      <li><a href="merch">Merchandise</a></li>
    </ul>
  </div>

<section>
    <div class="rectangle-22" id="contents">
    <div class="Merch">
        <h2> </h2>
    </div>
    <div class="title">
      <h1>Merchandise Listing</h1>
    <div class="menuicon">
      <i class="fa-solid fa-bars" id="menuicon"></i> 
    </div>
    </div>
   <div class="line">
     <div class="shirt">
            <img src="img/shirt.jpg" alt="shirt"></div>
      <div class="Text">
                <li>Item Name: CSU-ISS T-shirt</li>
                <li>Price: ₱380.00</li>
                <li>Stocks: 123 Available</li>
              </div>

        <div class="addtocart">
        <button onclick="AddtoCart()" id="cart">Add to Cart</button>
        </div>

    
</div>

<div id="sidemenu">
    <div class="paragraph">
      <br>
     <h5> Item Name: [Qty: 1]</h5>
     <br>
     <br>
     <br>
      <span>Total Price: ₱380.00</span></h5>
     <div class="checkout">
      <button class="edit-profile-btn" onclick="window.location.href='payment'">Checkout</button>

      </div>
    </div>
</div>  
</section>

<footer class="footer-rectangle">
    <p>2024 All Rights Reserved | Caraga State University-Main Campus</p>
  </footer>
  
    
    <script src="{{ asset('js/merch.js') }}"></script>
</body>
</html>
