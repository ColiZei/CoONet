<template>
  <div>
    <component :is="layout"></component>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import ThreeColumnsWithHeader from "./layouts/ThreeColumnsWithHeader.vue";
import FullWidthWithFooter from "./layouts/FullWidthWithFooter.vue";
import FullWidthWithHeaderAndFooter from "./layouts/FullWidthWithHeaderAndFooter.vue";

import { mapActions } from "vuex";

export default defineComponent({
  name: "App",
  components: {
    "threecolumns-with-header": ThreeColumnsWithHeader,
    "fullwidth-with-footer": FullWidthWithFooter,
    "fullwidth-with-header-and-footer": FullWidthWithHeaderAndFooter,
  },
  methods: {
    ...mapActions(["AUTOLOGIN"]),
    autologin() {
      this.AUTOLOGIN();
    },
  },

  computed: {
    layout() {
      return this.$route.meta.layout || "threecolumns-with-header";
    },
  },
  created() {
    this.autologin();
  },
});
</script>
