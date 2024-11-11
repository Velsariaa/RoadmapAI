<template>
    <div class="landing-page">
        <div class="container">
        <div class="row align-items-center pb-5">
            <!-- Column 1: Image -->
            <div class="col-lg-5">
            <img src="/src/assets/roadmap.png" alt="Roadmap" class="img-fluid" />
            </div>
    
            <!-- Column 2: Title, Subtitle, and Prompt Bar -->
            <div class="col-lg-7">
            <h1 class="title mb-4">Create an account</h1>
            <p class="subtitle mb-4">Already have an account? <span class="loginLink" @click="goToLogin">Log in</span></p>
            
            <!-- Username -->
            <div class="search-container">
                <input 
                type="text" 
                class="search-input" 
                v-model="query" 
                placeholder="  Username"
                />
            </div>

            <!-- Email -->
            <div class="search-container">
                <input 
                type="text" 
                class="search-input" 
                v-model="query" 
                placeholder="  Email"
                />
            </div>
  
            <!-- Password -->
            <div class="search-container">
                <input 
                type="text" 
                class="search-input" 
                v-model="query" 
                placeholder="  Password"
                />
            </div>

            <!-- Confirm Password -->
            <div class="search-container">
                <input 
                type="text" 
                class="search-input" 
                v-model="query" 
                placeholder="  Confirm Password"
                />
            </div>

            <!-- Verification Code -->
            <div class="verification-container">
                <label class="checkbox-label">
                    <input type="checkbox" v-model="isChecked" class="checkbox-custom" />
                    Send Verification Code
                </label>
                <input 
                    type="text" 
                    v-model="verificationCode" 
                    placeholder="Enter Verification Code" 
                    :disabled="!isChecked" 
                    class="verification-input"
                />
            </div>
  
            <button class="loginBtn" type="button">CREATE ACCOUNT</button>
    
            </div>
        </div>
        </div>
    </div>
  </template>
  
  <script>
    export default {
        name: 'LandingPage',
        data() {
            return {
            isChecked: false,
            verificationCode: ''
            };
        },
        methods: {
            goToLogin() {
            this.$router.push('/login');
            }
        }
    };

  </script>
  
  <style scoped>
  @import './SignUpPage.css';  
  
  
  html, body, .landing-page {
    height: 100%;
    margin: 0;
  }
  
  .loginBtn{
    background: linear-gradient( #30D6F3, #2EBBD4);
    border: none; 
    color: white;
    padding: 15px;
    width: 100%;
    text-align: center;
    border-radius: 30px;
    font-size: 18px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .loginBtn:hover{
    background: linear-gradient(90deg, #2EBBD4, #30D6F3); 
  }
  </style>
  