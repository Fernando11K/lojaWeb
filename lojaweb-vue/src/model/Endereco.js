export class Endereco {
    constructor(
        id_endereco = null,
        cep = '',
        logradouro = '',
        bairro = '',
        cidade = '',
        uf = ''
    ) {
        this.id_endereco = id_endereco;
        this.cep = cep;
        this.logradouro = logradouro;
        this.bairro = bairro;
        this.cidade = cidade;
        this.uf = uf;
    }

}
