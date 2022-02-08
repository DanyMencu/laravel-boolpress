<template>
    <div class="content">
        <div class="title my-5">
            Library Books Archive
        </div>
        <hr>
        <div class="container">
            <div class="row justify-content-center my-5" v-if="books">
                <div class="col-5 book-card" v-for="book in books" :key="`book-${ book.id }`">
                    <h2 class="t">{{ book.title }}</h2>
                    <div class="mb-3 font-italic">{{ formatDate(book.created_at) }}</div>
                    <h5 class="mb-2">{{ book.author }}</h5>
                    <p>{{ getExcerpt(book.content, 150) }}</p>
                </div>
            </div>
            <div class="content" v-else>
                Loading books...
            </div>
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

        /* Take all books from axios */
        getBooks() {
            axios.get('http://127.0.0.1:8000/api/books')
                .then(res =>{
                    console.log(res);

                    this.books = res.data;
                });
        },

        /* Change date format */
        formatDate(bookDate) {
            const date = new Date(bookDate);

            const formatted = new Intl.DateTimeFormat('en-GB').format(date);
            
            return formatted;
        },

        /* Limit the number of characters */
        getExcerpt(content, maxLength) {
            if(content.length > maxLength){
                return content.substr(0, maxLength) + '...';
            }

            return content;
        },
    },
}
</script>

<style lang="scss">
    .content {
        text-align: center;
    }

    .title {
        font-size: 60px;
    }

    .book-card {
        border: 1px solid #000;
        margin: 10px;
        padding: 1rem;
    }
</style>