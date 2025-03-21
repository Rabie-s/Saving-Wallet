<template>

    <div class="container mx-auto">
        <div class="flex gap-y-1 justify-center flex-col md:justify-end md:flex-row md:gap-x-1 mt-2 p-2">
            <Button class="w-full md:w-auto" @click="open = true" color="primary">Create new transaction</Button>
            <Link :href="route('user.category.index')">
            <Button class="w-full md:w-auto" color="primary">My categories</Button>
            </Link>
            <Link :href="route('user.transaction.index')">
            <Button class="w-full md:w-auto" color="primary">My transactions</Button>
            </Link>
        </div>


        <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-2 p-2">

            <div class="col-span-1 md:col-span-2 bg-blue-600 w-full p-6 rounded-lg">
                <div class="flex items-center justify-center h-full">
                    <span class="text-2xl text-white font-bold uppercase">My balance: {{ walletBalance }}</span>
                </div>
            </div>

            <div class="col bg-red-600 w-full p-6 rounded-lg">
                <div class="flex items-center justify-center h-full">
                    <span class="text-2xl text-white font-bold uppercase">Total of expenses: {{ totalExpenses }}</span>
                </div>
            </div>

            <div class="col bg-emerald-600 w-full p-6 rounded-lg">
                <div class="flex items-center justify-center h-full">
                    <span class="text-2xl text-white font-bold uppercase">Total of income: {{ totalIncome }}</span>
                </div>
            </div>

            <div class="col-span-1 md:col-span-2">

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
                            <tr v-for="(transaction, index) in userTransactions" :key="transaction.id"
                                class="border-b hover:bg-gray-100 transition">
                                <td class="px-6 py-4">{{ index + 1 }}</td>
                                <td class="px-6 py-4">{{ transaction.amount }}</td>
                                <td class="px-6 py-4">{{ transaction.type }}</td>
                                <td class="px-6 py-4">{{ transaction.created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="col-span-1">
                <div class="w-full">
                    <h1 class="text-center">Income VS Expenses</h1>
                    <BarChart :income="props.totalIncome" :expenses="props.totalExpenses"  />
                </div>
            </div>

        </div>


        <Modal @close="(n) => open = n" v-if="open">
            <div ref="modal" class="flex flex-col gap-y-3">
                <form @submit.prevent="createNewTransaction">

                    <Input type="number" v-model="formData.amount" label="Amount" />
                    <p v-if="errors.amount" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.amount }}</p>

                    <div>
                        <label class="block text-sm font-medium text-gray-900">Type</label>
                        <select v-model="formData.type" class="w-full rounded-md p-2 bg-white border border-gray-300">
                            <option value="income">Income</option>
                            <option value="expenses">Expenses</option>
                        </select>
                        <p v-if="errors.type" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.type }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900">Note</label>
                        <textarea v-model="formData.note"
                            class="w-full rounded-md p-2 bg-white border border-gray-300"></textarea>
                        <p v-if="errors.note" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.note }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900">Select a category</label>
                        <select v-model="formData.category_id"
                            class="w-full rounded-md p-2 bg-white border border-gray-300">
                            <option v-for="category in filteredCategories" :key="category.id" :value="category.id">
                                {{ category.title }}
                            </option>
                        </select>
                        <p v-if="errors.category_id" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                            errors.category_id }}</p>
                    </div>

                    <Button type="submit" class="mt-2 w-full" color="primary">Make the transaction</Button>
                </form>
            </div>
        </Modal>
    </div>


</template>

<script setup>
const props = defineProps({ walletBalance: Number, categories: Array, totalIncome: Number, totalExpenses: Number, userTransactions: Object, errors: Object })
import Button from '@/Components/Form/Button.vue'
import Input from '@/Components/Form/Input.vue'
import Modal from '@/Components/Form/Modal.vue';
import BarChart from '@/Components/BarChart.vue';
import { ref, computed } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import { onClickOutside } from '@vueuse/core';
const open = ref(false)
const modal = ref(null)
onClickOutside(modal, () => (open.value = false))



const categories = props.categories;
const formData = useForm({
    amount: 0,
    type: null,
    note: '',
    category_id: ''
})

const filteredCategories = computed(() => {
    return categories.filter(category => category.type === formData.type);

});

function createNewTransaction() {
    formData.post(route('user.createNewTransaction'), {
        onSuccess: () => {
            formData.reset()
            open.value = false
        },
    })
}


</script>