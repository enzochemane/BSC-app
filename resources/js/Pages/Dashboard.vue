<script setup>
import layout from '../layouts/layout.vue';
import sideBar from '../layouts/sideBar.vue';
import PieChart from '../charts/PieChart.vue';
import { route } from '../../../vendor/tightenco/ziggy/src/js';


const props = defineProps({
  totalTickets: Number,
  openTickets: Number,
  closedTickets:Number,
  unassignedTickets: Number,
  totalUsers: Number,
  totalAgents: Number
});

const chartData = {
  labels: ['Open', 'closed', 'unassigned'],
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
      <sideBar class="w-64" />
     
      <!-- Content -->
      <div class="flex-1 p-4 bg-gray-50 dark:bg-gray-800">
        <h1 class="mt-2 text-2xl font-bold text-gray-700 dark:text-gray-200">Dashboard</h1>
        <hr class="h-2 bg-gray-300 border-0 my-6 rounded">
        <div class="p-4 sm:ml-6">
           <div class="p-4  border-white-200 shadow rounded-lg mt-1 ">
      <div class="grid grid-cols-4 gap-4 mb-4">

<!--card1-->
<div class="max-w-sm p-6 rounded-lg shadow bg-gray-100 border border-gray-300">
  
    <Link :href="route('tickets')">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Tickets: {{totalTickets}}</h5>
    </Link>
      <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
        See our guideline
        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
        </svg>
    </a>
</div>
      <!----------------------card2-------------------->
        <div class="max-w-sm p-6 border border-gray-300 rounded-lg shadow  bg-gray-100 ">
    
    <Link :href="route('users')">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-black">Agents: {{ totalAgents }}</h5>
    </Link>
     <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
        See our guideline
        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
        </svg>
    </a>
         </div>

<!-----------------card3-------------------->

         <div class="max-w-sm p-6 border border-gray-300 rounded-lg shadow bg-gray-100 ">
             
    <Link :href="route('tickets')">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-black ">Unassigned Tickets: {{ unassignedTickets }}</h5>
    </Link>
    <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline">
        See our guideline
        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
        </svg>
    </a>
</div>

   <!--------------------card4-------------------->
          <div class="max-w-sm p-6 border border-gray-300 rounded-lg shadow bg-gray-100 ">
    

    <a href="#">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900  ">Accounts: {{ totalUsers }}</h5>
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
<div class="grid grid-cols-2 gap-4 mb-4 ">
    
         <div class="flex items-center justify-center rounded-sm bg-gray-100 h-70 shadow border border-gray-300 ">
        <div class=" h-50 w-60 mx-auto">
        <PieChart :chartData="chartData" />
        </div>
         </div>
<!--chart bar-->
<!-- dark:bg-gray-800-->

         <div class="flex items-center justify-center rounded-sm h-70  border border-gray-300 bg-gray-100 shadow">
        <div class="h-50 w-60 mx-auto">
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