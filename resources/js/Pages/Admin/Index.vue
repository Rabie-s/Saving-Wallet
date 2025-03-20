<template>
    <div class="container mx-auto">

        <div class="m-5 p-5 bg-gray-100 shadow-lg rounded-md">
            <h1 class="text-3xl font-extrabold uppercase text-center">Users</h1>
        </div>


        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="w-full border-collapse">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Total income</th>
                        <th class="px-6 py-3 text-left">Total Expenses</th>
                        <th class="px-6 py-3 text-left">Wallet balance</th>
                        <th class="px-6 py-3 text-left">Registered date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users.data" :key="user.id"
                        class="border-b hover:bg-gray-100 transition">
                        <td class="px-6 py-4">{{ index + 1 }}</td>
                        <td class="px-6 py-4">{{ user.name }}</td>
                        <td class="px-6 py-4">{{ user.total_income }}</td>
                        <td class="px-6 py-4">{{ user.total_expenses }}</td>
                        <td class="px-6 py-4">{{ user.wallet.balance }}</td>
                        <td class="px-6 py-4">{{ user.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
        <div v-if="users.links && users.links.length > 1"
            class="d-flex justify-content-center mt-4">
            <Pagination :links="users.links" />
        </div>

    </div>
</template>

<script setup>
defineProps({ users: Object })
import Pagination from '@/Components/Pagination.vue';
</script>