<template>
  <base-card>Header</base-card>
  <div class="flex">
    <base-card class="hidden lg:block w-96">Left Row</base-card>
    <div class="w-full">
      <router-view></router-view>
    </div>
    <base-card class="hidden lg:block w-96">Right Row</base-card>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "ThreeColumnsWithHeader",
  data() {
    return {};
  },
});
</script>

<style scoped></style>
