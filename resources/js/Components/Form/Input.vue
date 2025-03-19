<template>

    <label class="block mb-2 text-sm font-medium text-gray-900">{{ props.label
        }}</label>
    <input v-bind="$attrs" :value="props.modelValue" @input="emit('update:modelValue', $event.target.value)"
        :type="props.type"
        class="w-full rounded-md p-2"
        :required="props.required" :disabled="props.disabled" :placeholder="props.placeholder" />

</template>
<script setup>
const props = defineProps({
    label: String,
    type: String,
    placeholder:String,
    required:{
        type:Boolean,
        default:true
    },
    disabled:{
        type:Boolean,
        default:false
    },
    modelValue: [String,Number,null]
})
const emit = defineEmits(['update:modelValue'])

</script>