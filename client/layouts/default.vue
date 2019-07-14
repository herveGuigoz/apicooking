<template>
  <div class="grid">
    <div class="col-2-12 hide-on-mobile">
        <sidebar/>
    </div>
    <div class="col-10-12">
        <nuxt />
    </div>
  </div>
</template>
<script>
import sidebar from '@/components/navigation/Sidebar'

export default {
  components: {
    sidebar
  }
}
</script>

<style>

</style>
