<template>
    <div class="form-container sign-up-container">
      <form @submit.prevent="signUp">
        <h1>Create Account</h1>
        <span>Please fill in this form to create an account!</span>
        <input type="text" v-model="signUpData.name" placeholder="Username" />
        <input type="email" v-model="signUpData.email" placeholder="Email" />
        <input type="password" v-model="signUpData.password" placeholder="Password" />
        <button type="submit">Sign Up</button>
      </form>
      
      <!-- Button to navigate to Sign In -->
      <button class="sign-in-btn" @click="goToSignIn">Already have an account? Sign In</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        signUpData: {
          name: "",
          email: "",
          password: "",
        },
      };
    },
    methods: {
  async signUp() {
    try {
      const response = await fetch('http://localhost:8000/api/users', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(this.signUpData),
      });

      if (!response.ok) {
        const errorData = await response.json();
        alert("Error: " + JSON.stringify(errorData.errors));
        return;
      }

      alert("Sign up successful!");
      this.$router.push("/login"); // Redirect ke halaman login
    } catch (error) {
      alert("An error occurred: " + error.message);
    }
  },
},

  };
  </script>
  
  <style scoped>
  /* Add your existing styles for Sign Up form */
  .sign-in-btn {
    background: none;
    border: 1px solid var(--main-color);
    color: var(--main-color);
    padding: 0.8rem 1.5rem;
    font-size: 1rem;
    border-radius: 50px;
    cursor: pointer;
    margin-top: 1rem;
  }
  
  .sign-in-btn:hover {
    background: var(--main-color);
    color: rgb(248, 12, 12);
  }
  </style>
  