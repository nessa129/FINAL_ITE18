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
    
  <section id="edit" class="profile-section">
    <div class="profile-box">
        <h2>Edit Profile</h2>
        <div class="profile-content">

            <!-- Profile Picture Section -->
            <div class="profile-picture-container">
                <img src="img/user.png" alt="Profile Picture" class="profile-picture" id="profile-pic-preview">
                <input type="file" name="profile_picture" id="upload-profile-pic" accept="image/*" onchange="previewProfilePic(event)">

                <!-- Dropdown Button -->
                <div class="dropdown">
                    <i class="fa-solid fa-ellipsis-vertical dropdown-icon" onclick="toggleDropdown()"></i>
                    <ul class="dropdown-menu" id="dropdown-menu">
                        <li onclick="viewProfile()">View Profile</li>
                        <li>
                            <form action="{{ route('profile.deletePicture') }}" method="POST">
                                @csrf
                                <button type="submit" style="background: none; border: none; padding: 0; color: inherit; cursor: pointer;">
                                    Delete Profile
                                </button>
                            </form>
                        </li>
                        <li onclick="triggerFileUpload()">Upload</li>
                    </ul>
                </div>
            </div>

            <!-- Combined Form for Profile Picture and User Details -->
            <form action="{{ route('update', ['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="file" name="profile_picture" accept="image/*" style="display: none;" onchange="previewProfilePic(event)" id="upload-profile-pic">
                
                <!-- Profile Details -->
                <div class="profile-details">
                    <div class="profile-column">
                        <div class="form-group">
                            <p>Name:</p>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="input-field" />
                        </div>
                        <div class="form-group">
                            <p>Email:</p>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="input-field" />
                        </div>
                    </div>
                    <div class="profile-column">
                        <div class="form-group">
                            <p>Password:</p>
                            <input type="password" name="password" class="input-field" placeholder="Enter your password" />
                        </div>
                        <div class="form-group">
                            <p>Confirm Password:</p>
                            <input type="password" name="password_confirmation" class="input-field" placeholder="Confirm your password" />
                        </div>
                    </div>
                </div>
                
                <!-- Save Button -->
                <button type="submit" class="edit-profile-btn">Save Changes</button>
            </form>
        </div>
    </div>
</section>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  </main>
  

  <footer class="footer-rectangle">
    <p>2024 All Rights Reserved | Caraga State University-Main Campus</p>
  </footer>
  
  <script src="{{ asset('js/edit.js') }}"></script>
  
</body>
</html>

