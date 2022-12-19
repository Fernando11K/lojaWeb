<template>
    <div>
        <NavBar />
    </div>
    <section class="container bg-light">
        <h2>Cadastro</h2>
        {{ user }}
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="" aria-describedby="helpName"
                v-model="user.nome" />
            <small id="helpName" class="text-muted"></small>
        </div>

        <div class="form-group">
            <label for="">E-mail</label>
            <input type="email" name="email" class="form-control" placeholder="" aria-describedby="helpEmail"
                v-model="user.email" />
            <small id="helpEmail" class="text-muted"></small>
        </div>

        <div class="form-group">
            <label for="">Senha</label>
            <input type="password" name="senha" class=" form-control" placeholder="" aria-describedby="helpPass"
                v-model="user.senha" />
            <small id="helpPass" class="text-muted"></small>
        </div>

        <div class="form-group">
            <label for="">Data Nasc.</label>
            <input type="date" name="data_nasc" class="form-control" placeholder="" aria-describedby="helpDate"
                v-model="user.data_nasc" />
            <small id="helpDate" class="text-muted"></small>
        </div>
        <div class="form-group">
            <label for="">Tel</label>
            <input type="tel" name="tel" class="form-control" placeholder="" aria-describedby="helpTel"
                v-model="user.telefone" />
            <small id="helpTel" class="text-muted"></small>
        </div>

        <div class="form-group">
            <label for="">CPF</label>
            <input type="number" name="cpf" class="form-control" placeholder="" aria-describedby="helpCPF"
                max="99999999999" min="00000000000" v-model="user.cpf" />
            <small id="helpCPF" class="text-muted"></small>
        </div>

        <div class="mb-3">
            <button type="button" class="btn btn-primary mx-1" @click="userAdd()">
                Cadastrar
            </button>
            <button type="button" class="btn btn-danger">
                Sair
            </button>
        </div>

    </section>
</template>



<script>
import NavBar from '../components/NavBar.vue';
import { User } from '../model/User.js';
import userService from '../service/userService.js'

// var user = new User(); // Criando um objeto do tipo User
export default {
    components: { NavBar },
    data() {
        return {
            user: new User()
        }
    },
    methods: {
        userAdd() {
            userService.add(this.user)
                .then(response => {
                    console.log(response)
                    alert("Cadastro!");
                })
                .catch(error => {
                    alert("Erro! ", error);
                });
        }
    }

}

</script>

<style scoped>

</style>