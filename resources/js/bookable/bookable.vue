<template>
<div>
    <div class="row">
        <div  v-if ="!loading" class="col-md-8">
            <div class="card">
        
            <div class="card-body">
            <h5 class="card-title">{{bookable.title}}</h5>
            <p class="card-text">{{bookable.content}}</p>
            <router-link :to="{name:'home'}" class="btn btn-primary">Go Home</router-link> 
            <review :bookable-id="this.$route.params.id"></review>
             </div>
        </div>
        </div>
        <div class="col-md-8" v-else> loading</div>
        <div class="col-md-4">
          <availability :bookable-id="this.$route.params.id"></availability>
        </div>
    </div>

    </div>
</template>
<script>
import Availability from './availability';
import Review from './review';
export default {
    components :{
        Availability,
        Review
    },
    data(){ 
        return {
            bookable:null,
            loading:false
        }
    },
    created(){
        this.loading=true;
        axios.get(`/laravelbnb/public/api/bookables/${this.$route.params.id}`)
        .then(response=>{
            this.bookable=response.data.data;
            this.loading=false;            
                        })
    }
}
</script>