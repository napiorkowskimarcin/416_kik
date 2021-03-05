import { createStore } from "vuex";

export default createStore({
  state: {
    game: {
      id: 3,
      name: "marcin",
      isGame: undefined,
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
    changeGame(state, payload) {
      let value = payload.value;
      let item = payload.item;

      if (item === "a1") {
        if (state.game.a1 === undefined) {
          state.game.a1 = value;
        }
      }
      if (item === "a2") {
        if (state.game.a2 === undefined) {
          state.game.a2 = value;
        }
      }
      if (item === "a3") {
        if (state.game.a3 === undefined) {
          state.game.a3 = value;
        }
      }
      if (item === "b1") {
        if (state.game.b1 === undefined) {
          state.game.b1 = value;
        }
      }
      if (item === "b2") {
        if (state.game.b2 === undefined) {
          state.game.b2 = value;
        }
      }
      if (item === "b3") {
        if (state.game.b3 === undefined) {
          state.game.b3 = value;
        }
      }
      if (item === "c1") {
        if (state.game.c1 === undefined) {
          state.game.c1 = value;
        }
      }
      if (item === "c2") {
        if (state.game.c2 === undefined) {
          state.game.c2 = value;
        }
      }
      if (item === "c3") {
        if (state.game.c3 === undefined) {
          state.game.c3 = value;
        }
      }
    },
  },
  actions: {},
  modules: {},
  getters: {
    getCurrentGame: (state) => state.game,
  },
});
