<template>
  <button
    class="btn"
    :class="{ 'btn-primary': primary, 'btn-secondary': !primary }"
    :type="type"
    :disabled="disabled"
  >
    <slot></slot>
  </button>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    primary: {
      type: Boolean,
      required: false,
      default: false,
    },
    secondary: {
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
      default: "submit",
    },
  },
});
</script>

<style scoped>
.btn {
  @apply px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-offset-2 focus:ring-green-500 focus:ring-opacity-50;
}

.btn-primary {
  @apply text-white bg-green-400 transform transition shadow-lg hover:bg-green-300 hover:-translate-y-0.5 active:bg-green-500;
}

.btn-secondary {
  @apply text-green-400 border border-green-400 hover:bg-green-100;
}
</style>
