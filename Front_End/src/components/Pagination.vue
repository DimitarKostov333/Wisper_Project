<template>
  <div class="pagination">
    <button @click="$emit('prev')" :disabled="currentPage === 1">Prev</button>
    <span>Page {{ currentPage }} of {{ totalPages }}</span>
    <button @click="$emit('next')" :disabled="currentPage === totalPages">Next</button>
  </div>
</template>

<script setup>
defineProps(['currentPage', 'totalPages'])
</script>

<style scoped>
.pagination {
  margin-top: 20px;
}
</style>
