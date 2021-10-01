<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText"></button>

    </div>
</template>


<script>
import {isEmpty} from "lodash/lang";

export default {
    props: ['userId','follows'],
    mounted() {
        console.log('Component mounted.')
    },

    data: function (){
        return {
            status:this.follows
        }
    },

    methods:{
        followUser(){
            axios.post("/follow/"+this.userId)
                .then(res => {
                    console.log("STATUS > ", res.data)
                    this.status = parseInt(this.status) === 1 ? -1 : 1;
                }).catch(err => {
                console.log(err)
                if(err.response.status == 401){
                    window.location = '/login'
                }
            })
        }
    },
    computed: {
        buttonText() {

            console.log("STatus btn > ", this.status);
            return (this.status >= 0 ) ? 'Unfollow' : 'Follow';
        }
    }
}
</script>
