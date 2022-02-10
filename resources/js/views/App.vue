<template>
    <div>
        <Header />

        <main class="container">
            <!-- Component matched with the route -->
            <router-view></router-view>
        </main>

        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
    name: "App",
    components: {
        Header,
        Footer,
    },

}
</script>

<style>

</style>