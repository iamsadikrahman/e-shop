import axios from 'axios'
import { defineStore } from 'pinia'


export const useCategoryStore = defineStore('category', {
 state:()=>({
   categories:[],
 }),
 
  actions: {
   fetchCategories: async function(){
    try {
         let response = await axios.get('http://127.0.0.1:8000/api/categories');
         return response;
    } catch (error) {
        console.log(error);
    }
    
    
   }
  },
})