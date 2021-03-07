<template
  ><div>
    <header>Player name:{{ info.name }}</header>
    <p v-if="info.message !== undefined" class="danger">{{ info.message }}</p>
    <div class="board-main">
      <div class="board-help">
        <div class="board-item" id="a1" v-on:click="clicked">
          <p v-if="game.a1 === true" class="blue">X</p>
          <p v-if="game.a1 === false">O</p>
        </div>
        <div class="board-item" id="a2" v-on:click="clicked">
          <p v-if="game.a2 === true" class="blue">X</p>
          <p v-if="game.a2 === false">O</p>
        </div>
        <div class="board-item" id="a3" v-on:click="clicked">
          <p v-if="game.a3 === true" class="blue">X</p>
          <p v-if="game.a3 === false">O</p>
        </div>
      </div>
      <div class="board-help">
        <div class="board-item" id="b1" v-on:click="clicked">
          <p v-if="game.b1 === true" class="blue">X</p>
          <p v-if="game.b1 === false">O</p>
        </div>
        <div class="board-item" id="b2" v-on:click="clicked">
          <p v-if="game.b2 === true" class="blue">X</p>
          <p v-if="game.b2 === false">O</p>
        </div>
        <div class="board-item" id="b3" v-on:click="clicked">
          <p v-if="game.b3 === true" class="blue">X</p>
          <p v-if="game.b3 === false">O</p>
        </div>
      </div>
      <div class="board-help">
        <div class="board-item" id="c1" v-on:click="clicked">
          <p v-if="game.c1 === true" class="blue">X</p>
          <p v-if="game.c1 === false">O</p>
        </div>
        <div class="board-item" id="c2" v-on:click="clicked">
          <p v-if="game.c2 === true" class="blue">X</p>
          <p v-if="game.c2 === false">O</p>
        </div>
        <div class="board-item" id="c3" v-on:click="clicked">
          <p v-if="game.c3 === true" class="blue">X</p>
          <p v-if="game.c3 === false">O</p>
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
    info() {
      return this.$store.getters.getInfo;
    },
  },
  methods: {
    async clicked(event) {
      const info = this.$store.getters.getInfo;
      if (info.isGameOver === false) {
        const toSend = {
          eventId: event.target.id,
          parentId: event.target.parentNode.id,
        };
        await this.$store.dispatch("playerMove", toSend);
        this.$store.commit("checkWin", true);
        this.$store.commit("checkIfAbleToContinueTheGame");
        if (!this.info.message) {
          await this.$store.dispatch("jsMove");
          this.$store.commit("checkWin", false);
        }
        if (this.info.win !== undefined) {
          await this.$store.dispatch("saveGameResult");
        }
      }
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
  background-color: #eee;
}

.board-item p {
  padding-top: 40px;
  margin-block-start: 0;
  margin-block-end: 0;
  height: 156px;
  font-size: 100px;
  color: magenta;
  background-color: rgba(0, 0, 0, 0);
}
.danger {
  color: red;
}

p.blue {
  color: dodgerblue;
}
</style>
