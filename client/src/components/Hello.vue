<script setup>
import { useHelloStore } from '../store/HelloStore';
const store=useHelloStore();
</script>
<template>
    <div>
          <h1 class="text-2xl text-center">Hello World</h1>
          <div class="text-center my-12">
             <button @click="store.increment()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
             <p>Count value is:{{store.count}}</p>
          </div>
         
    </div>
  
</template>
<style scoped>

</style>
