<template>
  <div>
    <p>Welcome. Put your name please:</p>
    <p v-if="info.message !== undefined" class="danger">{{ info.message }}</p>
    <input type="text" id="input" />
    <div
      id="start"
      type="submit"
      value="start!"
      v-on:click="startGame"
      class="div"
    >
      <span class="p">START</span>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {};
  },
  computed: {
    game() {
      return this.$store.getters.getCurrentGame;
    },
    info() {
      return this.$store.getters.getInfo;
    },
  },
  methods: {
    async startGame() {
      console.log("clicked");
      const name = document.getElementById("input").value;
      await this.$store.dispatch("startGame", name);
    },
  },
};
</script>
<style scoped>
.p {
  display: inline-block;
  color: white;
  margin: 10px auto;
  padding: 13px;
  background-color: yellowgreen;
  transition: 0.4s;
}
.p:hover {
  background-color: rgb(95, 124, 36);
}

.danger {
  color: red;
}
</style>
