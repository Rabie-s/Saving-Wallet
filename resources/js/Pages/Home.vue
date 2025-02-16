<template>
<h1>Welcome</h1>
<Link :href="route('about')">Home</Link>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
</script>