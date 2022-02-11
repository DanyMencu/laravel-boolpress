<template>
    <div class="content">
        <div class="title my-5">
            Library Books Archive
        </div>
        <hr>
        <div>
            <!-- Books archive -->
            <section class="container" v-if="books">
                <div class="row justify-content-center my-4">
                    <!-- Book card -->
                    <div class="col-5 book-card" v-for="book in books" :key="`book-${ book.id }`">
                        <h2>{{ book.title }}</h2>
                        <div class="mb-3 font-italic">{{ formatDate(book.created_at) }}</div>
                        <h5 class="mb-2">{{ book.author }}</h5>
                        <p>{{ getExcerpt(book.content, 150) }}</p>
                        <router-link :to="{ name: 'book-details', params: { slug: book.slug } }">Read more about...</router-link>
                    </div>
                
                </div>
                
                <!-- Pagination -->
                <button class="btn btn-primary mx-1"
                    :disabled="pagination.current === 1"
                    @click="getBooks(pagination.current - 1)">
                    Prev
                </button>

                <button class="btn mx-1" :class="pagination.current === i ? 'btn-primary' : 'btn-secondary'"
                    v-for="i in pagination.last" :key="`page-${i}`"
                    @click="getBooks(i)">
                    {{ i }}
                </button>

                <button class="btn btn-primary mx-1"
                    :disabled="pagination.current === pagination.last"
                    @click="getBooks(pagination.current + 1)">
                    Next
                </button>
            </section>

            <!-- Loader -->
            <Loader v-else />

        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Loader from '../components/Loader.vue';

export default {
    name: "Book",
    components: {
        Loader,
    },
    data() {
        return {
            books: null,
            pagination: null,
        }
    },
    created() {
        this.getBooks();
    },
    methods: {

        /* Take all books from axios */
        getBooks(page = 1) {
            axios.get(`http://127.0.0.1:8000/api/books?page=${page}`)
                .then(res =>{
                    this.books = res.data.data;
                    this.pagination = {
                        current: res.data.current_page,
                        last: res.data.last_page
                    }
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


<style lang="scss" scoped>
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