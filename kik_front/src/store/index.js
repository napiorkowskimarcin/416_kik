import { createStore } from "vuex";

export default createStore({
  state: {
    game: {
      id: 2,
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
  mutations: {},
  actions: {},
  modules: {},
  getters: {
    getCurrentGame: (state) => state.game,
  },
});
