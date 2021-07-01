<template>
  <div
    class="p-4 m-4"
    :class="{ 'card-white': !transparent, 'card-transparent': transparent }"
  >
    <slot></slot>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    transparent: {
      type: Boolean,
      required: false,
      default: false,
    },
  },
});
</script>

<style scoped>
.card-white {
  @apply bg-white shadow-lg rounded-lg;
}
.card-transparent {
  @apply text-white;
}
</style>
