import Bookables from './bookables/bookables';
import SecondComponent from './components/second.vue';
import Bookable from './bookable/bookable';
import Review from './review/Review';
import VueRouter from 'vue-router'

const routes =[
    {
        path:'/',
        name:'home',
        component:Bookables
    },
    {
        path:'/second',
        name:'second',
        component:SecondComponent 
    }, {
        path:'/bookable/:id',
        name:'bookable',
        component:Bookable 
    },{
        path:'/review/:id',
        name:'review',
        component:Review
    }
];
const router =new VueRouter({
    routes
});

export default router ;