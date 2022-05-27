<template>
    <page-404 v-if="is404" />
    <div class="container" v-else-if="post">
        <h1>{{ post.title }}</h1>
        <b>From {{ post.user.name }}<span v-if="post.category"> in category {{ post.category.name }}</span></b>
        <div class="tags">
            <span v-for="tag in post.tags" :key="tag.id" class="tag">{{ tag.name }} </span>
        </div>
        <p>{{ post.body }}</p>
    </div>
</template>

<script>
import Page404 from './Page404.vue';

export default {
    name: 'BlogPost',
    props: ['slug'],
    components: {
        Page404,
    },
    data() {
        return {
            is404: false,
            post: null,
            baseApiUrl: 'http://localhost:8000/api/v1/posts',
        }
    },
    created() {
        this.getData(this.baseApiUrl + '/' + this.slug);
    },
    methods: {
        getData(url) {
            if (url) {
                Axios.get(url)
                .then(res => {
                    if (res.data.success) {
                        this.post =  res.data.response.data;
                    } else {
                        this.is404 = true;
                    }
                });
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
