<template>
    <div>
        <div class="form-group">
            <label>Campo laboral</label>
            <select class="form-control" @change="onChange($event)">
                <option v-for="c in categories" 
                    :key="c.id" 
                    :value="c.id" >{{ c.category }}</option>
            </select>
        </div>
        <div class="form-group">
            <label>Subcampo laboral</label>
            <select class="form-control" name="subcategory_id">
                <option v-for="c in subcategories" 
                    :key="c.id" 
                    :value="c.id" >{{ c.subcategory }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                subcategories: [],
                category_id: ''
            }
        },
        mounted() {
            this.getCategories()
        },
        methods: {
            onChange(event) {
                this.category_id = event.target.value
                this.getSubCategories()
            },
            getCategories() {                
                axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data  
                    if (this.categories.length > 0) {
                        this.category_id = this.categories[0].id
                        this.getSubCategories()
                    }
                })
                .catch(error => {
                    console.log('Ha ocurrido un error al obtener los datos.')
                });
            },
            getSubCategories() {                
                axios.get('/api/subcategories?category_id=' + this.category_id)
                .then(response => {
                    this.subcategories = response.data  
                })
                .catch(error => {
                    console.log('Ha ocurrido un error al obtener los datos.')
                });
            },
        }
    }
</script>