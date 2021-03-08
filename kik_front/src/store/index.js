import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    info: {
      message: undefined,
      id: undefined,
      name: undefined,
      isGameOver: undefined,
      win: undefined,
    },
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
    startGame(state, payload) {
      state.info.name = payload.name;
      state.info.id = payload.id;
      state.info.isGameOver = false;
    },
    addMessage(state, message) {
      state.info.message = message;
    },
    changeGame(state, payload) {
      const value = payload.value;
      const item = payload.item;

      switch (item) {
        case "a1":
          state.game.a1 = value;
          break;
        case "a2":
          state.game.a2 = value;
          break;
        case "a3":
          state.game.a3 = value;
          break;
        case "b1":
          state.game.b1 = value;
          break;
        case "b2":
          state.game.b2 = value;
          break;
        case "b3":
          state.game.b3 = value;
          break;
        case "c1":
          state.game.c1 = value;
          break;
        case "c2":
          state.game.c2 = value;
          break;
        case "c3":
          state.game.c3 = value;
      }
    },
    checkWin(state, value) {
      if (
        (state.game.a1 === value &&
          state.game.a2 === value &&
          state.game.a3 === value) ||
        (state.game.b1 === value &&
          state.game.b2 === value &&
          state.game.b3 === value) ||
        (state.game.c1 === value &&
          state.game.c2 === value &&
          state.game.c3 === value) ||
        (state.game.a1 === value &&
          state.game.b1 === value &&
          state.game.c1 === value) ||
        (state.game.a2 === value &&
          state.game.b2 === value &&
          state.game.c2 === value) ||
        (state.game.a3 === value &&
          state.game.b3 === value &&
          state.game.c3 === value) ||
        (state.game.a1 === value &&
          state.game.b2 === value &&
          state.game.c3 === value) ||
        (state.game.a3 === value &&
          state.game.b2 === value &&
          state.game.c1 === value)
      ) {
        switch (value) {
          case true:
            state.info.message = "Player won";
            state.info.isGameOver = true;
            state.info.win = true;
            break;
          case false:
            state.info.message = "Javascript random won";
            state.info.isGameOver = true;
            state.info.win = false;
            break;
        }
      }
    },
    checkIfAbleToContinueTheGame(state) {
      const game = state.game;
      const gameArray = Object.entries(game);
      const allowedTochoose = gameArray.filter(
        (dataRow) => dataRow[1] === undefined
      );
      if (!allowedTochoose.length) {
        state.info.isGameOver = true;
        state.info.message = "No one wins - draw";
      }
    },
  },
  actions: {
    async startGame(state, name) {
      if (name.length) {
        try {
          const response = await axios.post(
            "http://localhost:8000/api/v1/start",
            {
              name: name,
            }
          );
          const payload = { name: response.data.name, id: response.data.id };
          state.commit("startGame", payload);
        } catch (error) {
          console.log(error);
        }
      } else {
        state.commit(
          "addMessage",
          "name needs to have minimum lenght of one char"
        );
      }
    },
    async playerMove(state, payload) {
      const eventId = payload.eventId;
      const parentId = payload.parentId;
      if (parentId) {
        state.commit("addMessage", "select unselected one!");
        return;
      } else {
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
    async saveGameResult(state) {
      let info = state.getters.getInfo;
      try {
        await axios.post("http://localhost:8000/api/v1/saveGameResult", {
          result: info.win,
          id: state.getters.getCurrentId,
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
  modules: {},
  getters: {
    getCurrentGame: (state) => state.game,
    getCurrentId: (state) => state.info.id,
    getInfo: (state) => state.info,
  },
});
