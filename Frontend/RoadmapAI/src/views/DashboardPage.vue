<template>
  <div class="dashboard-page">
      <div class="container mt-5">
        <div class="row align-items-center">
            <div class="title col-lg-12"> Your Roadmaps </div>
            <div class="subtitle col-lg-12">
              Keep up the great work! You're on track to achieving your goals.
            </div>
            
            <!-- Conditional Rendering -->
            <div v-if="!hasRoadmap" class="content col-lg-12">
              You don't have any roadmaps yet! Start your learning journey by choosing a
              topic and creating your first personalized roadmap.
              <br>
              <button @click="createRoadmap" class="createbtn col-lg-12">CREATE A NEW ROADMAP</button>
            </div>
            
            <div v-else class="content col-lg-12">
              <p>Welcome to your new roadmap! lalagyan pa to ng cards</p>
              
            </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  data() {
      return {
          hasRoadmap: false
      };
  },
  methods: {
      createRoadmap() {
          this.hasRoadmap = true;
      }
  }
};
</script>

<style scoped>
@import './DashboardPage.css';  
</style>

  