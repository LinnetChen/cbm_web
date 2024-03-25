require("./bootstrap");

import { createApp } from "vue";
import preregView from "./event/preregView.vue";
import jointActView from "./event/jointActView.vue";

createApp({
    components: {
        "v-prereg": preregView,
        "v-joint-act": jointActView,
    },
}).mount("#app");

