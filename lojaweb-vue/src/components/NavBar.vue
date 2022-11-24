<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <RouterLink class="navbar-brand" to="/">Loja WEB</RouterLink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <RouterLink class="nav-link" aria-current="page" to="/">Home</RouterLink>
                    </li>

                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/about">About</RouterLink>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Link</a>
                    </li> -->
                </ul>
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <li class="nav-item">
                        <RouterLink class="nav-link" aria-current="page" to="/user/add">Cadastro</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" aria-current="page" to="/user/enter">Entrar</RouterLink>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</template>

<script>
import { RouterLink } from 'vue-router';
export default {
    name: 'NavBar',
    components: { RouterLink }
}

</script>

<style scoped>

</style>