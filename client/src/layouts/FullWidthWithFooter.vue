<template>
  <div class="flex-1 max-h-screen">
    <router-view></router-view>
  </div>

  <base-card>Footer</base-card>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "FullWidthWithAndFooter",
});
</script>

<style scoped></style>
