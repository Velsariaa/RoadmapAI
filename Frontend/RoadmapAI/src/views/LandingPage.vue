<template>
    <div class="landing-page">
        <div class="container mt-5">
        <div class="row align-items-center">
            <!-- Column 1: Image -->
            <div class="col-lg-5">
            <img src="/src/assets/roadmap.png" alt="Roadmap" class="img-fluid" />
            </div>
    
            <!-- Column 2: Title, Subtitle, and Prompt Bar -->
            <div class="col-lg-7">
            <h1 class="title mb-4">Build Your<br>Path to <span class="success">Success</span></h1>
            <p class="subtitle mb-4">Generate a personalized roadmap of your desired software engineering / information technology topics.</p>
    
            <!-- Prompt Bar -->
            <div class="search-container">
                <input 
                type="text" 
                class="search-input" 
                v-model="query" 
                placeholder="What do you want to learn today? (e.g., Python, React, Java)"
                @keyup.enter="search"
                />
                <div class="search-button" @click="search">
                ✓
                </div>
            </div>
    
            <!-- Suggested Topics -->
            <div class="suggested-topics">
                <div 
                class="topic-button" 
                v-for="topic in topics" 
                :key="topic" 
                @click="setQuery(topic)"
                >
                {{ topic }}
                </div>
            </div>
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
        query: '',
        topics: [
          'Frontend Development', 
          'Backend Development', 
          'Full Stack Development', 
          'React', 
          'Python', 
          'JavaScript', 
          'TypeScript', 
          'Java',
          'HTML',
          'CSS'
        ]
      };
    },
    methods: {
      search() {
        if (this.query) {
          alert(`Searching for: ${this.query}`);
          // Add search logic here
        }
      },
      setQuery(topic) {
        this.query = topic;
      }
    }
  };
  </script>
  
  <style scoped>
  @import './LandingPage.css';  
  </style>
  