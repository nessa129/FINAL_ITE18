<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Status</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kreon:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/renew.css') }}">
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
        <li><a href="#">Edit Profile</a></li>
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
        <li><a href="home" class="active">Home</a></li>
          <li><a href="membership">Membership</a></li>
          <li><a href="#">Learning Materials</a></li>
          <li><a href="#">Events</a></li>
          <li><a href="merch">Merchandise</a></li>
        </ul>
      </div>


      <main>

      <div class="membership-container">
    <h2>Renew Your Membership</h2>
    <p><strong>Status:</strong> {{ $user->membership_status }}</p>
    <p><strong>Current Expiry Date:</strong> {{ $user->membership_expiry }}</p>
    <form action="{{ route('renew') }}" method="POST">
        @csrf
        <label for="renewalPeriod">Renewal Period:</label>
        <select id="renewalPeriod" name="renewalPeriod" required>
            <option value="1">1 Year</option>
  
        </select>
        <button type="submit">Confirm and Submit</button>
    </form>
</div>

</main>


    <script src="{{ asset('js/member.js') }}"></script> 
</body>

<footer class="footer-rectangle">
    <p>2024 All Rights Reserved | Caraga State University-Main Campus</p>
  </footer>
</html>
