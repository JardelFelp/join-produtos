<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" v-on:click="goToHome()">
      <img class="logo-join" src="@/assets/images/logo.png" alt="Logo Join" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <router-link to="/categorias" class="nav-link">Categorias</router-link>
        </li>
        <li class="nav-item active">
          <router-link to="/produtos" class="nav-link">Produtos</router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',

  methods: {
    goToHome() {
      if (this.$route.name !== 'Home') {
        this.$router.push({ name: 'Home' });
      }
    }
  }
}
</script>

<style lang="scss">
.navbar {
  .logo-join {
    height: 40px;
    margin-right: 50px;
    cursor: pointer;
  }
}
</style>