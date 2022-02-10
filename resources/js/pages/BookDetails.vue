<template>
    <section>
        <div v-if="book">
            <div class="text-center mb-5">
                <h1 class="mb-3">{{ book.title }}</h1>
                <h4 class="mb-3">{{ book.author }}</h4>
                <p>{{ book.content }}</p>
            </div>
            <router-link class="btn btn-primary mb-5" :to="{ name: 'books'}">Back to archive</router-link>
        </div>

        <Loader v-else />
    </section>
</template>

<script>
import axios from "axios";
import Loader from "../components/Loader";

export default {
    name: "BookDetails",
    components: {
        Loader,
    },
    data() {
        return {
            book: null,
        }
    },
    created() {
        this.getDetails()
    },
    methods: {
        getDetails() {
            axios.get(`http://127.0.0.1:8000/api/books/${this.$route.params.slug}`)
            .then(res => {
                this.book = res.data;
            })
            .catch(err => log.error(err));
        },
    }
}
</script>

<style>

</style>