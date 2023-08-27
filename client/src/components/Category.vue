<script setup>
import { onMounted,ref } from 'vue';
import { useCategoryStore } from '../store/CategoryStore'
const category=useCategoryStore();
const categories=ref([]);
const loading=ref(false);

  async function getCategories()
{
  loading.value=true;
   let response= await category.fetchCategories();
   if(response.status)
   {
      categories.value=response?.data.data;
      loading.value=false;
   }
    console.log(categories.value);
}  

onMounted( ()=>{
    getCategories();
})




</script>
<template>
    <div>
          <h1 class="text-2xl text-center">All category from backebnd server's database</h1>
          <div v-if="loading" class="text-center my-12">
              <h1>Loading....</h1>
          </div>
          <div class="text-center my-12" v-else>
             <p v-for="cat in categories" :key="cat.id">{{cat.name}},{{cat.description}}</p>
          </div>
         
    </div>
  
</template>
<style scoped>

</style>
