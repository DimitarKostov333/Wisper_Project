<template>
  <input
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    placeholder="Search customers..."
  />
</template>

<script setup>
defineProps(['modelValue'])
defineEmits(['update:modelValue'])
</script>

<style scoped>
input {
  margin-bottom: 10px;
  padding: 8px;
  width: 300px;
  font-size: 16px;
}
</style>
