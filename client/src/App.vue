<template>
  <div class="border min-h-screen flex flex-col">
    <component :is="layout"></component>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import ThreeColumnsWithHeader from "./layouts/ThreeColumnsWithHeader.vue";
import FullWidthWithFooter from "./layouts/FullWidthWithFooter.vue";
import FullWidthWithHeaderAndFooter from "./layouts/FullWidthWithHeaderAndFooter.vue";

import { mapActions, mapGetters } from "vuex";

export default defineComponent({
  name: "App",
  components: {
    "threecolumns-with-header": ThreeColumnsWithHeader,
    "fullwidth-with-footer": FullWidthWithFooter,
    "fullwidth-with-header-and-footer": FullWidthWithHeaderAndFooter,
  },
  watch: {
    didAutoLogout(currVal: boolean, oldVal: boolean) {
      if (currVal && currVal !== oldVal) {
        this.$router.replace({ name: "Login" });
      }
    },
  },
  computed: {
    ...mapGetters(["didAutoLogout"]),
    layout() {
      return this.$route.meta.layout || "threecolumns-with-header";
    },
  },
  methods: {
    ...mapActions(["AUTOLOGIN"]),
    autologin() {
      this.AUTOLOGIN();
    },
  },
  created() {
    this.autologin();
  },
});
</script>
