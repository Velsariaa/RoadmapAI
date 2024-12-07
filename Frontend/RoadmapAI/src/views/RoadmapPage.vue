<template>
  <div class="dashboard-page">
      <div class="container mt-5">
        <div class="row align-items-center">
            <div class="title col-lg-12"> Roadmap </div>
            
            
            
        

        </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
      return {
        steps: [] 
      };
    },

  async mounted() {
    await this.sendData();
  },
  methods: {
    async sendData() {
      try {
        axios.defaults.withCredentials = true;

        const response = await axios.get('http://localhost/Fuckyou3');
        console.log('Response:', response.data);
        
      } catch (error) {
        console.error('There was an error!', error);
      }
    },
   

    createRoadmap() {
        this.$router.push('/');
    }
  }
};
</script>

<style scoped>
@import './DashboardPage.css';  
</style>

  