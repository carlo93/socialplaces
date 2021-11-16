<template>
    <div>
        <h2 class="text-center">Products List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="contact in contacts" :key="contact.id">
                <td>{{ contact.id }}</td>
                <td>{{ contact.name }}</td>
                <td>{{ contact.detail }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: contact.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteProduct(contact.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                contacts: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8888/api/contacts/')
                .then(response => {
                    this.contacts = response.data;
                });
        },
        methods: {
            deleteProduct(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/contacts/${id}`)
                    .then(response => {
                        let i = this.contacts.map(data => data.id).indexOf(id);
                        this.products.splice(i, 1)
                    });
            }
        }
    }
</script>