<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Info-System</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kreon:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Update the href to use Laravel asset helper for local files -->
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
        <li><a href="#">Home</a></li>
        <li><a href="view">View Profile</a></li>
        <li><a href="edit">Edit Profile</a></li>
        <li><a href="login">Log Out</a></li>
      </ul>
    </div>

      <i class="fa-solid fa-bars" id="menu-icon"></i> 
    </div>

  </header>
  
  <!-- Sidebar Menu -->
  <div id="sidebar-menu">
    <i class="fa-regular fa-circle-xmark" id="close-icon"></i>
    <ul>
      <li><a href="#" class="active">Home</a></li>
      <li><a href="membership">Membership</a></li>
      <li><a href="#">Learning Materials</a></li>
      <li><a href="#">Events</a></li>
      <li><a href="#">Merchandise</a></li>
    </ul>
  </div>

  <main>
<!---------- HOME PAGE ---------->

    <div class="rectangle-22">
      <div class="welcome">
        <h2>Welcome to the Information Systems Society!</h2>
        <p>“Empowering Students Through Innovation and Learning”</p>
      </div>
    </div>
    

    <section class="cards">
      <!-- Rectangle 23 - About ISS -->
      <div class="card rectangle-23">
          <h3>About ISS</h3>
          <div class="line"></div> <!-- Line below the title -->
          <p>"The ISS is a student organization focused on academic and professional growth. Join us to connect, learn, and grow together."</p>
          <button onclick="learnMore()">Learn More</button>
      </div>
  
      <!-- Rectangle 24 - Event Highlights -->
      <div class="card rectangle-24">
          <h3>Event Highlights</h3>
          <div class="line"></div> <!-- Line below the title -->
          <p>Upcoming Event: [Event Title]</p>
          <p>Date: [Event Date]</p>
          <p>Time: [Event Time]</p>
          <p>Location: [Venue/Online]</p>
          <button onclick="seeMore()">See More</button>
      </div>
  </section>

  
  
  </main>

  <footer class="footer-rectangle">
    <p>About Us | Privacy Policy | Contact Us</p>
  </footer>
  


<!-- Updated script reference -->
<script src="{{ asset('js/home.js') }}"></script>

</body>
</html>
