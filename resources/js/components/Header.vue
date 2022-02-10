<template>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <router-link class="navbar-brand" :to="{name: 'Home'}">Library</router-link>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <!-- Component matched with the route HOME-->
                        <router-link class="nav-link" :to="{name: 'Home'}">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <!-- Component matched with the route ABOUT-->
                        <router-link class="nav-link" :to="{name: 'About'}">About</router-link>
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
    }
</style>