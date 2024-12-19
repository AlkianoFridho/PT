<template>
    <header class="header">
      <a href="index.html" class="logo">
        <img src="/public/images/logo.png" alt="logo" />
      </a>
      <nav class="navbar">
        <router-link to="/">Home</router-link>
        <router-link to="/about">About</router-link>
        <router-link to="/product">Products</router-link>
        <router-link to="/contact">Contact</router-link>
        <router-link to="/register">Register</router-link>
        <router-link to="/cart">Cart</router-link>
        <router-link to="/payment">Payment</router-link>
        <router-link to="/userlist">Data</router-link>
      </nav>
      <div class="icons">
        <div class="fas fa-search" @click="toggleSearch"></div>
        <div class="fas fa-bars" @click="toggleMenu"></div>
      </div>
      <div class="search-form" :class="{ active: searchActive }">
        <input type="text" placeholder="search here..." />
        <label class="fas fa-search"></label>
      </div>
    </header>
  </template>
  
  <script>
  export default {
    data() {
      return {
        searchActive: false,
      };
    },
    methods: {
      toggleSearch() {
        this.searchActive = !this.searchActive;
      },
      toggleMenu() {
        // Logic to toggle menu
      },
    },
  };
  </script>
  
  <style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');
:root {
  --main-color: orange;
  --black: #13131a;
  --bg: #010103;
  --border: 0.1rem solid rgba(255, 255, 255, 0.3);
}
* {
  font-family: 'Roboto', sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  border: none;
  text-decoration: none;
  text-transform: capitalize;
  transition: 0.2s linear;
}

html {
  font-size: 62.5%;
  overflow-x: hidden;
  scroll-padding-top: 9rem;
  scroll-behavior: smooth;
}

body {
  background: var(--bg);
}

.header {
  background: #010103;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1rem 7%;
  border-bottom: var(--border);
  position: flex;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
}

.header .logo img {
  height: 6rem;
}

.header .navbar a {
  margin: 20px;
  font-size: 1.6rem;
  color: #fff;
}

.header .navbar a:hover {
  color: #f49a00;
  border-bottom: 0.1rem solid var(--main-color);
  padding-bottom: 0.5rem;
}

.header .icons div {
  color: #fff;
  cursor: pointer;
  font-size: 2.5rem;
  margin-left: 2rem;
}

.header .icons div:hover {
  color: var(--main-color);
}

.header .search-form {
  position: absolute;
  top: 115%;
  right: 7%;
  background: #fff;
  width: 50rem;
  height: 5rem;
  display: flex;
  align-items: center;
  transform: scaleY(0);
  transform-origin: top;
}

.header .search-form input {
  height: 100%;
  width: 100%;
  font-size: 1.6rem;
  color: var(--black);
  padding: 1rem;
  text-transform: none;
}

.header .search-form label {
  cursor: pointer;
  font-size: 2.2rem;
  margin-right: 1.5rem;
  color: var(--black);
}

.header .cart-items-container {
  position: absolute;
  top: 100%;
  right: -100%;
  height: calc(100vh - 9.5rem);
  width: 80rem;
  background-color: #fff;
  padding: 0 1.5rem;
}

.header .cart-items-container.active {
  right: 0;
}

.header .cart-items-container .cart-item img {
  height: 7rem;
}

.header .cart-items-container .cart-item .content h3 {
  font-size: 2rem;
  color: var(--black);
}

  </style>