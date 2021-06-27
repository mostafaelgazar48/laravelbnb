<template>
    <div class="d-none d-md-block" >
        <h4 class="pt-4 text-uppercase text-secondary"> Rewiew List</h4>
		<div v-if="loading"> Loading ...</div>
      	<div class="card" v-for="(review,index) in reviews" :key="index">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center">{{ review.created_at|fromNow }}</p>
        	    </div>
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
        	            
        	            <span class="float-right">{{ review.rating }}
							<star-rating :rating="review.rating"></star-rating>
						</span>


        	       </p> 
        	       <div class="clearfix"></div>
        	        <p>{{review.content}}</p>        	       
        	    </div>
	        </div>
	    </div>
    </div>
    </div> 
</template>
<script>
import moment from 'moment';

export default {
	props:{
		bookableId:String
	},
	data(){
		return {
			loading:false,
			reviews:null
		}
	},
	created(){
		 this.loading=false;
		 axios.get(`api/bookables/${this.bookableId}/reviews`).then(response =>{
			 this.reviews=response.data.data
		 }).then( ()=>{
			 this.loading=false;
		 })
	},
	filters:{
		fromNow(value){
			return moment(value).fromNow();
		}
	}
}
</script>