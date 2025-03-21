<template>
    <div class="flex justify-center items-center h-screen">
        
        <div class="p-5 bg-slate-200 md:m-auto md:w-1/3 rounded-sm space-y-3">
            <div class="flex justify-center">
                <img class="w-16 h-16 rounded-full" :src="user.avatar_image_url" alt="">
            </div>
            <Input v-model="userData.name" disabled label="Name"/>
            <Input v-model="userData.email" disabled label="Email"/>
            <Input v-model="userData.phone_number" disabled label="Phone Number"/>
            <Input v-model="userData.birthdate" disabled label="Birthdate"/>
        </div>

    </div>
</template>
<script setup>
const props = defineProps({user:Object})
import Button from '@/Components/Form/Button.vue'
import Input from '@/Components/Form/Input.vue'
import { useForm } from '@inertiajs/vue3'

const userData = useForm({
    name:props.user.name,
    email:props.user.email,
    phone_number:props.user.phone_number,
    birthdate:props.user.birthdate
})

</script>