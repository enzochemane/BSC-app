<script setup>
import layout from '../../layouts/layout.vue';
import { useForm } from '@inertiajs/vue3'


defineOptions({layout: layout});
defineProps({
    user: String
})

const form = useForm({
    type:null,
    status:null,
    description:null,
    
});

/*const submit = () => {
    form.post(route('requests.store'));
};*/

</script>

<template>
  <div class="bg-gray-100 p-10" style="background: url(https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp); background-size: cover;min-height: calc(100vh - 64px);">

    <div class="w-1/2 mx-auto  p-6 bg-white shadow-lg rounded" >
       
 <h2 class="font-bold text-2xl">Request Edit</h2>
        <form @submit.prevent="submit" class="flex flex-col">
            
           <span>Request Type</span>
            <select  v-model="form.type" class="p-2 border my-2 rounded" name="status" >
                 <option value="">Request Type</option>
                <option value="Sap Access">SAP Access</option>
                <option value="Access to internet">Access to internet</option>
                <option value="Desktop/Laptop">Desktop/Laptop</option>
                <option value="Printer">Printer</option>
                <option value="Access to Application">Access to Application</option>
                <option value="Office 365 Services">Office 365 Services</option>
            </select>
            <small class="text-red-500">{{form.errors.type}}</small>

            <span>Status</span>
            <select  v-model="form.status" class="p-2 border my-2 rounded" name="status" >
                 <option value="">status</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            
            </select>
            <small class="text-red-500">{{form.errors.status}}</small>
            
            <span>Additional Details</span>
            <textarea  v-model="form.description" class="border p-2 my-2 rounded" type="text" name="description"  rows="4" placeholder="Description"></textarea>
            <small class="text-red-500">{{form.errors.description}}</small>
            

            <button class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700" :disabled="form.processing">Open</button>

        </form>
    </div>
</div>
</template>