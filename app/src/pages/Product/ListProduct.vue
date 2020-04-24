<template>
  <div id="list-product" class="container">
    <div class="row">
      <div class="col-12">
        <h3>Produtos</h3>
        <p>Aqui você pode visualizar, editar, excluir e cadastrar novas produtos</p>

        <!-- Botão para criar registro -->
        <CreateButton 
          title="Novo Produto"
          :onClick="createFunction"
        />
        
        <!-- Tabela de exibição de dados -->
        <TableProducts 
          :products="products"
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
import TableProducts from '@/components/organisms/TableProducts';
import CreateButton from '@/components/atoms/CreateButton';

export default {
  name: 'Listproduct',

  components: {
    TableProducts,
    CreateButton
  },

  data() {
    return {
      products: [],
    }
  },

  mounted() {
    this.retrieveData();
  },

  methods: {
    async retrieveData() {
      try {
        const { data: response } = await this.$http.get('/product');
        this.products = response;
      } catch(e) {
        console.error(e);
        this.products = [];
      }
    },

    editFunction(product) {
      this.$router.push({ 
        path: `/produtos/${product.id_produto}`,
      })
    },

    deleteFunction(product) {
      this.$modal.show('dialog', {
        title: 'Atenção!',
        text: `Você deseja mesmo excluir o produto "${product.nome_produto}"?`,
        buttons: [
          { title: 'Não' },
          {
            title: 'Sim',
            default: true,
            handler: async () => { 
              await this.doDelete(product.id_produto);
              await this.retrieveData();
              this.$modal.hide('dialog');
            }
          },
        ]
      });
    },

    async doDelete(id) {
      try {
        await this.$http.delete(`/product/${id}`);
      } catch(e) {
        console.error(e);
      }
    },

    createFunction() {
      this.$router.push({ 
        path: '/produtos/criar'
      })
    },
  }
}
</script>

<style lang="scss">
#list-product {
  margin-top: 5vh;
}

</style>