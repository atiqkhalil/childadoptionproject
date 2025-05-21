<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Authentication</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    
    .auth-container {
      width: 100%;
      max-width: 500px;
      padding: 20px;
    }
    
    .auth-card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 30px;
      transition: all 0.3s ease;
    }
    
    .logo {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .logo img {
      width: 60px;
      height: auto;
    }
    
    .title {
      text-align: center;
      font-size: 18px;
      color: #333;
      margin-bottom: 30px;
      font-weight: 500;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: #555;
    }
    
    .form-group input, .form-group select {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
      box-sizing: border-box;
    }
    
    .form-group input:focus, .form-group select:focus {
      outline: none;
      border-color: #FE5D37;
    }
    
    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }
    
    .remember-me {
      display: flex;
      align-items: center;
    }
    
    .remember-me input {
      margin-right: 8px;
      accent-color: #FE5D37;
    }
    
    .link {
      color: #FE5D37;
      text-decoration: none;
      font-weight: 500;
    }
    
    .link:hover {
      text-decoration: underline;
    }
    
    .auth-btn {
      width: 100%;
      padding: 12px;
      background-color: #FE5D37;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      margin-bottom: 20px;
      transition: background-color 0.3s;
    }
    
    .auth-btn:hover {
      background-color: #e04c2a;
    }
    
    .toggle-link {
      text-align: center;
      color: #555;
    }
    
    .toggle-link a {
      color: #FE5D37;
      text-decoration: none;
      font-weight: 500;
    }
    
    .toggle-link a:hover {
      text-decoration: underline;
    }
    
    /* Initially hide forms */
    #signup-form, #forgot-form, #change-password-form {
      display: none;
    }
    
    .back-to-login {
      margin-bottom: 20px;
    }
    
    .back-to-login a:hover {
      text-decoration: underline;
    }
    
    .password-note {
      color: #666;
      font-size: 14px;
      margin-bottom: 20px;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <div class="auth-container">
    <div class="auth-card">
      <div class="logo">
        <img src="{{ asset('assets/img/logonew.png') }}" alt="Logo">
      </div>
      <div class="title">Your Social Campaigns</div>
      
      @yield('auth-content')
      
      <!-- Signup Form -->
      
      
      <!-- Forgot Password Form -->
      <form id="forgot-form">
        <div class="form-group">
          <label for="forgot-email">Email Address</label>
          <input type="email" id="forgot-email" placeholder="Enter your email" required>
        </div>
        
        <div class="form-group">
          <label for="forgot-role">Role</label>
          <select id="forgot-role" required>
            <option value="">Select your role</option>
            <option value="admin">Admin</option>
            <option value="agency_staff">Agency Staff</option>
            <option value="user">User</option>
          </select>
        </div>
        
        <p class="password-note">
          We'll send you a link to reset your password
        </p>
        
        <button type="submit" class="auth-btn">Reset Password</button>
        
        <div class="back-to-login">
          <a href="#" class="link" id="show-login-from-forgot">← Back to Sign In</a>
        </div>
      </form>
      
      <!-- Change Password Form -->
      <form id="change-password-form">
        <div class="form-group">
          <label for="current-password">Current Password</label>
          <input type="password" id="current-password" placeholder="Enter current password" required>
        </div>
        
        <div class="form-group">
          <label for="new-password">New Password</label>
          <input type="password" id="new-password" placeholder="Enter new password" required>
        </div>
        
        <div class="form-group">
          <label for="confirm-password">Confirm New Password</label>
          <input type="password" id="confirm-password" placeholder="Confirm new password" required>
        </div>
        
        <div class="form-group">
          <label for="change-role">Role</label>
          <select id="change-role" required>
            <option value="">Select your role</option>
            <option value="admin">Admin</option>
            <option value="agency_staff">Agency Staff</option>
            <option value="user">User</option>
          </select>
        </div>
        
        <p class="password-note">
          Make sure your new password is strong and different from previous ones
        </p>
        
        <button type="submit" class="auth-btn">Update Password</button>
        
        <div class="back-to-login">
          <a href="#" class="link" id="show-login-from-change">← Back to Sign In</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>


  <script>
    // DOM Elements
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const forgotForm = document.getElementById('forgot-form');
    const changePasswordForm = document.getElementById('change-password-form');
    
    // Show Signup Form
    document.getElementById('show-signup').addEventListener('click', function(e) {
      e.preventDefault();
      loginForm.style.display = 'none';
      forgotForm.style.display = 'none';
      changePasswordForm.style.display = 'none';
      signupForm.style.display = 'block';
    });
    
    // Show Login Form (from signup)
    document.getElementById('show-login-from-signup').addEventListener('click', function(e) {
      e.preventDefault();
      signupForm.style.display = 'none';
      forgotForm.style.display = 'none';
      changePasswordForm.style.display = 'none';
      loginForm.style.display = 'block';
    });
    
    // Show Forgot Password Form
    document.getElementById('show-forgot').addEventListener('click', function(e) {
      e.preventDefault();
      loginForm.style.display = 'none';
      signupForm.style.display = 'none';
      changePasswordForm.style.display = 'none';
      forgotForm.style.display = 'block';
    });
    
    // Show Login Form (from forgot password)
    document.getElementById('show-login-from-forgot').addEventListener('click', function(e) {
      e.preventDefault();
      forgotForm.style.display = 'none';
      signupForm.style.display = 'none';
      changePasswordForm.style.display = 'none';
      loginForm.style.display = 'block';
    });
    
    // Show Change Password Form
    document.getElementById('show-change-password').addEventListener('click', function(e) {
      e.preventDefault();
      loginForm.style.display = 'none';
      signupForm.style.display = 'none';
      forgotForm.style.display = 'none';
      changePasswordForm.style.display = 'block';
    });
    
    // Show Login Form (from change password)
    document.getElementById('show-login-from-change').addEventListener('click', function(e) {
      e.preventDefault();
      changePasswordForm.style.display = 'none';
      signupForm.style.display = 'none';
      forgotForm.style.display = 'none';
      loginForm.style.display = 'block';
    });
    
    // Form submission handlers
    loginForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const username = document.getElementById('username').value;
      const role = document.getElementById('login-role').value;
      alert(`Login attempt as ${role}: ${username}\n(Simulated for demo)`);
      // In a real app: send data to server and handle response
    });
    
    signupForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const name = document.getElementById('name').value;
      const role = document.getElementById('signup-role').value;
      alert(`Account created as ${role}: ${name}\nSwitching to login form.`);
      // In a real app: send data to server and handle response
      signupForm.style.display = 'none';
      loginForm.style.display = 'block';
      signupForm.reset();
    });
    
    forgotForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const email = document.getElementById('forgot-email').value;
      const role = document.getElementById('forgot-role').value;
      alert(`Password reset link would be sent to ${role}: ${email}\n(Simulated for demo)`);
      // In a real app: send email to server and handle response
      forgotForm.style.display = 'none';
      loginForm.style.display = 'block';
      forgotForm.reset();
    });
    
    changePasswordForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const newPassword = document.getElementById('new-password').value;
      const confirmPassword = document.getElementById('confirm-password').value;
      const role = document.getElementById('change-role').value;
      
      if (newPassword !== confirmPassword) {
        alert("Passwords don't match!");
        return;
      }
      
      alert(`Password changed successfully for ${role}!\nSwitching to login form.`);
      // In a real app: send data to server and handle response
      changePasswordForm.style.display = 'none';
      loginForm.style.display = 'block';
      changePasswordForm.reset();
    });
  </script>
</body>

</html>