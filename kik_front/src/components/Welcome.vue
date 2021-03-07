<template>
  <div>
    <p>Welcome. Put your name please:</p>
    <p v-if="message !== undefined" class="danger">{{ message }}</p>
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
    message() {
      return this.$store.getters.getMessage;
    },
  },
  methods: {
    async startGame() {
      const name = document.getElementById("input").value;

      if (name) {
        try {
          const response = await this.axios.post(
            "http://localhost:8000/api/v1/start",
            {
              name: name,
            }
          );
          const payload = { name: response.data.name, id: response.data.id };
          this.$store.commit("startGame", payload);
        } catch (error) {
          console.log(error);
        }
      } else {
        this.$store.commit(
          "addMessage",
          "name needs to have minimum lenght of one char"
        );
      }
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
