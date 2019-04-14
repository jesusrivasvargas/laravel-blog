<template>
    <div class="card mb-2">
            <div class="card-body d-flex">
                
                <img class="mr-4 rounded-circle" height="80px" width="80px" :src="user.avatar">
                
                <div>
                    <h5 class="card-title"><a :href="user.url">{{ user.name }} {{ user.lastname }}</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ user.username }}</h6>
                    <p class="card-text">{{ user.category }} - {{ user.subcategory }}</p>
                
                </div>
                <div class="ml-auto">
                    <button @click="unfollow" class="btn  btn-sm"
                        v-if="followed" :class="hoverClass[i]"
                        @mouseover="i = 1"
                        @mouseleave="i = 0">{{btnTexts[i]}}</button>
                    <button @click="follow" 
                        class="btn btn-outline-primary btn-sm" v-else>Seguir</button>
                </div>
                
            </div>
        </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                followed: this.user.followed,
                btnTexts: ['Siguiendo', 'Dejar de seguir'],
                i: 0,
                hoverClass: ['btn-primary', 'btn-danger']
            }
        },
        methods:{
            follow() {                
                axios.post('/api/follow', {'follower_id': this.user.id})
                .then(response => {
                    console.log(response.data)
                    this.followed = true
                })
                .catch(error => {
                    console.log('error al seguir.')
                })
            },
            unfollow() {                
                axios.post('/api/unfollow', {'follower_id': this.user.id})
                .then(response => {
                    console.log(response.data)
                    this.followed = false
                })
                .catch(error => {
                    console.log('error al dejar de seguir.')
                })
            }
        }
    }
</script>