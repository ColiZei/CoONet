<template>
  <div>
    <router-view></router-view>
  </div>
  <div>Footer</div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "FullWidthWithAndFooter",
  data() {
    return {};
  },
});
</script>

<style scoped></style>
