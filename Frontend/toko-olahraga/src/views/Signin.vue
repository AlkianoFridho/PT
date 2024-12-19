<template>
    <div class="form-container sign-in-container">
      <form @submit.prevent="signIn">
        <h1>Sign In</h1>
        <input type="email" v-model="signInData.email" placeholder="Email" />
        <input type="password" v-model="signInData.password" placeholder="Password" />
        <button type="submit">Sign In</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        signInData: {
          email: "",
          password: "",
        },
        registeredUser: JSON.parse(localStorage.getItem("user")) || null, // Load from localStorage
      };
    },
    methods: {
      signIn() {
        const { email, password } = this.signInData;
  
        // Check if the entered email and password match the registered user
        if (
          this.registeredUser &&
          email.toLowerCase() === this.registeredUser.email.toLowerCase() &&
          password === this.registeredUser.password
        ) {
          this.$router.push("/"); // Navigate to the home page after successful login
        } else {
          alert("User not found or incorrect password. Please try again.");
        }
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your existing styles for Sign In form */
  </style>
  