<template
  ><div>
    <header>Player name:{{ name }}</header>
    <header>Game id:{{ id }}</header>
    <p v-if="message !== undefined" class="danger">{{ message }}</p>
    <div class="board-main">
      <div class="board-help">
        <div class="board-item" id="a1" v-on:click="clicked">
          <p v-if="game.a1 === true">X</p>
        </div>
        <div class="board-item" id="a2" v-on:click="clicked">
          <p v-if="game.a2 === true">X</p>
        </div>
        <div class="board-item" id="a3" v-on:click="clicked">
          <p v-if="game.a3 === true">X</p>
        </div>
      </div>
      <div class="board-help">
        <div class="board-item" id="b1" v-on:click="clicked">
          <p v-if="game.b1 === true">X</p>
        </div>
        <div class="board-item" id="b2" v-on:click="clicked">
          <p v-if="game.b2 === true">X</p>
        </div>
        <div class="board-item" id="b3" v-on:click="clicked">
          <p v-if="game.b3 === true">X</p>
        </div>
      </div>
      <div class="board-help">
        <div class="board-item" id="c1" v-on:click="clicked">
          <p v-if="game.c1 === true">X</p>
        </div>
        <div class="board-item" id="c2" v-on:click="clicked">
          <p v-if="game.c2 === true">X</p>
        </div>
        <div class="board-item" id="c3" v-on:click="clicked">
          <p v-if="game.c3 === true">X</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
//import { mapState, mapMutations } from "vuex";
export default {
  data() {
    return {};
  },
  computed: {
    game() {
      return this.$store.getters.getCurrentGame;
    },
    message() {
      return this.$store.getters.getMessage;
    },
    name() {
      return this.$store.getters.getCurrentName;
    },
    id() {
      return this.$store.getters.getCurrentId;
    },
  },
  methods: {
    async clicked(event) {
      await this.$store.dispatch("playerMove", event.target.id);
      this.$store.dispatch("jsMove");
    },
  },
};
</script>
<style scoped>
.board-main {
  display: flex;
  flex-direction: column;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border: 2px solid black;
}
.board-help {
  display: flex;
  flex-wrap: wrap;
  width: 600px;
}
.board-item {
  box-sizing: border-box;
  border: 2px solid black;
  width: 200px;
  height: 200px;
}
.danger {
  color: red;
}
</style>
