<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Info-System</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kreon:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/view.css') }}">
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
      <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('img/user.png') }}"  
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
    </div>

  </header>
  
  <!-- Sidebar Menu -->
  <div id="sidebar-menu">
    <i class="fa-regular fa-circle-xmark" id="close-icon"></i>
    <ul>
      <li><a href="#home" class="active">Home</a></li>
      <li><a href="membership">Membership</a></li>
      <li><a href="#">Learning Materials</a></li>
      <li><a href="#">Events</a></li>
      <li><a href="merch">Merchandise</a></li>
    </ul>
  </div>

  <main>
    
    <!-------- View Profile  ---------->

    <section id="view" class="profile-section">
      <div class="profile-box">
        <h2>My Profile</h2>
        <div class="profile-content">

<div class="profile-picture-container">
<img 
    src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('img/user.png') }}" 
    alt="Profile Picture" 
    class="profile-picture">

          <!-- Profile Details -->
<div class="profile-details">
    <div class="profile-column">
        <div class="form-group">
            <p>Name:</p>
            <input value="{{ $user->name }}" class="input-field" disabled/>
        </div>
        <div class="form-group">
            <p>Email:</p>
            <input value="{{ $user->email }}" class="input-field" disabled/>
        </div>
        <div class="form-group">
            <p>Membership Status:</p>
           <input 
    value="{{ $user->membership_expiry ? (now()->lte($user->membership_expiry) ? 'Active' : 'Inactive') : 'Inactive' }}" 
    class="input-field" 
    disabled 
/>

        </div>
    </div>

    <div class="profile-column">
        <div class="form-group">
            <p>ID Number:</p>
            <input value="{{ $user->student_id }}" class="input-field" disabled/>
        </div>
        <div class="form-group">
            <p>Program:</p>
            <input value="{{ $user->program }}" class="input-field" disabled/>
        </div>
        <div class="form-group">
            <p>Renewal Date:</p>
            <input value="{{ \Carbon\Carbon::parse($user->renewal_date)->format('F d, Y') }}" class="input-field" disabled/>

        </div>
    </div>
</div>

          

        </div>
        <button class="edit-profile-btn" onclick="window.location.href='edit'">Edit Profile</button>

      </div>
    </section>


  </main>
  

  <footer class="footer-rectangle">
    <p>2024 All Rights Reserved | Caraga State University-Main Campus</p>
  </footer>
  

  <script src="{{ asset('js/view.js') }}"></script>
</body>
</html>
