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

export default defineComponent({
  name: "App",
  components: {
    "threecolumns-with-header": ThreeColumnsWithHeader,
    "fullwidth-with-footer": FullWidthWithFooter,
    "fullwidth-with-header-and-footer": FullWidthWithHeaderAndFooter,
  },
  computed: {
    layout() {
      return this.$route.meta.layout || "ThreeColumnsWithHeader";
    },
  },
});
</script>
