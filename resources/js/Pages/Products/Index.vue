<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";


const props = defineProps({
    products: {
        type: Array,
        default: () => [],
    },
    categories: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    name: '',
    category_id: '',
    description: '',
    price: '',
    
});

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('products.destroy', id));
    }
}

const submit = () => {
    form.post(route("products.store"));
};

</script>
<template>
    <Head title="Product" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 overflow-x-auto text-gray-900">
                <table class="table table-xs py-2">
                    <thead>
                        <tr class=" text-black">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in products" :key="product.id">
                            <td>{{ product.id }}</td>
                            <td>{{ product.name }}</td>
                            <td>{{ product.category.name }}</td>
                            <td>{{ product.price }}</td>
                            <td>{{ product.description }}</td>
                            <td>
                                <Link :href="route('products.edit', product)"><button class="btn btn-sm btn-primary" >Edit</button></Link>
                                <button class="btn btn-sm btn-danger" @click="destroy(product.id)">Delete</button>
                            </td>                   
                        </tr>
                    </tbody>
                </table>
                <form @submit.prevent="submit">
                    <table>
                        <tr>
                            <td><label for="name">Name</label></td>
                            <td><input type="text" id="name" v-model="form.name"></td>
                        </tr>
                        <tr>
                            <td><label for="category">Category</label></td>
                            <td>
                                <select id="category" v-model="form.category_id">
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="price">Price</label></td>
                            <td><input type="text" id="price" v-model="form.price"></td>
                        </tr>
                        <tr>
                            <td><label for="description">Description</label></td>
                            <td><input type="text" id="description" v-model="form.description"></td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn btn-success">Submit</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
