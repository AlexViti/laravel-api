/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

const slugBtn = document.getElementById('slug-btn');
if (slugBtn) {
    slugBtn.addEventListener('click', () => {
        const slug = document.getElementById('slug');
        const title = document.getElementById('title').value;
        if(title) {
            Axios.post('/admin/slug', { title })
                .then(function (response) {
                    slug.value = response.data.slug;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });
}
