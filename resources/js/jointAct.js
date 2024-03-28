require("./bootstrap");

import { createApp } from "vue";
import jointActView from "./event/jointActView.vue";

createApp({
    components: {
        "v-joint-act": jointActView,
    },
}).mount("#app");
