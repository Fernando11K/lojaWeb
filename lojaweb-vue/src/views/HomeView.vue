<script>
import Navbar from '../components/NavBar.vue';


export default {
  name: 'HomeView',
  components: {
    Navbar
  }
}

</script>

<template>
  <Navbar />
  <section>
    <h2>Home Teste Devops</h2>
  </section>
  <section class="produto container">
    <img src="https://picsum.photos/1000/250" alt="">
  </section>
</template>

<style scoped >

</style>
