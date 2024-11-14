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
            
            <div v-else class="content2 col-lg-12">
              <button @click="createRoadmap" class="card-btn" style="border: none; padding: 0; background: none;">
                    <div class="card" style="width: 18rem; cursor: pointer;">
                        <div class="card-body">
                            <img src="/src/assets/plus.png" alt="Roadmap" class="img-fluid" />
                            <h5 class="card-title"> <b> Create Roadmap </b> </h5>
                        </div>
                    </div>
              </button>
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

  