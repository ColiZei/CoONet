<template>
  <div class="login">
    <vv-form @submit="submitForm">
      <vv-field
        type="email"
        name="email"
        placeholder="E-Mail-Adresse"
        rules="required|email"
        v-model.trim="email"
      />
      <vv-error name="email" />

      <vv-field
        type="password"
        name="password"
        placeholder="Passwort"
        rules="required"
        v-model.trim="password"
      />
      <vv-error name="password" />

      <button :disabled="isLoading">
        {{ isLoading ? "Loading..." : "Anmelden" }}
      </button>
    </vv-form>
  </div>
  <div class="error" v-if="!!error">{{ error }}</div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { Form, Field, ErrorMessage } from "vee-validate";

export default defineComponent({
  name: "Login",
  components: {
    "vv-form": Form,
    "vv-field": Field,
    "vv-error": ErrorMessage,
  },
  data() {
    return {
      email: "",
      password: "",
      error: "",
      isLoading: false,
    };
  },
  methods: {
    async submitForm() {
      console.log("submit!");

      this.isLoading = true;
      try {
        // ...
      } catch (err) {
        this.error = err;
      }

      this.isLoading = false;
    },
  },
});
</script>

<style scoped></style>
