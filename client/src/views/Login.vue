<template>
  <div class="flex justify-center flex-col md:flex-row">
    <base-card transparent class="md:w-1/4">
      <h1 class="text-2xl font-black">Soziales Netzwerk!</h1>
      <span class="text-green-100 italic">Super cool hier!</span>
    </base-card>

    <base-card class="md:w-1/4">
      <div>
        <vv-form @submit="submitForm">
          <div>
            <vv-field
              name="email"
              rules="required|email"
              v-model.trim="email"
              v-slot="{ field, errors }"
            >
              <base-input
                :error="errors.length > 0"
                placeholder="E-Mail-Adresse"
                type="email"
                v-bind="field"
                class="w-full"
              />
              <div class="text-sm mt-2">
                <vv-error class="text-red-500" name="email" />
              </div>
            </vv-field>
          </div>

          <div class="pt-4">
            <vv-field
              rules="required"
              name="password"
              v-model.trim="password"
              v-slot="{ field, errors }"
            >
              <base-input
                :error="errors.length > 0"
                placeholder="Passwort"
                type="password"
                v-bind="field"
                class="w-full"
              />
              <div class="text-sm mt-2">
                <vv-error class="text-red-500" name="password" />
              </div>
            </vv-field>
          </div>

          <div class="error text-red-500" v-if="!!error">{{ error }}</div>

          <div class="pt-4">
            <base-button primary :disabled="isLoading" class="w-full">
              {{ isLoading ? "Loading..." : "Anmelden" }}
            </base-button>
          </div>
          <div class="pt-4">
            <base-button class="w-full">Neues Konto erstellen</base-button>
          </div>
        </vv-form>
        <div>{{ testVar }}</div>
      </div>
    </base-card>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { mapActions } from "vuex";
import { Form, Field, ErrorMessage } from "vee-validate";
import { useI18n } from "vue-i18n";

export default defineComponent({
  name: "Login",
  components: {
    "vv-form": Form,
    "vv-field": Field,
    "vv-error": ErrorMessage,
  },
  setup() {
    const { t } = useI18n();
    const testVar = t("message");
    return { testVar };
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
