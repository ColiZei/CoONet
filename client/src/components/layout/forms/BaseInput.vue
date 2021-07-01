<template>
  <input
    :class="{ 'border-red-500': error }"
    class="input"
    :placeholder="placeholder"
    :type="type"
  />
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    error: {
      type: Boolean,
      required: false,
      default: false,
    },
    disabled: {
      type: Boolean,
      required: false,
      default: false,
    },
    type: {
      type: String,
      required: false,
      default: "text",
    },
  },
});
</script>

<style scoped>
.input {
  @apply focus:border-green-300
      focus:ring-1
      focus:ring-green-300
      focus:outline-none
      text-sm
      text-black
      placeholder-gray-500
      focus:placeholder-gray-300
      rounded-md
      border
      py-2
      pl-4;
}
</style>
