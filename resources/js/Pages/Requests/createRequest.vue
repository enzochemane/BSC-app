<script setup>
import layout from '../../layouts/layout.vue';
import { useForm } from '@inertiajs/vue3'


defineOptions({layout: layout});
defineProps({
    user: String,
    manager: Array

})

const form = useForm({
    request_type: null,
    status: null,
    message: null,
    manager_id: null,
});

const submit = () => {
    form.post(route('request.store'));
};

</script>

<template>
  <div class="bg-gray-100 p-10" style="background: url(https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp); background-size: cover;min-height: calc(100vh - 64px);">

    <div class="w-1/2 mx-auto  p-6 bg-white shadow-lg rounded" >
       
 <h2 class="font-bold text-2xl">Request</h2>
        <form @submit.prevent="submit" class="flex flex-col">
            
           <span>Request Type</span>
            <select  v-model="form.request_type" class="p-2 border my-2 rounded" name="status" >
                 <option value="">Request Type</option>
                <option value="Sap Access">SAP Access</option>
                <option value="Access to internet">Access to internet</option>
                <option value="Desktop/Laptop">Desktop/Laptop</option>
                <option value="Printer">Printer</option>
                <option value="Access to Application">Access to Application</option>
                <option value="Office 365 Services">Office 365 Services</option>
            </select>
            <small class="text-red-500">{{form.errors.request_type}}</small>

            <span>Status</span>
            <select  v-model="form.status" class="p-2 border my-2 rounded" name="status" >
                 <option value="">status</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            
            </select>
            <small class="text-red-500">{{form.errors.status}}</small>
            
            <span>Additional Details</span>
            <textarea  v-model="form.message" class="border p-2 my-2 rounded" type="text" name="description"  rows="4" placeholder="Description"></textarea>
            <small class="text-red-500">{{form.errors.message}}</small>

            <span>Manager</span>
            <select v-model="form.manager_id" class="p-2 border my-2 rounded" name="manager_id">
                <option value="">Select Manager</option>
        <option v-for="manag in manager" :key="manag.id" :value="manag.id">
            {{ manag.name }}
        </option>
    </select>
            

            <button class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700" :disabled="form.processing">Open</button>

        </form>
    </div>
</div>
</template>