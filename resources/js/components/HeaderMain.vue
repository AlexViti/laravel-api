<template>
    <header>
        <router-link :to="{ name: 'home' }">Home</router-link>
        <router-link :to="{ name: 'about' }">About</router-link>
        <router-link :to="{ name: 'blog' }">Blog</router-link>
    </header>
</template>

<script>
export default {
    name: 'HeaderMain'
}
</script>

<style>

</style>
