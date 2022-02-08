<template>
    <div class="content">
        <div class="title m-b-md">
            Library Front-office Site
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "App",
    component: {},
    data() {
        return {
            books: null,
        }
    },
    created() {
        this.getBooks();
    },
    methods: {
        getBooks() {
            axios.get('http://127.0.0.1:8000/api/books')
                .then(res =>{
                    console.log(res);

                    this.books = res.data;
                });
        }
    },
}
</script>

<style lang="scss">
    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>