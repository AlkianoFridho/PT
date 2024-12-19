<template>
  <div>
    <h1>Edit User</h1>
    <form @submit.prevent="submitForm">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="user.name" required />
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="user.email" required />
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="user.password" />
      </div>
      <div>
        <button type="submit">Save Changes</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: ['id'],
  data() {
    return {
      userId: this.$route.params.id, 
      user: {
        name: "",
        email: "",
        password: "",
      },
    };
  },
  created() {
    // Fetch the user details based on the ID when the component is created
    this.fetchUser();
  },
  methods: {
    async fetchUserData() {
      const userId = this.$route.params.id;
      axios
        .get(`http://localhost:8000/api/users/${this.id}`)
        .then((response) => {
          this.user = response.data;
        })
        .catch((error) => {
          console.error("Error fetching user data:", error);
        });
    },
    async submitForm() {
      const userId = this.$route.params.id;
      console.log('User ID:', userId); 
      if (!userId) {
    alert("User ID is missing.");
    return;
  }// Pastikan ID benar-benar ada
      axios
        .put(`http://localhost:8000/api/users/${userId}`, this.user)
        .then(() => {
          alert("User updated successfully");
          this.$router.push("/userlist");
        })
        .catch((error) => {
          console.error("Error updating user:", error);
      if (error.response && error.response.data) {
        alert("Validation error: " + JSON.stringify(error.response.data.errors));
      } else {
        alert("Failed to update user.");
      }
    });
    },
  },
  created() {
    this.fetchUserData();
  },
};
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  width: 300px;
  margin: 0 auto;
}

label {
  margin-bottom: 5px;
}

input {
  margin-bottom: 15px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  padding: 10px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
</style>
