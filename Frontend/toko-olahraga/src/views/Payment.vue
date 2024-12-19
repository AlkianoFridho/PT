<template>
    <section class="payment">
      <h1 class="heading" style="margin-top: 120px;">Payment <span>Form</span></h1>
      <div class="form-box">
        <form @submit.prevent="submitForm" id="orderForm">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" v-model="formData.name" required />
          </div>
          <div class="form-group">
            <label for="contact">Contact Number:</label>
            <input type="tel" id="contact" v-model="formData.contact" required />
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" v-model="formData.email" required />
          </div>
          <div class="form-group">
            <label for="address">Shipping Address:</label>
            <textarea id="address" v-model="formData.address" required></textarea>
          </div>
          <div class="form-group">
            <label for="payment">Payment Method:</label>
            <select id="payment" v-model="formData.payment" required>
              <option value="credit_card">Credit Card</option>
              <option value="paypal">PayPal</option>
              <!-- Add more payment options as needed -->
            </select>
          </div>
          <button type="submit" id="submitButton">Place Order</button>
        </form>
      </div>
    </section>
  </template>
  
  <script>
  export default {
    name: "Payment",
    data() {
      return {
        formData: {
          name: '',
          contact: '',
          email: '',
          address: '',
          payment: 'credit_card',
        },
      };
    },
    methods: {
      submitForm() {
        // Simulate a delay for demonstration purposes
        setTimeout(() => {
          alert('Order placed successfully!');
          this.$router.push('/'); // Redirect to the main page
        }, 1000);
      },
    },
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  @import url('../assets/style.css');
  </style>