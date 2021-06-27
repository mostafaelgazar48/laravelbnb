<template>
  <div>
    <span class="float-left"
      ><i class="fas fa-star" v-for="star in fullStar" :key="star"></i
    ></span>
    <span class="float-left"
      ><i class="fas fa-star-half-alt" v-if="halfStar"></i
    ></span>
    <span class="float-left"
      ><i class="far fa-star" v-for="estar in emptyStar" :key="estar"></i
    ></span>
  </div>
</template> 
<script>
export default {
  props: {
    rating: Number,
  },
  computed: {
    halfStar() {
        const fraction = Math.round(this.rating-Math.floor(this.rating)*100);   
          return fraction>0 &&fraction<50;
    },
    fullStar() {
      return Math.round(this.rating);
    },
    emptyStar() {
      return 5-Math.ceil(this.rating);
    },
  },
};
</script>