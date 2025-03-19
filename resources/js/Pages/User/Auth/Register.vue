<template>
    <div class="flex items-center justify-center h-screen">

        <div class="bg-gray-100 p-5 rounded-lg w-96">

            <h1 class="text-3xl text-center font-bold">Register</h1>

            <form @submit.prevent="store">

                <div class="mb-2">
                    <Input label="Full Name" type="text" v-model="formData.name" />
                    <p v-if="errors.name" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.name }}</p>
                </div>

                <div class="mb-2">
                    <Input label="Email" type="email" v-model="formData.email" />
                    <p v-if="errors.email" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.email }}</p>
                </div>

                <div class="mb-2">
                    <Input label="Password" type="password" v-model="formData.password" />
                    <p v-if="errors.password" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.password }}
                    </p>
                </div>

                <div class="mb-2">
                    <Input label="Phone Number" type="text" v-model="formData.phone_number" />
                    <p v-if="errors.phone_number" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                        errors.phone_number }}</p>
                </div>

                <div class="mb-2">
                    <label for="block mb-2 text-sm font-medium text-gray-900">Upload your image</label>
                    <input type="file" @input="formData.avatar = $event.target.files[0]"  class="outline outline-none rounded w-full p-1 file:bg-blue-600 hover:file:bg-blue-500 file:p-2 file:rounded-lg file:text-white file:outline-none file:border-0 file:cursor-pointer">
                </div>

                <div class="mb-2 flex flex-col items-center gap-y-1">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>

                    <div>
                        <span class="text-gray-500 text-sm dark:text-gray-400">You have an account. Please </span>
                        <Link class="text-blue-600 hover:text-blue-500 text-sm"
                            :href="route('user.auth.showLoginForm')">Login</Link>
                    </div>

                </div>

            </form>




        </div>


    </div>

</template>

<script setup>
defineProps({ errors: Object })
import {Link, useForm } from '@inertiajs/vue3'
import Input from '@/Components/Form/Input.vue'


const formData = useForm({
    name: '',
    email: '',
    password: '',
    phone_number: '',
    avatar:null

})

function store() {
    formData.post(route('user.auth.registerUser'))
}

</script>