<template>
  <div class="flex flex-no-wrap">
    <div class="w-48 bg-brown">
      <sidebar/>
    </div>
    <div class="flex-1">
        <nuxt />
    </div>
  </div>
</template>
<script>
import sidebar from '@/components/navigation/Sidebar'

export default {
  components: {
    sidebar
  },
  data: () => ({
      isPanelOpen: false
  }),
  methods: {
      openSidebarPanel() {
          this.isPanelOpen = true
      },
      clauseSidebarPanel() {
          if(this.isPanelOpen){this.isPanelOpen = false}
      }
  }
}
</script>

<style scoped>
svg {
    fill: rgb(219, 219, 219);
}
.brand {
    line-height: 1.125;
    word-break: break-word;
    color: rgb(0, 209, 178);
}
.label {
    font-family: 'Avenir-Light', sans-serif;
}

a:hover>svg {
    fill: rgb(85, 85, 85);
}
</style>
