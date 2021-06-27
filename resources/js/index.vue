<template>
    <div>
        <nav class="navbar bg-white border-bottom navbar-light">
            <router-link class="navbar-brand" :to="{name:'home'}">Home</router-link>
            <router-link class="btn nav-button"   :to="{name:'second'}">Second</router-link>
        </nav>
       
        <div class="container mt-4 mb-4">
                <router-view></router-view>
        </div>

    </div>
</template>
<script>
export default {
    name:'index'
}
</script>