<template>
  <div>
    <form>
      <div class="w-full px-3 mb-3">
        <label class="block uppercase tracking-wide text-xs font-bold text-brown mb-2" for="email">
            Email
        </label>
        <input 
        v-model="user.email"
        class="appearance-none block w-full bg-white text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none" id="email" type="text" required>
      </div>
      <div class="w-full px-3 mb-3">
        <label class="block uppercase tracking-wide text-xs font-bold text-brown mb-2" for="password">
            Password
        </label>
        <input 
        v-model="user.password"
        class="appearance-none block w-full bg-white text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none" id="password" type="password" required>
      </div>
      <div class="p-3">
        <button 
          class="text-teal-500 py-1 px-4 border border-teal-500 rounded">
            Login
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  layout: 'login',
  data: () => ({
    user: {
      email: "",
      password: ""
    }
  })
}
</script>

<style>

</style>
