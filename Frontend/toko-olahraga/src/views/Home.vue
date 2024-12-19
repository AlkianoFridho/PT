<template>
  <section class="home" id="home">
    <div class="content">
      <h3>Olahraga untuk semua</h3>
      <router-link to="/product" class="btn" style="background-color: black; margin-top: 20px;">Pilih Barangmu!</router-link>
    </div>
  </section>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style scoped>
/* Add your styles here */
.home{
    min-height: 130vh;
    display: flex;
    align-items: center;
    background: url(../images/background.jpg) no-repeat;
    background-size:cover;
    background-position: center;
    padding-top:1rem ;
}


  
.home .content{
    max-width: 60rem;
}
.home .content h3{
    font-size: 6rem;
    text-transform: uppercase;
    color: hsla(0, 0%, 100%, 0.975);
}
.home .content p{
    font-size: 2rem;
    font-weight: lighter;
    line-height: 1.8;
    padding: 1rem 0;
    color: #eee;
}

.horizontal-images {
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 30px;
    margin-bottom: 50px;
}

/* Styles for each horizontal image */
.horizontal-image {
    width: 30%; /* Adjust the width as needed */
    border-radius: 8px;
    /* Add more styling properties as per your requirements */
}
</style>