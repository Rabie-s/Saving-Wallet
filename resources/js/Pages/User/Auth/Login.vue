<template>
    <div class="flex items-center justify-center h-screen">

        <div class="bg-gray-100 p-5 rounded-lg w-96">

            <h1 class="text-3xl text-center font-bold">Login</h1>

            <form @submit.prevent="login">


                <div class="mb-2">
                    <Input label="Email" type="email" v-model="formData.email" />
                    <p v-if="errors.email" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.email }}</p>
                </div>

                <div class="mb-2">
                    <Input label="Password" type="password" v-model="formData.password" />
                    <p v-if="errors.password" class="mt-1 text-sm text-red-600 dark:text-red-500">{{ errors.password }}
                    </p>
                </div>


                <div class="mb-2 flex flex-col items-center gap-y-1">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>


                </div>

            </form>




        </div>


    </div>

</template>

<script setup>
defineProps({ errors: Object })
import {  useForm } from '@inertiajs/vue3'
import Input from '@/Components/Form/Input.vue'


const formData = useForm({
    email: '',
    password: '',
})

function login() {
    formData.post(route('user.auth.loginUser'))
}

</script>