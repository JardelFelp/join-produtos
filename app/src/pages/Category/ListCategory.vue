<template>
  <div id="list-category" class="container">
    <div class="row">
      <div class="col-12">
        <h3>Categorias</h3>
        <p>Aqui você pode visualizar, editar, excluir e cadastrar novas categorias</p>

        <!-- Botão para criar registro -->
        <CreateButton 
          title="Nova Categoria"
          :onClick="createFunction"
        />
        
        <!-- Tabela de exibição de dados -->
        <TableCategories 
          :categories="categories"
          :editFunction="editFunction"
          :deleteFunction="deleteFunction"
        />

        <!-- Modal utilizado para deletar registro -->
        <v-dialog/>
      </div>
    </div>
  </div>
</template>

<script>
import TableCategories from '@/components/organisms/TableCategories';
import CreateButton from '@/components/atoms/CreateButton';

export default {
  name: 'ListCategory',

  components: {
    TableCategories,
    CreateButton
  },

  data() {
    return {
      categories: [],
    }
  },

  mounted() {
    this.retrieveData();
  },

  methods: {
    async retrieveData() {
      try {
        const { data: response } = await this.$http.get('/category');
        this.categories = response;
      } catch(e) {
        console.error(e);
        this.categories = [];
      }
    },

    editFunction(category) {
      this.$router.push({ 
        path: `/categorias/${category.id_categoria_planejamento}`,
      })
    },

    deleteFunction(category) {
      this.$modal.show('dialog', {
        title: 'Atenção!',
        text: `Você deseja mesmo excluir a categoria "${category.nome_categoria}"?`,
        buttons: [
          { title: 'Não' },
          {
            title: 'Sim',
            default: true,
            handler: async () => { 
              await this.doDelete(category.id_categoria_planejamento);
              await this.retrieveData();
              this.$modal.hide('dialog');
            }
          },
        ]
      });
    },

    async doDelete(id) {
      try {
        await this.$http.delete(`/category/${id}`);
      } catch(e) {
        console.error(e);
      }
    },

    createFunction() {
      this.$router.push({ 
        path: '/categorias/criar'
      })
    },
  }
}
</script>

<style lang="scss">
#list-category {
  margin-top: 5vh;
}

</style>