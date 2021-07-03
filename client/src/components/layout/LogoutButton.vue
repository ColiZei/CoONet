<template>
  <button @click="logoutClicked">Logout</button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { useStore } from "vuex";
import { ActionTypes } from "@/store/modules/auth/action-types";
import { useRouter } from "vue-router";

export default defineComponent({
  name: "Logout",
  setup() {
    const store = useStore();
    const router = useRouter();

    const logoutClicked = () => {
      store.dispatch(ActionTypes.LOGOUT);
      router.replace({ name: "Login" });
    };
    return { logoutClicked };
  },
});
</script>
