<template>
  <div>
    <div class="cart-container">
      <div class="cart-items-container">
        <h1 class="heading">Shopping <span>Cart</span></h1>
        <div v-if="!cartItems.length" id="empty-cart-message" style="text-align: center; font-size: 1.5em; color: #888;">
          Your cart is empty!
        </div>
        <div v-else>
          <div v-for="(product, index) in cartItems" :key="index" class="cart-item">
            <img :src="product.image" :alt="product.name" />
            <div class="content">
              <p>{{ product.name }}</p>
              <div class="quantity-control">
                <button @click="modifyQuantity(product.id, 'decrease')">-</button>
                <span>{{ product.quantity }}</span>
                <button @click="modifyQuantity(product.id, 'increase')">+</button>
              </div>
              <p>{{ formattedPrice(product.price * product.quantity) }}</p>
            </div>
            <button class="remove-button" @click="removeItem(product.id)">Remove</button>
          </div>
        </div>
      </div>

      <div class="cart-summary">
        <h2>Cart Summary</h2>
        <div class="summary-section">
          <strong>Total Items:</strong> <span>{{ totalItems }}</span>
        </div>
        <div class="summary-section">
          <strong>Total Price:</strong> <span>{{ formattedPrice(totalPrice) }}</span>
        </div>
        <button class="checkout-btn" @click="checkout">Checkout</button>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      cart: {}, // Cart object stored locally
    };
  },
  computed: {
    cartItems() {
      return Object.values(this.cart).filter((item) => item && typeof item === "object" && item.quantity > 0);
    },
    totalItems() {
      return this.cartItems.reduce((total, item) => total + (item.quantity || 0), 0);
    },
    totalPrice() {
      return this.cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
    },
    formattedPrice() {
      return (price) => {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(price);
      };
    },
  },
  methods: {
    methods: {
  async fetchCart() {
    try {
      // Mengambil data keranjang dari backend Laravel
      const response = await axios.get('/api/cart'); // Pastikan endpoint ini sesuai dengan route API Laravel Anda
      console.log("Fetched cart from backend:", response.data); // Debugging

      // Format data untuk disesuaikan dengan struktur aplikasi
      this.cart = response.data.reduce((acc, item) => {
        acc[item.product_id] = { ...item, quantity: item.quantity };
        return acc;
      }, {});
      console.log("Parsed cart:", this.cart); // Debugging
    } catch (error) {
      console.error('Failed to fetch cart from backend:', error);
      this.cart = {}; // Jika gagal, set keranjang sebagai kosong
    }
  },

    async modifyQuantity(productId, action) {
      if (this.cart[productId]) {
        if (action === 'increase') {
          this.cart[productId].quantity++;
        } else if (action === 'decrease') {
          this.cart[productId].quantity--;
          if (this.cart[productId].quantity <= 0) {
            if (confirm('Are you sure you want to remove this item?')) {
              delete this.cart[productId];
            } else {
              this.cart[productId].quantity = 1; // Reset to minimum quantity
            }
          }
        }
        this.saveCart();
      }
    },
    async removeItem(productId) {
      delete this.cart[productId];
      this.saveCart();
    },
    async saveCart() {
      localStorage.setItem('cart', JSON.stringify(this.cart));
    },
    checkout() {
      alert('Checkout functionality not implemented yet.');
    },
  },
  mounted() {
    this.fetchCart(); // Ambil cart saat komponen dimuat
  },
},
};
</script>

<style>
.cart-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 10px auto;
  padding: 1rem;
  max-width: 1200px;
  background: #f7f8fa;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.cart-items-container {
  flex: 3;
  min-width: 60%;
  margin-right: 20px;
  max-width: 700px;
}

.heading {
  font-size: 2.5rem;
  margin-bottom: 20px;
  text-align: center;
  color: #333;
  font-weight: bold;
}

.cart-item {
  background: #ffffff;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding: 15px;
  margin-bottom: 10px;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s;
}

.cart-item img {
  max-width: 80px;
  border-radius: 10px;
  margin-right: 15px;
}

.content {
  flex: 1;
  min-width: 200px;
  margin: 0 20px;
}

.content p {
  margin: 0;
  color: #555;
  word-wrap: break-word;
}

.quantity-control {
  display: flex;
  align-items: center;
  margin-top: 10px;
}

.quantity-control button {
  padding: 5px 10px;
  border: none;
  background-color: #4caf50;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.quantity-control button:hover {
  opacity: 0.8;
}

.quantity-control span {
  margin: 0 10px;
  font-weight: bold;
}

.remove-button {
  background: transparent;
  color: #ff5252;
  border: none;
  cursor: pointer;
  font-size: 14px;
  font-weight: bold;
  padding: 5px;
}

.remove-button:hover {
  opacity: 0.8;
}

.cart-summary {
  flex: 1;
  min-width: 30%;
  background: #ffffff;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  max-width: 300px;
}

.cart-summary h2 {
  margin-bottom: 15px;
  color: #333;
}

.summary-section {
  margin-bottom: 10px;
  display: flex;
  justify-content: space-between;
  font-size: 1rem;
  color: #555;
}

.checkout-btn {
  width: 100%;
  padding: 10px;
  background-color: #4caf50;
  color: white;
  border-radius: 10px;
  border: none;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
}

.checkout-btn:hover {
  background-color: #45a049;
}

@media (max-width: 768px) {
  .cart-container {
    flex-direction: column;
  }

  .cart-items-container,
  .cart-summary {
    min-width: 100%;
    margin: 0;
  }

  .cart-item {
    flex-wrap: wrap;
    justify-content: flex-start;
  }

  .cart-summary {
    margin-top: 20px;
  }
}
</style>
