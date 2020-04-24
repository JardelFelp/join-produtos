<template>
  <div id="app">
    <DefaultTemplate>
      <router-view/>
    </DefaultTemplate>
  </div>
</template>

<script>
import DefaultTemplate from '@/components/templates/DefaultTemplate'

export default {
  name: 'App',  

  components: {
    DefaultTemplate,
  },
}
</script>

<style lang="scss">
@import './assets/sass/index.scss';

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>