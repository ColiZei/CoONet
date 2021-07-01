<template>
  <button @click="logoutClicked">Logout</button>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { mapActions } from "vuex";

export default defineComponent({
  name: "Logout",
  methods: {
    ...mapActions(["LOGOUT"]),
    logoutClicked() {
      this.LOGOUT();
      this.$router.replace({ name: "Login" });
    },
  },
});
</script>
