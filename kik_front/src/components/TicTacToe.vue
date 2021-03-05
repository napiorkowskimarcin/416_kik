<template
  ><div>
    <header>Player name:{{ game.name }}</header>
    <div class="board-main">
      <div class="board-help">
        <div class="board-item" id="a1" v-on:click="clicked">
          {{ game.a1 }}
        </div>
        <div class="board-item" id="a2" v-on:click="clicked">
          {{ game.a2 }}
        </div>
        <div class="board-item" id="a3" v-on:click="clicked">
          {{ game.a3 }}
        </div>
      </div>
      <div class="board-help">
        <div class="board-item" id="b1" v-on:click="clicked">
          {{ game.b1 }}
        </div>
        <div class="board-item" id="b2" v-on:click="clicked">
          {{ game.b2 }}
        </div>
        <div class="board-item" id="b3" v-on:click="clicked">
          {{ game.b3 }}
        </div>
      </div>
      <div class="board-help">
        <div class="board-item" id="c1" v-on:click="clicked">
          {{ game.c1 }}
        </div>
        <div class="board-item" id="c2" v-on:click="clicked">
          {{ game.c1 }}
        </div>
        <div class="board-item" id="c3" v-on:click="clicked">
          {{ game.c1 }}
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
  },
  methods: {
    async clicked(event) {
      console.log(event.target.id);
      console.log(this.game.id);
      try {
        let response = await this.axios.post("http://localhost:8000/api/v1/", {
          clicked: event.target.id,
          id: this.game.id,
        });
        console.log(response.data);
      } catch (error) {
        console.log(error);
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
}
</style>
