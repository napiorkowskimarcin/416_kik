import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    message: undefined,
    id: undefined,
    name: undefined,
    isGame: undefined,
    game: {
      a1: undefined,
      a2: undefined,
      a3: undefined,
      b1: undefined,
      b2: undefined,
      b3: undefined,
      c1: undefined,
      c2: undefined,
      c3: undefined,
    },
  },
  mutations: {
    addMessage(state, message) {
      state.message = message;
    },
    changeGame(state, payload) {
      const value = payload.value;
      const item = payload.item;

      switch (item) {
        case "a1":
          if (state.game.a1 === undefined) {
            return (state.game.a1 = value);
          }
          state.message = "select other one!";
          break;
        case "a2":
          if (state.game.a2 === undefined) {
            return (state.game.a2 = value);
          }
          state.message = "select other one!";
          break;
        case "a3":
          if (state.game.a3 === undefined) {
            return (state.game.a3 = value);
          }
          state.message = "select other one!";
          break;
        case "b1":
          if (state.game.b1 === undefined) {
            return (state.game.b1 = value);
          }
          state.message = "select other one!";
          break;
        case "b2":
          if (state.game.b2 === undefined) {
            return (state.game.b2 = value);
          }
          state.message = "select other one!";
          break;
        case "b3":
          if (state.game.b3 === undefined) {
            return (state.game.b3 = value);
          }
          state.message = "select other one!";
          break;
        case "c1":
          if (state.game.c1 === undefined) {
            return (state.game.c1 = value);
          }
          state.message = "select other one!";
          break;
        case "c2":
          if (state.game.c2 === undefined) {
            return (state.game.c2 = value);
          }
          state.message = "select other one!";
          break;
        case "c3":
          if (state.game.c3 === undefined) {
            state.game.c3 = value;
          }
          state.message = "select other one!";
      }
    },
    startGame(state, payload) {
      state.name = payload.name;
      state.id = payload.id;
    },
  },
  actions: {
    async playerMove(state, payload) {
      let eventId = payload.eventId;
      let parentId = payload.parentId;
      console.log(parentId);
      if (parentId) {
        state.commit("addMessage", "select other one!");
        return;
      }
      const checkedIfAvailable = state.getters.getCurrentGame[eventId];
      console.log(checkedIfAvailable);
      try {
        const response = await axios.post("http://localhost:8000/api/v1/", {
          clicked: eventId,
          id: state.getters.getCurrentId,
          value: true,
        });

        const payload = { value: true, item: response.data.clicked };
        state.commit("changeGame", payload);
        state.commit("addMessage", undefined);
      } catch (error) {
        console.log(error);
      }
    },
    async jsMove(state) {
      const game = state.getters.getCurrentGame;
      const gameArray = Object.entries(game);
      const allowedTochoose = gameArray.filter(
        (dataRow) => dataRow[1] === undefined
      );
      const randomElement =
        allowedTochoose[Math.floor(Math.random() * allowedTochoose.length)][0];
      try {
        const response = await axios.post("http://localhost:8000/api/v1/", {
          clicked: randomElement,
          id: state.getters.getCurrentId,
          value: false,
        });
        const payload = { value: false, item: response.data.clicked };
        state.commit("changeGame", payload);
      } catch (error) {
        console.log(error);
      }
    },
  },
  modules: {},
  getters: {
    getCurrentId: (state) => state.id,
    getCurrentName: (state) => state.name,
    getCurrentGame: (state) => state.game,
    getMessage: (state) => state.message,
  },
});
