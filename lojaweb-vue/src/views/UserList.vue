<template>
    <NavBar />
    <section class="container">
        <h2 class="text-center">Usuarios</h2>
        <table class="text-center table table-bordered">
            <thead>
                <tr class="bg-black bg-opacity-10 border-dark">
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Data Nasc.</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Foto Perfil</th>
                    <!-- <th>Senha</th> -->
                    <th scope="col">Tel.</th>
                    <th scope="col">Ativo</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="usuario in usuarios" :key="usuario.id_usuario">
                    <td>{{ usuario.id_usuario }}</td>
                    <td>{{ usuario.nome }}</td>
                    <td>{{ usuario.email }}</td>
                    <td>{{ usuario.data_nasc }}</td>
                    <td>{{ usuario.cpf }}</td>
                    <td>{{ usuario.foto }}</td>
                    <!-- <td>{{ usuario.senha }}</td> -->
                    <td>{{ usuario.telefone }}</td>
                    <td>{{ usuario.ativo }}</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="container">

        <h2>Usuarios Cards</h2>
        <div class="d-flex">
            <div class="card" style="width: 18rem;" v-for="user in usuarios" :key="user.id_usuario">
                <img :src="user.foto" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ user.nome }}</h5>
                    <p class="card-text">ID: {{ user.id_usuario }} </p>

                    <p class="card-text">{{ user.email }}</p>
                    <p class="card-text">{{ user.data_nasc }}</p>
                    <p class="card-text">{{ user.cpf }}</p>
                    <p class="card-text"></p>
                    <!-- <p class="card-text">{{ user.senha }}</p> -->
                    <p class="card-text">{{ user.telefone }}</p>
                    <p class="card-text">{{ user.ativo }}</p>
                    <a href="#" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
import NavBar from '../components/NavBar.vue';
import userService from '../service/userService';

export default {
    components: { NavBar },
    data() {
        return {
            usuarios: []
        }
    },
    mounted() {
        this.list()
    },
    methods: {
        list() {
            userService.list()
                .then(response => {
                    this.usuarios = response.data

                })
                .catch(error => {
                    console.log(error)
                    alert("Erro ao retornar a lista de usuário!")
                })
                .finally(() => {
                    console.log(this.usuarios)
                })
        },
        getId(id) {
            userService.getId(id)
                .then(response => {
                    this.usuarios = response
                })
                .catch(error => {
                    console.log(error)
                    alert("Erro ao retornar usuário!")
                })
                .finally(() => {

                })
        },
        listaOld() {
            userService.listOld(dados => {
                this.usuarios = JSON.parse(dados);
            });
        }
    }
}
</script>

<style>

</style>