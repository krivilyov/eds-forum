<template>
  <div id="app">
    <div class="container">
      <Navigation />
      <div class="wrapper">
        <router-view/>
      </div>
    </div>
  </div>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Navigation from '@/components/Navigation'

export default {
  components: {
    Navigation
  }
}
</script>

<style>
  #app {
    font-family: 'Roboto Condensed', sans-serif;
    color: #444;
  }

  .wrapper {
    padding: 40px 0 0;
  }
</style>