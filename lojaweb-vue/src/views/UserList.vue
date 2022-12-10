<template>
    <NavBar />
    <section class="container">
        <h2>Usuarios</h2>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data Nasc.</th>
                <th>CPF</th>
                <th>Foto Perfil</th>
                <!-- <th>Senha</th> -->
                <th>Tel.</th>
                <th>Ativo</th>
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