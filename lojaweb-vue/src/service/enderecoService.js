import { Endereço } from '@/model/Endereço.js'; //@ referencia a pasta principal do sistema (SRC)
import http from './config';

export default {

    add: function (endereço = new Endereço) {
        console.log(endereço);
        return http.post("endereco/add", endereço)
    },

    list: function () {
        return http.get("endereco/list")
    },
    get: function (cep) {
        return http.get("endereco/get" + cep)
    }

}