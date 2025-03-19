<template>
  <nav class="flex flex-col justify-center bg-blue-600 px-5 min-h-[46px] relative">
    <!-- Toggle Button for Mobile -->
    <span @click="toggleNav = !toggleNav" class="text-2xl text-white absolute right-5 cursor-pointer lg:hidden">
      {{ toggleNav ? '×' : '☰' }}
    </span>

    <!-- Navigation Content -->
    <div :class="{ 'hidden lg:flex': !toggleNav, 'flex': toggleNav }"
      class="flex-col lg:flex-row items-center justify-between w-full lg:w-auto lg:flex">
      <!-- Logo -->
      <h1 class="font-extrabold text-white text-[20px]">QuickMenu</h1>

      <!-- Navigation Links -->
      <div class="m-5 lg:m-0">
        <ul class="text-white flex flex-col lg:flex-row gap-x-5">
          <li>
            <Link href="/" class="font-medium text-[16px] cursor-pointer hover:text-gray-300">Home</Link>
          </li>
          <li>
            <Link href="#" class="font-medium text-[16px] cursor-pointer hover:text-gray-300">About</Link>
          </li>
          <li>
            <Link href="#" class="font-medium text-[16px] cursor-pointer hover:text-gray-300">Contact us</Link>
          </li>
        </ul>
      </div>


      <!-- Buttons -->
      <div class="flex gap-2 m-5 lg:m-0">

        <template v-if="!page.props.auth.user">
          <Link :href="route('user.auth.showLoginForm')">
          <Button color="white">Login</Button>
          </Link>

          <Link :href="route('user.auth.showRegistrationForm')">
          <Button color="white">Sign Up</Button>
          </Link>
        </template>

        <template v-if="page.props.auth.user">
          <Button color="white">
            <Link :href="route('user.wallet')">My wallet</Link>
          </Button>
          <Button @click="logout" color="white">Logout</Button>
        </template>

      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3';
import Button from '@/Components/Form/Button.vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const toggleNav = ref(false);

function logout(){
  router.post(route('user.auth.logoutUser'))
}

</script>