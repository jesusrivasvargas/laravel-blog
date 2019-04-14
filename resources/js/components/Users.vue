<template>
    <div>
        <div class="card mb-2" v-for="(user, index) in list" :key="user.id">
            <div class="card-body d-flex">
                
                <img class="mr-4 rounded-circle" height="80px" width="80px" :src="user.avatar">
                
                <div>
                    <h5 class="card-title"><a href="">{{ user.name }} {{ user.lastname }}</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ user.username }}</h6>
                    <p class="card-text">{{ user.category }} - {{ user.subcategory }}</p>
                
                </div>
                <div class="ml-auto">
                    <button @click="unfollow(index)" class="btn btn-primary btn-sm" v-if="user.followed">Siguiendo</button>
                    <button @click="follow(index)" class="btn btn-outline-primary btn-sm" v-else>Seguir</button>
                </div>
                
            </div>
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
                let url = '/api/users?page=' + this.page

                axios.get(url)
                .then(response => {
                    let posts = response.data

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
            },
            follow(index) {
                
                axios.post('/api/follow', {'follower_id': this.list[index].id})
                .then(response => {
                    console.log(response.data)
                    this.list[index].followed = true
                })
                .catch(error => {
                    console.log('error al seguir.')
                })
            },
            unfollow(index) {
                
                axios.post('/api/unfollow', {'follower_id': this.list[index].id})
                .then(response => {
                    console.log(response.data)
                    this.list[index].followed = false
                })
                .catch(error => {
                    console.log('error al dejar de seguir.')
                })
            }
        }
    }
</script>