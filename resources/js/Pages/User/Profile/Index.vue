<template>
    <div class="flex justify-center items-center h-screen">

        <div class="p-5 bg-slate-200 md:m-auto md:w-1/3 rounded-sm space-y-3">
            <div class="flex justify-center">
                <img class="w-16 h-16 rounded-full" :src="user.avatar_image_url" alt="">
            </div>
            <Input v-model="userData.name" disabled label="Name" />
            <Input v-model="userData.email" disabled label="Email" />
            <Input v-model="userData.phone_number" disabled label="Phone Number" />
            <Input v-model="userData.birthdate" disabled label="Birthdate" />

            <hr>
            <form @submit.prevent="changePassword">
                <div class="">
                    <Input v-model="newPassword.currentPassword" type="password" label="Current password" />
                    <p v-if="errors.currentPassword" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                        errors.currentPassword }}</p>
                </div>
                <div class="">
                    <Input v-model="newPassword.newPassword" type="password" label="New password" />
                    <p v-if="errors.newPassword" class="mt-1 text-sm text-red-600 dark:text-red-500">{{
                        errors.newPassword }}</p>
                </div>
                <Button type="submit" class="w-full my-2" color="primary">Change password</Button>
            </form>
        </div>

    </div>
</template>
<script setup>
const props = defineProps({ user: Object, errors: Object })
import Button from '@/Components/Form/Button.vue'
import Input from '@/Components/Form/Input.vue'
import { useForm } from '@inertiajs/vue3'

const userData = useForm({
    name: props.user.name,
    email: props.user.email,
    phone_number: props.user.phone_number,
    birthdate: props.user.birthdate
})

const newPassword = useForm({
    currentPassword: '',
    newPassword: '',
})

function changePassword() {
    newPassword.post(route('user.auth.changePassword'))
    newPassword.reset()
}

</script>