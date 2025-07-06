<script setup>
import { Pie } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  ArcElement
} from 'chart.js'
import { color } from 'chart.js/helpers'

ChartJS.register(Title, Tooltip, Legend, ArcElement)

const props = defineProps({
  chartData: Object
})

const options = {
  responsive: true,
  plugins: {
    legend: {
      position: 'bottom'
      
    },
    title: {
      display: true,
      text: 'Tickets',
      
    }
  }
}
</script>

<template>
  <Pie :data="chartData" :options="options" />
</template>
