<template>
  <DateForm msg="insira os horários"/>
</template>

<script>
import DateForm from './components/DateForm.vue';

export default {
  name: 'App',
  components: {
    DateForm
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
