<template>
    <section>
        <div v-if="book">
            <div class="text-center mb-5">
                <!-- Title -->
                <h1 class="mb-3">{{ book.title }}</h1>

                <!-- Genre -->
                <p><strong>Genre:  </strong>
                    <span v-if="! book.genre"> No genre specified</span>
                    <span v-else>{{ book.genre.name }} </span>
                </p>

                <!-- Author -->
                <h4 class="mb-3">{{ book.author }}</h4>

                <!-- Content -->
                <p>{{ book.content }}</p>

                <!-- Languages -->
                <span class="badge badge-success py-1 px-2 mr-1"
                    v-for="language in book.languages"
                    :key="`language-${language.id}`"
                >
                    {{ language.name }}
                </span>
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