<template>
  <div>
    <div v-if="game.name !== undefined">
      <TicTacToe />
    </div>
    <div v-else>
      <Welcome />
    </div>
  </div>
</template>

<script>
import TicTacToe from "./components/TicTacToe.vue";
import Welcome from "./components/Welcome.vue";

export default {
  name: "App",
  components: {
    TicTacToe,
    Welcome,
  },
  computed: {
    game() {
      return this.$store.getters.getCurrentGame;
    },
  },
};
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
