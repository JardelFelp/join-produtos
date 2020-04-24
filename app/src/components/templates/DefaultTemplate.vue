<template>
  <div>
    <Navbar/>
    <slot/>
  </div>
</template>

<script>
import Navbar from '@/components/molecules/Navbar';

export default {
  name: 'DefaultTemplate',

  components: {
    Navbar,
  }
}
</script>