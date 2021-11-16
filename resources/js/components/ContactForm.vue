<template>
    <div>
        <h3 class="text-center">Create Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
		                <label for="name">Name*</label>
		                <input type="text" id="name" name="name" v-model="name" class="form-control" value="" required>
		            </div>
		            <div class="form-group">
		                <label for="name">Email</label>
		                <input type="text" id="email" name="email" v-model="email" class="form-control" value="">
		            </div>
		            <div class="form-group">
		                <label for="gender">Gender</label>
		                <select name="gender" id="gender" v-model="gender" class="form-control">
		                        <option value="1">Male</option>
		                        <option value="2">Female</option>
		                </select>
		            </div>
		            <div class="form-group">
		                <label for="content">Content</label>
		                <textarea id="textarea" name="content" v-model="content" class="form-control "></textarea>
		            </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                product: {}
            }
        },
        methods: {
            addProduct() {
                this.axios
                    .post('http://localhost:8000/api/products', this.product)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>