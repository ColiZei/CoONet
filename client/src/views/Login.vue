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
import { mapActions } from "vuex";
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
    ...mapActions(["LOGIN"]),
    async submitForm() {
      this.isLoading = true;
      try {
        await this.LOGIN({
          email: this.email,
          password: this.password,
        });

        this.$router.replace("/");
      } catch (err) {
        this.error = err;
      }

      this.isLoading = false;
    },
  },
});
</script>

<style scoped></style>
