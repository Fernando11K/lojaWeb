import { User } from '@/model/User.js'; //@ referencia a pasta principal do sistema (SRC)
import http from './config';
export default {

    add: function (user = new User) {
        return http.post("usuario/add", user)
    },
    list: function () {
        return http.get("usuario/list")
    },

    addOld: function (user = new User) {
        console.log(user);
        try {
            const xhttp = new XMLHttpRequest();

            xhttp.onload = function () {
                alert("Cadastrado!", this.responseText);
                console.log(user);
                console.log(this.responseText);

            }
            xhttp.open("POST", "http://localhost:8000/usuario/add", false);  //Header da mensagem: todas as origins
            xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");  //Header da mensagem: conteúdo é um json com caracteres utf-8
            xhttp.setRequestHeader("Content-type", "application/json;charset=utf-8");
            xhttp.send(JSON.stringify(user));
        } catch (error) {
            console.error(error);
            alert("Erro: " + error);
        }
    },

    listOld: function (callback) {
        try {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                alert("Lista", this.responseText);
                console.log(this.responseText);
                callback(this.responseText);// função de retorno
            }
            xhttp.open("GET", "http://localhost:8000/usuario/list", false);
            //Header da mensagem: todas as origins
            xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
            //Header da mensagem: conteúdo é um json com caracteres utf-8
            xhttp.setRequestHeader("Content-type", "application/json;charset=utf-8");
            xhttp.send();
        } catch (error) {
            console.error(error);
            alert("Erro: " + error);
        }
    }

}