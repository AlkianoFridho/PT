<template>
  <section class="menu" id="menu">
    <h1 class="heading" style="margin-top: 100px;">our <span>products</span></h1>
    <div class="box-container">
      <div class="box" v-for="product in products" :key="product.id">
        <img :src="product.image" :alt="product.name" />
        <div class="name">{{ product.name }}</div>
        <div class="price">
          Rp.{{ product.price.toLocaleString() }} <span>Rp.{{ product.originalPrice.toLocaleString() }}</span>
        </div>
        <button class="btn" @click="addToCart(product)">add to cart</button>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      products: [
        { id: 1, name: "Nike Mercurial", price: 700000, originalPrice: 1500000, image: "images/mercurial.png" },
        { id: 2, name: "Ortuseight Jogosala", price: 450000, originalPrice: 800000, image: "images/jogosala.png" },
        { id: 3, name: "Specs Lightspeed", price: 666000, originalPrice: 1200000, image: "images/specslightspeed.png" },
        { id: 4, name: "Nike Vapor 16", price: 650000, originalPrice: 1250000, image: "images/nikevapor16.png" },
        { id: 5, name: "Nike Phantom", price: 1350000, originalPrice: 1675000, image: "images/Phantom.png" },
        { id: 6, name: "Puma Ultra", price: 1245000, originalPrice: 1700000, image: "images/pumaultra.png" },
        { id: 7, name: "Adidas Predator", price: 1345000, originalPrice: 1540000, image: "images/predator.png" },
      ],
    };
  },
  methods: {
    methods: {
   async addToCart(product) {
        try {
            // Ambil data cart dari local storage
            const cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Periksa apakah produk sudah ada di cart
            const existingProduct = cart.find(item => item.id === product.id);
            if (existingProduct) {
                // Jika sudah ada, tambahkan quantity
                existingProduct.quantity += 1;
            } else {
                // Jika belum ada, tambahkan produk ke cart
                cart.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    image: product.image,
                    quantity: 1, // Set default quantity
                });
            }

            // Simpan kembali ke local storage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Emit event untuk memperbarui status cart
            this.$emit("cartUpdated");

            // Beri notifikasi kepada pengguna
            alert(`${product.name} added to cart!`);
        } catch (error) {
            console.error('Error adding to cart:', error);
            alert('Failed to add product to cart');
        }
    },
},

  },
};
</script>

<style scoped>
@import url('../assets/style.css');
.menu .box-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
}
.menu .box-container .box {
  padding: 2rem;
  text-align: center;
  border: 1px solid #ccc;
  background: #f9f9f9;
  border-radius: 10px;
}
.menu .box-container .box img {
  height: 150px;
  object-fit: cover;
  border-radius: 10px;
}
.menu .box-container .box .price {
  margin: 1rem 0;
  font-size: 1.2rem;
}
.menu .box-container .box .price span {
  font-size: 0.9rem;
  text-decoration: line-through;
  color: #888;
}
.menu .box-container .box:hover {
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transform: scale(1.05);
}
</style>
