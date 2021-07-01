<template>
  <base-card class="flex">
    <div>Header</div>
    <div class="flex-grow"></div>
    <div><logout-button></logout-button></div>
  </base-card>
  <div class="flex">
    <base-card class="hidden lg:block w-96">Left Row</base-card>
    <div class="w-full">
      <router-view></router-view>
    </div>
    <base-card class="hidden lg:block w-96">Right Row</base-card>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import LogoutButton from "@/components/layout/LogoutButton.vue";

export default defineComponent({
  name: "ThreeColumnsWithHeader",
  components: {
    LogoutButton,
  },
  data() {
    return {};
  },
});
</script>

<style scoped></style>
