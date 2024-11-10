<template>
  <div class="login-container">
    <h2>Login</h2>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="email">Email</label>
        <input
          type="email"
          id="email"
          v-model="email"
          required
          placeholder="Enter your email"
        />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          v-model="password"
          required
          placeholder="Enter your password"
        />
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</template>
  
  <script>
  export default {
    name: 'LoginPage',
    data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    submitForm() {
      if (this.email && this.password) {
        // Emit login event with email and password data
        this.$emit('login', { email: this.email, password: this.password });
      } else {
        alert('Please enter both email and password');
      }
    },
  },
  };
  </script>


<style scoped>
  @import './LoginPage.css';  
</style>