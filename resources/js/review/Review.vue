.<template>
    <div class="container">
       <div class="form-group">
           <label for="" class="text-muted">Make Your Rating</label>
           <star-rating :rating="5" ></star-rating>
         <div class="clearfix"></div>
       </div>
       <div class="form-group">
           <label for="" class="text-muted float-left">gently Leave Your Description 
           </label>
           <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
       </div>
       <button class="btn btn-success">Submit</button>
    </div>
</template>