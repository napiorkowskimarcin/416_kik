<template>
  <div class="board-main">
    <div class="board-help">
      <div class="board-item" id="a1" v-on:click="clicked">1</div>
      <div class="board-item" id="a2" v-on:click="clicked">2</div>
      <div class="board-item" id="a3" v-on:click="clicked">3</div>
    </div>
    <div class="board-help">
      <div class="board-item" id="b1" v-on:click="clicked">4</div>
      <div class="board-item" id="b2" v-on:click="clicked">5</div>
      <div class="board-item" id="b3" v-on:click="clicked">6</div>
    </div>
    <div class="board-help">
      <div class="board-item" id="c1" v-on:click="clicked">7</div>
      <div class="board-item" id="c2" v-on:click="clicked">8</div>
      <div class="board-item" id="c3" v-on:click="clicked">9</div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {};
  },
  methods: {
    async clicked(event) {
      console.log(event.target.id);
      try {
        let response = await this.axios.post("http://localhost:8000/api/v1/", {
          id: "1",
        });
        console.log(response);
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
