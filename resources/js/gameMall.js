require("./bootstrap");


import { createApp } from "vue";
import gameMallView from "./event/gameMallView.vue";


createApp({
    components: {
        "v-game-mall": gameMallView,
    },
}).mount("#app");