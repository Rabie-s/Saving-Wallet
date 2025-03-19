<template>

    <button v-bind="$attrs" v-if="props.color === 'primary'" class="bg-blue-600 hover:bg-blue-500 active:bg-[#265BB3] cursor-pointer
       text-white h-[30px] min-w-[93px] text-center rounded-md px-2"><slot/></button>
  
    <button v-bind="$attrs" v-if="props.color === 'secondary'" class=" bg-emerald-500
        hover:bg-emerald-400 active:bg-[#049B74] cursor-pointer
       text-white h-[30px] min-w-[93px] text-center rounded-md px-2"><slot/></button>
  
    <button v-bind="$attrs" v-if="props.color === 'danger'" class="bg-red-600
        hover:bg-red-500 active:bg-[#C34D24] cursor-pointer
       text-white h-[30px] min-w-[93px] text-center rounded-md px-2"><slot/></button>
  
  
       <button v-bind="$attrs" v-if="props.color === 'white'" class="bg-white
        hover:bg-[#e9e9e9] active:bg-[#dedede] cursor-pointer
       text-black h-[30px] min-w-[93px] text-center rounded-md px-2"><slot/></button>
  
  </template>
  
  <script setup>
  const props = defineProps({
    color: {
      type: String,
      default: 'primary'
    }
  })
  </script>