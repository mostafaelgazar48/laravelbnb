<template>

    <div>
        <h1>here is the list of all items</h1>
        <div v-if="!bookables">
            Data is loading
        </div>
        <div v-else class="row">
             <bookables-list-items class="col-md-3" v-for="(bookable,index) in bookables" :key="index" :title="bookable.title" :content="bookable.content" :id="bookable.id"></bookables-list-items>
        </div>
    </div>
</template>

<script>
import BookablesListItems from './bookablesListItems';
export default {
    components:{
        BookablesListItems
    },
   data: function() {
  return {
    bookables: null
  };
}
,

    created(){
        const request =axios.get("/laravelbnb/public/api/bookables").then(response =>{
            console.log(response);
            this.bookables=response.data.data;

            }
        )
    }
}
</script>
