<template>

    <div class="container mx-auto">
        <div class="flex gap-x-1 justify-end my-2">
            <Button @click="open = true" color="primary">Create new category</Button>

        </div>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="w-full border-collapse">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Title</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(category, index) in categories" :key="category.id"
                        class="border-b hover:bg-gray-100 transition">
                        <td class="px-6 py-4">{{ index + 1 }}</td>
                        <td class="px-6 py-4">{{ category.title }}</td>
                        <td class="px-6 py-4">
                            <button @click="destroy(category.id)"
                                class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <Modal @close="(n) => open = n" v-if="open">
            <div ref="modal" class="flex flex-col gap-y-3">
                <form @submit.prevent="createNewCategory">
                    <Input v-model="formData.title" label="Title" />
                    <div>
                        <label class="block text-sm font-medium text-gray-900">Type</label>
                        <select v-model="formData.type" class="w-full rounded-md p-2 bg-white" name="" id="">
                            <option value="income">Income</option>
                            <option value="expenses">Expenses</option>
                        </select>
                        <p v-if="errors.type" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.type }}
                        </p>
                    </div>
                    <Button type="submit" class="mt-2 w-full" color="primary">Make the category</Button>
                </form>

            </div>
        </Modal>
    </div>


</template>
<script setup>
defineProps({ errors: Object, categories: Object })
import Button from '@/Components/Form/Button.vue'
import Input from '@/Components/Form/Input.vue'
import Modal from '@/Components/Form/Modal.vue'
import { formatDate, onClickOutside } from '@vueuse/core';
import { useForm, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';
const open = ref(false)
const modal = ref(null)
onClickOutside(modal, () => (open.value = false))

const formData = useForm({
    title: '',
    type: null
})

function createNewCategory() {
    formData.post(route('user.category.store'), {
        onSuccess: () => {
            formData.reset()
            open.value = false
        }
    })
}

function destroy(id) {
    router.delete(route('user.category.destroy', id))
}

</script>
