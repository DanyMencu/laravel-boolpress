<template>
    <section>
        <div v-if="book">
            <div class="text-center mb-5 container">
                <!-- Title -->
                <h1 class="mb-3">{{ book.title }}</h1>

                <!-- Genre -->
                <p><strong>Genre:  </strong>
                    <span v-if="! book.genre"> No genre specified</span>
                    <span v-else>{{ book.genre.name }} </span>
                </p>

                <!-- Author -->
                <h4 class="mb-3">{{ book.author }}</h4>

                <div class="row">
                    <!-- Image -->
                    <figure v-if="book.image" class="col-6">
                        <img :src="book.image" :alt="book.title">
                    </figure>

                    <!-- Content -->
                    <p v-if="book.image" class="col-6 text-left">{{ book.content }}</p>
                    <p v-else class="col-12">{{ book.content }}</p>

                </div>

                <!-- Languages -->
                <Bedge v-for="language in book.languages"
                    :key="`language-${language.id}`" :name="language.name"/>
            </div>
            <router-link class="btn btn-primary mb-5" :to="{ name: 'books'}">Back to archive</router-link>
        </div>

        <Loader v-else />
    </section>
</template>

<script>
import axios from "axios";
import Loader from "../components/Loader";
import Bedge from "../components/Bedge"

export default {
    name: "BookDetails",
    components: {
        Loader,
        Bedge,
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
                if(res.data.not_found) {
                    this.$router.push({ name: 'not-found' });
                } else {
                    this.book = res.data;
                }
            })
            .catch(err => log.error(err));
        },
    }
}
</script>

<style>

</style>