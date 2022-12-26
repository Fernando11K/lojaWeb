<template>
    <NavBar></NavBar>
    <section class="container">
        <h2 class="text-center">Entrar</h2>
        <div class="d-flex flex-column  align-items-stretch justify-content-center">
            <div class="mb-3">
                <label for="staticEmail" class="">Email</label>
                <div class="">
                    <input type="text" class="form-control" id="staticEmail" placeholder="email@example.com"
                        v-model="usuario.email">
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="">Password</label>
                <div class="">
                    <input type="password" class="form-control" id="inputPassword" placeholder="*******"
                        v-model="usuario.pass">
                </div>
            </div>

            <div class="mb-3">
                <button type="button" class="btn btn-primary" @click="entrar()"> Entrar </button>
            </div>
        </div>
    </section>
</template>

<script>
import NavBar from '@/components/NavBar.vue';
import userService from '/src/service/userService';
export default {
    components: { NavBar },
    data() {
        return {
            usuario: {
                email: "",
                pass: ""
            }
        }
    },
    methods: {
        entrar() {
            userService.logon(this.usuario)
                .then((response) => {
                    console.log(response.data);
                    sessionStorage.setItem("user", JSON.stringify(response.data));
                    alert("Usuario logado!");
                    console.log(response.data)
                })
                .catch((error) => {
                    console.log(error);
                    alert("Erro ao entrar!");
                });
        }
    }
}
</script>

<style scoped>

</style>

