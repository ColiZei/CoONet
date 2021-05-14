<template>
  <div>
    <input type="text" name="username" placeholder="E-Mail-Adresse" />
    <input type="password" name="password" placeholder="Passwort" />
    <button>Anmelden</button>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  setup() {
    return {};
  },
});
</script>

<style scoped></style>
