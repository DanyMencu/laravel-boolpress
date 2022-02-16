<template>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Library</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <!-- Component matched with the route HOME-->
                        <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <!-- Component matched with the route BOOKS-->
                        <router-link class="nav-link" :to="{name: 'books'}">All books</router-link>
                    </li>
                    <li class="nav-item">
                        <!-- Component matched with the route Languages-->
                        <router-link class="nav-link" :to="{name: 'languages-list'}">Languages</router-link>
                    </li>
                    <li class="nav-item">
                        <!-- Component matched with the route Contact-->
                        <router-link class="nav-link" :to="{name: 'contact'}">Contact Us</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>
    .active {
        background: rgba(#fff, .1);
        border-radius: 30px;
    }
</style>