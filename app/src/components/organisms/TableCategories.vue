<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome Categoria</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <template v-if="categories.length">
          <tr v-for="category in categories" :key="category.id_categoria_planejamento">
            <th width="10%" scope="row">{{ category.id_categoria_planejamento }}</th>
            <td width="80%">{{ category.nome_categoria }}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary" title="Editar" v-on:click="editFunction(category)">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button type="button" class="btn btn-danger" title="Excluir" v-on:click="deleteFunction(category)">
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
export default {
  name: 'TableCategories',

  props: {
    categories: {
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
  }
}
</script>