<template>
  <div>header</div>
  <div>
    <router-view></router-view>
  </div>
  <div>Footer</div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "FullWidthWithFooter",
  data() {
    return {};
  },
});
</script>

<style scoped></style>
