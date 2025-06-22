<script setup>
import layout from '../layouts/layout.vue';
import sideBar from '../layouts/sideBar.vue';
import PieChart from '../charts/PieChart.vue';


const props = defineProps({
  totalTickets: Number,
  openTickets: Number,
  closedTickets:Number,
  unassignedTickets: Number,
  totalUsers: Number,
  totalAgents: Number
});

const chartData = {
  labels: ['Abertos', 'Fechados', 'Sem Agente'],
  datasets: [
    {
      label: 'Tickets',
      data: [props.openTickets, props.closedTickets, props.unassignedTickets],
      backgroundColor: ['#3b82f6', '#16a34a', '#f59e0b']
    }
  ]
}
</script>

<template>
  <div class="flex flex-col min-h-screen">
    
    <!-- Navbar -->

    <div class="flex flex-1">
      <!-- Sidebar -->
      <sideBar class="w-64 bg-gray-800 text-white" />
     
      <!-- Content -->
      <div class="flex-1 p-4 bg-white">
        <h1 class="mt-2 text-2xl font-bold text-gray-700">Dashboard</h1>
        <hr class="h-2 bg-gray-400 border-0 my-6 rounded">
        <div class="p-4 sm:ml-10">
           <div class="p-4  border-white-200 shadow rounded-lg mt-1">
      <div class="grid grid-cols-4 gap-4 mb-4">

<!--card1-->
<div class="max-w-sm p-6 border-gray-200 rounded-lg shadow bg-gray-100 dark:border-gray-700">
  
    <a href="#">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Tickets: {{totalTickets}}</h5>
    </a>
      <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
        See our guideline
        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
        </svg>
    </a>
</div>
      <!----------------------card2-------------------->
        <div class="max-w-sm p-6  border-gray-200 rounded-lg shadow  bg-gray-100 ">
    
    <a href="#">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-black">Agents: {{ totalAgents }}</h5>
    </a>
     <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
        See our guideline
        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
        </svg>
    </a>
         </div>

<!-----------------card3-------------------->

         <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
             
    <a href="#">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Not assign Tickets: {{ unassignedTickets }}</h5>
    </a>
    <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
        See our guideline
        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
        </svg>
    </a>
</div>

   <!--------------------card4-------------------->
          <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    

    <a href="#">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Accounts: {{ totalUsers }}</h5>
    </a>
    <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
        See our guideline
        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
        </svg>
    </a>
</div>

      </div>
    <!--Abaixo dos cards-->
    <!--chart pie-->
<div class="grid grid-cols-2 gap-4 mb-4">
    
         <div class="flex items-center justify-center rounded-sm bg-gray-100 h-70">
        <div class=" h-40 w-60 mx-auto">
        <PieChart :chartData="chartData" />
        </div>
         </div>
<!--chart bar-->
         <div class="flex items-center justify-center rounded-sm bg-gray-50 h-70  dark:bg-gray-800">
        <div class="h-50 w-40 mx-auto">
        <PieChart :chartData="chartData" />
        </div>
         </div>
          </div>
<!------------------------------------------------------------------------>
       
        </div>
          </div>
      </div>

    </div>
    
  </div>
</template>