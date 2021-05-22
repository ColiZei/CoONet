<template>
  <base-card>Header</base-card>
  <div class="flex">
    <base-card>Left Row</base-card>
    <div>
      <router-view></router-view>
    </div>
    <base-card>Right Row</base-card>
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
