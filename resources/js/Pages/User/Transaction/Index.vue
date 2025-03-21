<template>

    <div class="container mx-auto">
        <div class="flex gap-x-1 justify-center md:justify-end  mt-2">
            <Link :href="route('user.wallet')">
            <Button color="primary">Get back</Button>
            </Link>
        </div>

        <h1 class="text-2xl text-center uppercase font-bold my-2">Last 5 transaction</h1>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="w-full border-collapse">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Amount</th>
                        <th class="px-6 py-3 text-left">Type</th>
                        <th class="px-6 py-3 text-left">Transaction date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(transaction, index) in userTransactions.data" :key="transaction.id"
                        class="border-b hover:bg-gray-100 transition">
                        <td class="px-6 py-4">{{ index + 1 }}</td>
                        <td class="px-6 py-4">{{ transaction.amount }}</td>
                        <td class="px-6 py-4">{{ transaction.type }}</td>
                        <td class="px-6 py-4">{{ transaction.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination Section -->
        <div v-if="userTransactions.links && userTransactions.links.length > 1"
            class="d-flex justify-content-center mt-4">
            <Pagination :links="userTransactions.links" />
        </div>
    </div>



</template>

<script setup>
defineProps({ userTransactions: Object })
import Button from '@/Components/Form/Button.vue'
import { Link } from '@inertiajs/vue3';
</script>