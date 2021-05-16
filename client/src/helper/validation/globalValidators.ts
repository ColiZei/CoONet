import { defineRule } from "vee-validate";

defineRule("required", (value: string): string | boolean => {
  if (!value || !value.length) {
    return "This field is required";
  }

  return true;
});

defineRule("email", (value: string): string | boolean => {
  if (!value || !value.length) {
    return true;
  }

  if (!/^[^@]+@\w+(\.\w+)+\w$/.test(value)) {
    return "This field must be a valid email";
  }

  return true;
});
