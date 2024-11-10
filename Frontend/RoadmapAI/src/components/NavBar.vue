<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <!-- Brand aligned to the left -->
        <a class="navbar-brand" href="#">Roadmap AI</a>
  
        <!-- Toggle button for mobile view -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <!-- Navbar items in the center for larger screens -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- Use d-flex and mx-auto to center the nav items -->
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Dashboard</a>
            </li>
          </ul>
  
          <!-- Buttons aligned to the right for larger screens -->
          <div class="d-flex ms-auto">
            <button class="loginBtn me-2" type="button" @click="goToLogin">Login</button>
            <button class="signUpBtn" type="button">Sign Up</button>
          </div>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: 'NavBar',
    methods: {
      goToLogin() {
        this.$router.push('/login');
      },
    },
  };
  </script>

  
  <style scoped>
  @import './NavBar.css';
  
  /* Ensure flexbox works properly in mobile and larger screens */
  .navbar-nav {
    display: flex;
    flex: 1;
    justify-content: center;
  }
  
  .d-flex {
    display: flex;
  }
  
  .ms-auto {
    margin-left: auto;
  }
  </style>
  