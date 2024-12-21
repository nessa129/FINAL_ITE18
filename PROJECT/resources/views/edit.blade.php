<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Info-System</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kreon:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
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
      <li><a href="#home" class="active">Home</a></li>
      <li><a href="#">Membership</a></li>
      <li><a href="#">Learning Materials</a></li>
      <li><a href="#">Events</a></li>
      <li><a href="#">Merchandise</a></li>
    </ul>
  </div>

  <main>
    

    <!----------- Edit Profile  ------------>

    <section id="edit" class="profile-section">
      <div class="profile-box">
        <h2>Edit Profile</h2>
        <div class="profile-content">
          
        <form method="POST" action="{{ route('update') }}">
    @csrf
    <div class="profile-details">
        <div class="profile-column">
            <div class="form-group">
                <p>Name:</p>
                <input type="text" value="{{ Auth::user()->name }}" name="name" class="input-field" />
            </div>
            <div class="form-group">
                <p>Email:</p>
                <input type="email" value="{{ Auth::user()->email }}" name="email" class="input-field" />
            </div>
            <div class="form-group">
                <p>Password:</p>
                <input type="password" name="password" class="input-field" placeholder="Enter your password" />
            </div>
        </div>
        
        <div class="profile-column">
            
            <div class="form-group">
                <p>Confirm Password:</p>
                <input type="password" name="password_confirmation" class="input-field" placeholder="Confirm your password" />
            </div>
        </div>
    </div>
    <button type="submit" class="edit-profile-btn">Save Changes</button>
</form>

      </div>
    </section>




  </main>
  

  <footer class="footer-rectangle">
    <p>About Us | Privacy Policy | Contact Us</p>
  </footer>
  
  <script src="{{ asset('js/edit.js') }}"></script>
  
</body>
</html>
