<template>
  <table>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address Line 1</th>
        <th>Address Line 2</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="customer in customers" :key="customer.email">
        <td>{{ customer.first_name }}</td>
        <td>{{ customer.last_name }}</td>
        <td>{{ customer.address_line_one }}</td>
        <td>{{ customer.address_line_two }}</td>
        <td>{{ customer.city }}</td>
        <td>{{ customer.state }}</td>
        <td>{{ customer.zip }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script setup>
defineProps(['customers'])
</script>
