<template>
    <div>
        <h5 class="text-uppercase pt-sm-4">Check Availability</h5>
        <span v-if="hasAvailability" class="text-success text-bold">(AVAILABLE)</span>
        <span v-if="noAvailability" class="text-danger">( NOT AVAILABLE)</span>

        <div class="form-row">
            <div class="form-group col-md-6 pb-4">
                <label for="">From</label>
                <input type="date" name="from" date-format="yyyy-mm-dd" class="form-control form-control-sm" placeholder="Start Date" v-model="from" 
                :class="[{'is-invalid':this.errorFor('from')}]" required>
                <div class="invalid-feedback" v-for="(error,index) in this.errorFor('from')" :key="'from'+ index">
                    {{ error }}
                </div>
            </div>

            <div class="form-group col-md-6 pb-4">
                <label for="">To</label>
                <input type="date" date-format="yyyy-mm-dd" name="to" class="form-control form-control-sm" placeholder="End Date" @keyup.enter="check" v-model="to" 
                :class="[{'is-invalid':this.errorFor('to')}]" required>
                <div class="invalid-feedback" v-for="(error,index) in this.errorFor('to')" :key="'to'+ index">
                    {{ error }}
                </div>
            </div>
        </div>
        <button class="btn btn-success btn-block" v-on:click="check" :disabled="loading"> Check</button>
    </div>
</template>

<script>
export default {
    props:{
        bookableId:String
    },
    data(){
       
       return {
            from:null,
            to : null,
            loading:false,
            status: null,
            errors:null
         }

        },
    methods:{
        check(){
           
           this.loading=true;
           this.error=null;
            axios.get(`api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`)
            .then(resposnse =>{
                this.status=resposnse.status;
            }).catch((error) => {
    // Error
    if (error.response.status == 422) {
       
        this.errors=error.response.data.errors;
    }
    this.status=error.response.status;

}).then( () =>(
                this.loading=false
            ))
    
        },
        errorFor(Field){
             if(this.hasErrors && this.errors[Field]){
                     return this.errors[Field]
             } else{
return null;
             }         }
    },
    computed :{
        hasErrors(){
           if(this.status ===422 && this.errors!=null){
               return true;
           }else{
               return false;
           }
        },
        hasAvailability(){
            return  200 === this.status;

        },
        noAvailability(){
            return 404 === this.status;
        }
    }
}
</script>