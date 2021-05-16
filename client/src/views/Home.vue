<template>
  <div class="home">
    HOME!
    <button @click="logoutClicked">Logout</button>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { mapActions } from "vuex";

export default defineComponent({
  name: "Home",
  computed: {},
  methods: {
    ...mapActions(["LOGOUT"]),
    logoutClicked() {
      this.LOGOUT();
    },
  },
});
</script>
