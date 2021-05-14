<template>
  <div>Header</div>
  <div>Left Row</div>
  <div>
    <router-view></router-view>
  </div>
  <div>Right Row</div>
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
