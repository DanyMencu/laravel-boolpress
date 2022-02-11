<template>
    <div class="content">
        <div class="title my-5">
            All Library Languages Available
        </div>
        <hr>
        <div class="container">
            <div class="row justify-content-center my-4">
                <!-- Language card -->
                <div class="col-5 language-card" v-for="language in languages" :key="`language-${ language.id }`">
                    <h2>{{ language.name }}</h2>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: 'LanguagesList',
    data() {
        return {
            languages: null,
        }
    },
    created() {
        this.getLanguages()
    },
    methods: {

        //Take all languages from axios
        getLanguages() {
            axios.get(`http://127.0.0.1:8000/api/languages/`)
            .then(res =>{
                console.log(res.data);

                this.languages = res.data;
            })
            .catch(err => log.error(err));
        }
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

    .language-card {
        color: #fff;
        background: rgba(73, 159, 230, 0.849);
        margin: 10px;
        padding: 1rem;
    }
</style>