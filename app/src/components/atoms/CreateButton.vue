<template>
  <div class="create-register">
    <button class="btn btn-success" v-on:click="onClick">
      {{ title }} 
      <i class="fas fa-plus"></i>
    </button>
  </div>
</template>

<script>
export default {
  name: 'CreateButton',

  props: {
    title: {
      required: true,
      type: String,
    },
    onClick: {
      required: true,
      type: Function,
      default: () => {}
    }
  }
}
</script>

<style lang="scss">
.create-register {
  display: flex;
  justify-content: flex-end;
  margin-bottom: 15px;
}
</style>