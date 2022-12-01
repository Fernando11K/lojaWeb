
<script>
import userService from '@/service/userService';
export default {
    components: { NavBar },
    data() {
        return {
            Usuarios: []
        }
    },
    mounted() {
        this.lista()
    },
    methods: {
        lista() {
            userService.list(dados => {
                this.Usuarios = JSON.parse(dados);
            });
        }
    }
}
</script>
<template>
    <NavBar />

</template>
<style>

</style>