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
        <label class="block mb-1" for="formGridCode_last">Name</label>
        <input  v-model="name" type="text" id="name" name="name"  class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
      <div class="w-full px-2 md:w-1/2">
        <label class="block mb-1" for="formGridCode_name">Email</label>
        <input v-model="email" type="text" id="email" name="email" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
    </div>
    <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
        <div class="w-full px-2 md:w-1/2">
          <label class="block mb-1" for="formGridCode_name">Password</label>
          <input name="password" type="password"  v-model="password"  id="password"   class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
        </div>
        <div class="w-full px-2 md:w-1/2">
          <label class="block mb-1" for="formGridCode_last">Confirm Password</label>
          <input name="confirmpassword" type="password"   v-model="confirmpassword"  id="confirmpassword"  class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
        </div>

      </div>


      <div class="flex flex-wrap">
          <div class="w-full text-center mt-4">
          <button class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"  type="submit" className="btn btn-primary mr-1">Register</button>
          <button class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"  type="button" @click="reset" className="btn btn-secondary">Reset</button>

          </div>
        </div>

         </form>
         </div>

 </div>
</template>
<script lang="ts">
import Vue from 'vue'
import { GetterTree, MutationTree } from 'vuex'
//import { RootState } from '/store'
//import { Users } from '@/types/api'
//export default Apply
import { Results } from '@/types/api'
export default  Vue.extend( {
data () {
const results:Results = [];
const errors : string[] = [];
    return {
      errors,
      name: '',
      email: '',
      password: '',
      confirmpassword: '',
      results
    }
  },
  methods:{
    async checkForm(e:any):  Promise<void> {

      this.errors = [];
      //alert(this.$store.getters['islogged']);

    //  alert('SUCCESS!!');
      //return false;


    //  this.$store.commit("changeislogged", 1);
      //this.$store.getters['islogged'] = 1;
      if (!this.name) {
        this.errors.push('Name required.');
      }

      const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      // min 8 chars
      const rpaas = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
      if (!this.email || !re.test(this.email)) {
        this.errors.push('Valid Email required.');
      }

      if (!this.password || !rpaas.test(this.password)) {
        this.errors.push('Valid Password required. should have upper  & lower case alphabet,number,special char & 8 chracers');
      }

      if (this.password != this.confirmpassword) {
        this.errors.push('Password mis match.');
      }
      if(!this.errors.length) {
        try {
        this.results = (

          await this.$axios.post('auth/register', {
            name: this.name,
            email: this.email ,
            password: this.password,
            password_confirmation: this.password,
          })).data.data.token as Results;

          //alert(this.results);
          var parsedobj = JSON.parse(JSON.stringify(this.results));
          console.log(this.results);
          //console.log(this.results);
          this.$store.commit("changeislogged", 1);
          var toky = String(this.results).split('|');
          console.log(toky[1]);
          this.$store.commit("changetoken", toky[1]);



          this.results = (

            await this.$axios.get('me',{
              headers: {
                  'Authorization': 'Bearer '+this.$store.getters['token']
              }
    })).data as Results;
 this.$store.commit("changeuserid", this.results.id);




          //this.$store.commit("changetoken", this.results);
          this.$router.push('/apply_details');




         }






         catch(e:any){
              this.errors.push('Invalid registeration details');
         }
       }
      e.preventDefault();
    },
    reset: function (e:any) {

          this.errors = [];
            this.name = '';
            this.email = '';
            this.password = '';
            this.confirmpassword = '';
      e.preventDefault();
    }
  }


})




</script>
