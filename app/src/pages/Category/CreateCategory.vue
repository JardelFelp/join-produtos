<template>
  <div id="create-category" class="container">
    <!-- Título -->
    <div class="row">
      <div class="col-12 title" >
        <h4 v-if="this.id">Editando categoria <b>{{ originalCategory.nome_categoria }}</b></h4>
        <h4 v-else>Cadastrando nova categoria</h4>
      </div>
    </div>

    <!-- Formulário -->
    <div class="row">
      <div class="form-group col-12">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Nome da Categoria</span>
          </div>
          <input 
            id="category-name" 
            type="text" 
            class="form-control" 
            maxlength="150" 
            v-model="category.nome_categoria"
          />
        </div>
      </div>
    </div>

    <!-- Botões de ação -->
    <div class="row">
      <div class="col-12 action-buttons">
        <button class="btn btn-secondary" v-on:click="cancel">Cancelar</button>
        <button class="btn btn-success" v-on:click="save">Salvar</button>
      </div>
    </div>

    <v-dialog/>
  </div>
</template>

<script>
export default {
  name: 'CreateCategory',

  data() {
    return {
      id: null,
      originalCategory: {},
      category: {
        nome_categoria: null,
      }
    }
  },

  mounted() {
    this.id = this.$route.params.id || null;

    if (this.id) {
      this.retrieveData();
    }
  },

  methods: {
    async retrieveData() {
      try {
        const { data: response } = await this.$http.get(`/category/${this.id}`);
        this.category = response;
        this.originalCategory = { ...response };
      } catch(e) {
        console.error(e);
        this.categories = [];
      }
    },

    cancel() {
      this.$router.push({ path: '/categorias' });
    },

    async save() {
      if (this.category.nome_categoria) {
        return await this.doSave();
      }

      return this.$modal.show('dialog', {
        title: 'Atenção!',
        text: 'Verifique os campos e tente novamente.',
        buttons: [
          { title: 'OK' }
      ]
    })

    },

    async doSave() {
      try {
        if (this.id && this.originalCategory.id_categoria_planejamento) {
          await this.$http.put(`/category/${this.id}`, this.category);
          return this.$router.push({ path: '/categorias' });
        }

        await this.$http.post('/category', this.category);
        return this.$router.push({ path: '/categorias' });
      } catch(e) {
        console.error(e);
      }
    }
  }
}
</script>

<style lang="scss">
#create-category {
  margin-top: 5vh;

  .title {
    margin-bottom: 25px;
  }
  
  .action-buttons {
    display: flex;
    justify-content: flex-end;

    :last-child {
      margin-left: 5px;
    }
  }
}
</style>