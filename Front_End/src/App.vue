<template>
  <div>
    <h1>Customer Table</h1>
    <SearchBar v-model:searchQuery="search" />
    <CustomerTable :customers="paginatedCustomers" />
    <Pagination
      :currentPage="page"
      :totalPages="totalPages"
      @next="nextPage"
      @prev="prevPage"
    />
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import SearchBar from './components/SearchBar.vue'
import Pagination from './components/Pagination.vue'
import CustomerTable from './components/CustomerTable.vue'

const customers = ref([])
const search = ref('')
const page = ref(1)
const pageSize = 10

onMounted(async () => {
  const res = await fetch('/api/customers')
  const data = await res.json()

  customers.value = data.filter(c => c.status?.toLowerCase() === 'Active')
})

const filteredCustomers = computed(() => {
  const keyword = search.value.toLowerCase()
  
  return customers.value.filter(c =>
    Object.values(c).some(val =>
      String(val).toLowerCase().includes(keyword)
    )
  )
})

const totalPages = computed(() =>
  Math.ceil(filteredCustomers.value.length / pageSize)
)

const paginatedCustomers = computed(() =>
  filteredCustomers.value.slice((page.value - 1) * pageSize, page.value * pageSize)
)

function nextPage() {
  if (page.value < totalPages.value) page.value++
}

function prevPage() {
  if (page.value > 1) page.value--
}
</script>
