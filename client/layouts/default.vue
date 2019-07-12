<template>
  <div class="flex flex-no-wrap">
    <div class="w-1/6">
        <sidebar/>
    </div>
    <div class="w-5/6">
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
