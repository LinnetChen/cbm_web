require("./bootstrap");

import { createApp } from "vue";
import preregView from "./event/preregView.vue";

createApp({
    components: {
        "v-prereg": preregView,
    },
}).mount("#app");
