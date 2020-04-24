<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome Produto</th>
          <th scope="col">Valor</th>
          <th scope="col">Categoria</th>
          <th scope="col">Data de Cadastro</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <template v-if="products.length">
          <tr v-for="product in products" :key="product.id_produto">
            <th width="10%" scope="row">{{ product.id_produto }}</th>
            <td width="30%">{{ product.nome_produto }}</td>
            <td width="20%">{{ formatMoney(product.valor_produto) }}</td>
            <td width="20%">{{ product.tb_categoria_produto.nome_categoria }}</td>
            <td width="20%">{{ formatDate(product.data_cadastro) }}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary" title="Editar" v-on:click="editFunction(product)">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button type="button" class="btn btn-danger" title="Excluir" v-on:click="deleteFunction(product)">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
        </template>
        <template v-else>
          <tr>
            <th colspan="4">Nenhum registro encontrado</th>
          </tr>
        </template>
      </tbody>
      </table>
  </div>
</template>

<script>
import moment from 'moment';

export default {
  name: 'Tableproducts',

  props: {
    products: {
      required: true,
      type: Array,
      default: []
    },
    editFunction: {
      required: true,
      type: Function,
      default: () => {}
    },
    deleteFunction: {
      required: true,
      type: Function,
      default: () => {}
    },
  },

  methods: {
    formatDate(date) {
      return moment(date).format('DD/MM/YYYY HH:mm:SS');
    },

    formatMoney(value) {
      return Number(value).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    }
  }
}
</script>