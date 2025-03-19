<template>
    <div>
      <Teleport to="body">
        <div class="fixed z-50 top-0 left-0 w-full overflow-auto h-[100%] bg-slate-950/70">
          <div class="flex items-center justify-center h-full">
  
            <div class="w-full m-5 md:m-auto md:w-1/3 p-5 bg-slate-200 rounded-sm">
  
              <div class="flex justify-end">
                <span @click="$emit('close', false)" class="text-lg font-extrabold cursor-pointer">X</span>
              </div>
  
              <slot />
            </div>
  
          </div>
        </div>
  
      </Teleport>
    </div>
  </template>
  
  <script setup>
  
  </script>