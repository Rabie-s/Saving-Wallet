<template>
    <Bar :data="chartData" :options="chartOptions" />
</template>
<script setup>
import { computed } from 'vue';
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend
} from 'chart.js';
import { Bar } from 'vue-chartjs';

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend);

const props = defineProps({ income: String, expenses: String })

const chartData = computed(() => ({
    labels: ['Income', 'Expense'],
    datasets: [
        {
            label: 'Amount ($)',
            backgroundColor: ['#4CAF50', '#FF5252'],
            borderColor: ['#388E3C', '#D32F2F'],
            borderWidth: 1,
            barThickness: 50,
            data: [Number(props.income), Number(props.expenses)]
        }
    ]
}));


</script>