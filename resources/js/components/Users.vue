<template>
    <div>
        <user v-for="user in list" :key="user.id" :user="user"></user>
        

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
                page: 0,
                btnTexts: ['Siguiendo', 'Dejar de seguir'],
                i: 0
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