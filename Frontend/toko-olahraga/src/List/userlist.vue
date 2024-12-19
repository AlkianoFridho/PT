<template>
  <div>
    <h1>User List</h1>
    <button @click="goToCreatePage">Add User</button>
    <ul>
      <li v-for="user in users" :key="user.id">
        {{ user.id }} - {{ user.name }} - {{ user.email }}
        <button @click="editUser(user.id)">Edit</button>
        <button @click="deleteUser(user.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      users: [],
    };
  },
  methods: {
    fetchUsers() {
      axios
        .get("http://localhost:8000/api/users")
        .then((response) => {
          this.users = response.data;
        })
        .catch((error) => {
          console.error("Error fetching users:", error);
        });
    },
    goToCreatePage() {
      this.$router.push("/register");
    },
    editUser(id) {
      if (!id) {
    alert('User ID is not available');
    return;
  }
  this.$router.push(`/editlist/${id}`);
},
    deleteUser(id) {
      axios
        .delete(`http://localhost:8000/api/users/${id}`)
        .then(() => {
          alert("User deleted successfully");
          this.fetchUsers(); // Refresh user list
        })
        .catch((error) => {
          console.error("Error deleting user:", error);
          alert("Failed to delete user");
        });
    },
  },
  created() {
    this.fetchUsers();
  },
};
</script>

<style scoped>
button {
  margin-left: 10px;
  padding: 5px 10px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  margin: 10px 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
</style>
