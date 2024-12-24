<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Info-System</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kreon:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />
  <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
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
        <li>
  <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
      Log Out
    </button>
  </form>
</li>

      </ul>
    </div>

      <i class="fa-solid fa-bars" id="menu-icon"></i> 
  </header>
  
  <div id="sidebar-menu">
    <i class="fa-regular fa-circle-xmark" id="close-icon"></i>
    <ul>
      <li><a href="home">Home</a></li>
      <li><a href="membership">Membership</a></li>
      <li><a href="#">Learning Materials</a></li>
      <li><a href="#">Events</a></li>
      <li><a href="merch">Merchandise</a></li>
    </ul>
  </div>


  <section>
        <div class="container">
          <div class="screen">
            <div class="screen__content">
              <form class="login">
                <h1>PRE-ORDER</h1>
                <div class="login__field">
                  <input type="text" class="login__input" placeholder="Name">
                </div>
                <div class="login__field">
                  <input type="number" class="login__input" placeholder="ID Number">
                </div>
                <button type="button" class="button login__submit">
                  <span class="button__text">Enter</span>
                  <i class="button__icon fas fa-chevron-right"></i>
                </button>
              </form>
              <div class="social-login">
                <h3>CSU-ISS</h3>
              </div>
            </div>
            <div class="screen__background">
              <span class="screen__background__shape screen__background__shape4"></span>
              <span class="screen__background__shape screen__background__shape3"></span>
              <span class="screen__background__shape screen__background__shape2"></span>
              <span class="screen__background__shape screen__background__shape1"></span>
            </div>
          </div>
        </div>
        <div class="modal-box">
          <i class="fa-regular fa-circle-check"></i>
          <h2>Completed</h2>
          <h3>You have successfully submitted the pre-order!</h3>
          <div class="buttons">
            <button class="close-btn">Ok, Close</button>
          </div>
        </div>
      </section>
    

      <footer class="footer-rectangle">
    <p>2024 All Rights Reserved | Caraga State University-Main Campus</p>
  </footer>
  
    
    <script src="{{ asset('js/payment.js') }}"></script>
</body>
</html>
