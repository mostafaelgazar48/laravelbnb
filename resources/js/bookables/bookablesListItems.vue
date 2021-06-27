<template>
  
       <div class="card">
           <div class="card-body">
               <router-link :to="{name:'bookable' ,params:{id}}">
                   <h3 class="card-title">   {{ title  }}</h3>
               </router-link>
            <p class="card-text">  {{ content }}</p>
           </div>
       </div>
 
</template>

<script>
export default {
    props:{
        title:String,  
        content:String,
        id:Number
    }
}
</script>

<style scoped>
    .card:hover{
        background-color: #efefef;
    }
</style>