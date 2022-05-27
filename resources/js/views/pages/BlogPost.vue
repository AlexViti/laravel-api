<template>
    <div v-if="post">
        <h1>{{ post.title }}</h1>
        <strong>From {{ post.user.name }} <span v-if="post.category">in category {{ post.category.name }}</span></strong>
        <div class="tags">
            <span v-for="tag in tags" :key="tag.id">{{ tag.name }}</span>
        </div>
        <p>
            {{ post.body }}
        </p>
    </div>
</template>

<script>
export default {
    name: 'BlogPost',
    props: ['slug'],
    data() {
        return {
            post: null,
            baseApiUrl: 'https://localhost:8000/api/v1/posts'
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
                        this.post = res.data.response.data;
                    } else {
                        this.$router.push({ name: 'Page404' });
                    }
                });
            }
        }
    }
}
</script>

<style>

</style>
