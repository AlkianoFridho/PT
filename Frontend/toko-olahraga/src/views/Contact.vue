<template>
    <section class="contact" id="contact">
      <h1 class="heading"><span>contact</span> us</h1>
  
      <div class="row">
        <!-- Google Maps Iframe -->
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d587.4345273217282!2d112.58607795433866!3d-7.918794716452084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1732205469022!5m2!1sid!2sid"
          width="800"
          height="600"
          style="border: 0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
  
        <!-- Contact Form -->
        <form @submit.prevent="submitForm">
          <h3>Data Diri</h3>
          <div class="inputBox">
            <span class="fas fa-user"></span>
            <input
              type="text"
              v-model="form.name"
              placeholder="name"
              required
            />
          </div>
  
          <div class="inputBox">
            <span class="fas fa-envelope"></span>
            <input
              type="email"
              v-model="form.email"
              placeholder="email"
              required
            />
          </div>
  
          <div class="inputBox">
            <span class="fas fa-phone"></span>
            <input
              type="text"
              v-model="form.number"
              placeholder="number"
              required
            />
          </div>
          <input type="submit" value="submit" class="btn" />
        </form>
      </div>
    </section>
  </template>
  
  <script>
  export default {
    name: "ContactUs",
    data() {
      return {
        form: {
          name: "",
          email: "",
          number: "",
        },
      };
    },
    methods: {
      submitForm() {
    console.log("Form submitted", this.form);

    // Simulate sending form data to a server
    fetch('http://localhost:8000/api/users', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            name: this.form.name,
            email: this.form.email,
            number: this.form.number,
        }),
    })
    .then(response => response.json())
    .then(data => {
        // Assuming the server responds with a success message
        alert(`Thank you, ${this.form.name}. Your data has been submitted!`);
        // Reset form after successful submission
        this.form.name = "";
        this.form.email = "";
        this.form.number = "";
    })
    .catch(error => {
        console.error('Error:', error);
        alert('There was an error submitting the form. Please try again.');
    });
},
    },
  };
  </script>
  
  <style scoped>
  .contact {
    padding: 2rem;
    text-align: center;
  }
  
  .row {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    align-items: center;
    justify-content: center;
  }
  
  iframe {
    flex: 1 1 45rem;
    max-width: 100%;
    height: 400px;
  }
  
  form {
    flex: 1 1 45rem;
    padding: 2rem;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
  }
  
  h3 {
    margin-bottom: 1rem;
    font-size: 1.5rem;
  }
  
  .inputBox {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
  }
  
  .inputBox span {
    font-size: 1.5rem;
    margin-right: 1rem;
    color: #333;
  }
  
  .inputBox input {
    width: 100%;
    padding: 0.5rem;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .btn {
    display: inline-block;
    padding: 0.75rem 2rem;
    background-color: black;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    border-radius: 5px;
  }
  
  .btn:hover {
    background-color: #444;
  }
  </style>
  