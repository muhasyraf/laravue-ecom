<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    product: {
        type: Object,
        default: () => ({}),
    },
    categories: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    name: props.product.name,
    category_id: props.product.category_id,
    description: props.product.description,
    price: props.product.price,
    
});

const destroy = (id) => {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('products.destroy', id));
    }
}

const submit = () => {
    form.put(route("products.update", props.product));
};
</script>

<template>
    <Head title="Edit"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Product</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 overflow-x-auto text-gray-900">
                <div class="flex flex-row gap-2">
                    <div class="flex flex-col gap-5">
                            <p>ID</p>
                            <p>Name</p>
                            <p>Category</p>
                            <p>Price</p>
                            <p>Description</p>
                            <p>Action</p>
                    </div>
                    <div class="flex flex-col gap-5">
                            <td>{{ props.product.id }}</td>
                            <td>
                                <input type="text" v-model="form.name" class="form-control" :class="{ 'is-invalid': form.errors.name }" />
                                <div class="invalid-feedback" v-if="form.errors.name" v-for="error in form.errors.name" :key="error">
                                    {{ error }}
                                </div>
                            </td>
                            <td>
                                <select v-model="form.category_id" class="form-control" :class="{ 'is-invalid': form.errors.category_id }">
                                    <option value="">Select Category</option>
                                    <option v-for="category in categories" :selected="props.product.category_id" :key="category.id" :value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <div class="invalid-feedback" v-if="form.errors.category_id" v-for="error in form.errors.category_id" :key="error">
                                    {{ error }}
                                </div>
                            </td>
                            <td>
                                <input type="text" v-model="form.price" class="form-control" :class="{ 'is-invalid': form.errors.price }" />
                                <div class="invalid-feedback" v-if="form.errors.price" v-for="error in form.errors.price" :key="error">
                                    {{ error }}
                                </div>
                            </td>
                            <td>
                                <input type="text" v-model="form.description" class="form-control" :class="{ 'is-invalid': form.errors.description }" />
                                <div class="invalid-feedback" v-if="form.errors.description" v-for="error in form.errors.description" :key="error">
                                    {{ error }}
                                </div>
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <button type="submit" @click="submit" :disabled="form.processing" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :class="{ 'opacity-25': form.processing }">
                                    Edit
                                </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="destroy(props.product.id)">Delete</button>
                            </td>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

