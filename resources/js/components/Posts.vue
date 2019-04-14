<template>
    <div>
        <div class="card" v-for="post in list" :key="post.id">
            <h4>{{ post.body }}</h4>
        </div>

        <infinite-loading @distance="1" @infinite="infiniteHandler" spinner="spiral">
            <div slot="no-more">No hay más resultados.</div>
            
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
                let url = '/api/posts?page=' + this.page

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