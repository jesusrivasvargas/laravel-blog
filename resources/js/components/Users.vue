<template>
    <div>
        <div class="card mb-2" v-for="user in list" :key="user.id">
            <div class="card-body d-flex">
                <img class="mr-4" height="50px" width="50px" src="/img/avatar.png">
                <div>
                    <h5><a href="">{{ user.name }}</a></h5>
                    <span>{{ user.profile.subcategory.category.category }} - {{ user.profile.subcategory.subcategory }}</span>
                </div>
            </div>
        </div>

        <infinite-loading @distance="1" @infinite="infiniteHandler">
            <div slot="no-more">No hay más resultados.</div>
            <div slot="spinner">Cargando...</div>
            <div slot="no-results">Sin resultados</div>
        </infinite-loading>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                list: [],
                page: 0
            }
        },
        methods: {
            infiniteHandler($state) {
                this.page++
                let url = '/api/users?page=' + this.page

                axios.get(url)
                .then(response => {
                    let posts = response.data.data

                    if(posts.length){
                        this.list = this.list.concat(posts)
                        $state.loaded()
                    }else{
                        $state.complete()
                    }
                })
            },
            selected(v) {
                console.log(v)
            }
        }
    }
</script>