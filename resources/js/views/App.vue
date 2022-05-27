<template>
    <div>
        <header-main />
        <router-view />
    </div>
</template>

<script>
import HeaderMain from '../components/HeaderMain.vue'
import PostsContainer from '../components/PostsContainer.vue'

export default {
    name: 'App',
    components: {
        HeaderMain,
        PostsContainer
    }
}
</script>

<style>

</style>
