<template>
<div class="container p-2 lg:p-8 flex flex-col">

<form   id="app"
@submit.prevent="checkForm"
action="http://localhost"
class="space-y-4 text-gray-700"
method="post">
<p v-if="errors.length">
  <b>Please correct the following error(s):</b>
  <ul>
    <li v-for="error in errors">{{ error }}</li>
  </ul>
</p>
<div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
    <div class="w-full px-2 md:w-1/2">
      <label class="block mb-1" for="formGridCode_name">Email</label>
      <input v-model="email" type="text" id="email" name="email" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
    </div>
    <div class="w-full px-2 md:w-1/2">
      <label class="block mb-1" for="formGridCode_last">Password</label>
      <input name="password" type="password"  v-model="password"  id="password"  class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
    </div>

  </div>
  <div class="flex flex-wrap">
      <div class="w-full text-center mt-4">
        <button class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800" type="submit" >Login</button>
      </div>
    </div>
     </form>

 </div>
</template>
<script lang="ts">
import Vue from 'vue'
import { GetterTree, MutationTree } from 'vuex'
//import { RootState } from '~/store'
import { Results } from '@/types/api'
//export default Apply

export default  Vue.extend( {
data () {
const results:Results = [];
const errors : string[] = [];
    return {
      errors,
      email: '',
      password: '',
      results
    }
  },
  methods:{



  async checkForm(e:any):  Promise<void> {

      this.errors = [];





      const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      // min 8 chars
      const rpaas = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
      if (!this.email || !re.test(this.email)) {
        this.errors.push('Valid Email required.');
      }

      if (!this.password || !rpaas.test(this.password)) {
        this.errors.push('Invalid login details Please try again');
      }




      e.preventDefault();
  try {
  this.results = (

    await this.$axios.post('auth/login', {
      email: this.email ,
      password: this.password
    })).data.data.token as Results;

    //alert(this.results);
    var parsedobj = JSON.parse(JSON.stringify(this.results));
    console.log(this.results);
    //console.log(this.results);
    this.$store.commit("changeislogged", 1);
    var toky = String(this.results).split('|');
    console.log(toky[1]);
    this.$store.commit("changetoken", toky[1]);
    var token =  this.results;




   }
   catch(e:any){
        this.errors.push('Invalid login details');
   }

   try {
   this.results = (

     await this.$axios.get('me',{
       headers: {
           'Authorization': 'Bearer '+this.$store.getters['token']
       }
     })).data as Results;
     console.log(this.results.id);
     this.$store.commit("changeuserid", this.results.id);
         this.$router.push('/profile');
   }
   catch(e:any){
        this.errors.push('Invalid login details');
   }



    },
    reset: function (e:any) {

          this.errors = [];

            this.email = '';
            this.password = '';

      e.preventDefault();
    }
  }


})




</script>
