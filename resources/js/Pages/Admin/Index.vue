<template>
    <div class="container mx-auto">

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="w-full border-collapse">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Total income</th>
                        <th class="px-6 py-3 text-left">Total Expenses</th>
                        <th class="px-6 py-3 text-left">Wallet balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users" :key="user.id" class="border-b hover:bg-gray-100 transition">
                        <td class="px-6 py-4">{{ index + 1 }}</td>
                        <td class="px-6 py-4">{{ user.name }}</td>
                        <td class="px-6 py-4">{{ user.total_income }}</td>
                        <td class="px-6 py-4">{{ user.total_expenses }}</td>
                        <td class="px-6 py-4">{{ user.wallet.balance }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script setup>
defineProps({ users: Object })
</script>