<template>
  <base-card>header</base-card>
  <div>
    <router-view></router-view>
  </div>
  <base-card>Footer</base-card>
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
