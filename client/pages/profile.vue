<template>

<div class="max-w-7xl flex items-center h-auto p-5 flex-wrap mx-auto my-32 lg:my-0">

<div v-for="res in results" id="profile" class="w-full lg:w-4/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">


  <div class="p-4 md:p-12 text-center lg:text-left">
    <!-- Image for mobile view-->
    <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center" ></div>

    <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{res.user[0].name}}</h1>
    <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
    <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start"><svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z"/></svg>{{res.user[0].email}} </p>
    <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start"><svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm7.75-8a8.01 8.01 0 0 0 0-4h-3.82a28.81 28.81 0 0 1 0 4h3.82zm-.82 2h-3.22a14.44 14.44 0 0 1-.95 3.51A8.03 8.03 0 0 0 16.93 14zm-8.85-2h3.84a24.61 24.61 0 0 0 0-4H8.08a24.61 24.61 0 0 0 0 4zm.25 2c.41 2.4 1.13 4 1.67 4s1.26-1.6 1.67-4H8.33zm-6.08-2h3.82a28.81 28.81 0 0 1 0-4H2.25a8.01 8.01 0 0 0 0 4zm.82 2a8.03 8.03 0 0 0 4.17 3.51c-.42-.96-.74-2.16-.95-3.51H3.07zm13.86-8a8.03 8.03 0 0 0-4.17-3.51c.42.96.74 2.16.95 3.51h3.22zm-8.6 0h3.34c-.41-2.4-1.13-4-1.67-4S8.74 3.6 8.33 6zM3.07 6h3.22c.2-1.35.53-2.55.95-3.51A8.03 8.03 0 0 0 3.07 6z"/></svg>{{res.address}} {{res.pincode}}</p>
    <p class="pt-8 text-sm">{{res.about}}


<a class="link" :href="`${$config.imgURL}` + `${rp}`" target="_blank" ><button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full"  type="submit" >Download Resume</button></a>
<a class="link" href="#"  onclick="alert('TODO: Streaming photo from laravel api call ');" ><button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full"  type="submit" >Download Photo</button></a><br><br><br>

Phone: {{res.phone}}<br>
Father: {{res.father}}<br>
Date Of Birth: {{format_date(res.dob)}}<br>

Communication Preference: {{res.communication_preffered}}<br>

<br>
<strong><u>Skills</u></strong><br>
<p v-for="(sk, index) in res.skills">
  {{index+1}}. {{sk.skill_name}}
  {{sk.exp_months}} months,
  Expertise level  is {{sk.expertise}}/10<br>
</p>

<br>
<strong><u>Education</u></strong><br>

<p v-for="(ed, index) in res.educations">
  {{index+1}}. {{ed.degree_name}} <i><strong>from</strong></i>
  {{ed.degree_univ}} <i><strong>passed in </strong></i>
  {{ed.year_passed}} <i><strong>with </strong> </i>
  {{ed.score_grade}} <i><strong> score  </strong> </i>
</p>

<br>
<strong v-if="res.employments.length"><u>Work Experience</u></strong><br>

<p v-for="ep in res.employments">
  {{index+1}}. {{ep.desig_company}} <i><strong> worked from</strong></i>
  {{ep.from_date}}  <i><strong>to</strong></i>
  {{ep.to_date}}
  <i><strong>Responsible for: </strong></i> {{ep.responsibility_detail}}
  <i><strong>References: </strong></i> {{ep.any_references}}
</p>

<br>
<strong><u>Other Details</u></strong> (if any)<br>

<p v-if="res.alt_email">Alternate email: {{res.alt_email}}</p>
<p v-if="res.mother">Mother: {{res.mother}}</p>
<p v-if="res.passport">Passport: {{res.passport}}</p>

<p v-if="res.objective">Objective: {{res.objective}}</p>
<p v-if="res.income_tax_payee">Income Tax Details: {{res.income_tax_payee}}</p>
<p v-if="res.hobbies">Hobbies: {{res.hobbies}}</p>

</p>

    <div class="pt-12 pb-8">


    </div>

    <div class="mt-6 pb-16 lg:pb-0 w-4/5 lg:w-full mx-auto flex flex-wrap items-center justify-between">

      <a class="link" href="#" onclick="alert('TODO: Update crud to implement ');"  >  <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full"  type="submit" >Edit</button></a>

      <a class="link" href="#" @click="dele"  ><button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full"  >Delete</button></a>
      <a class="link" href="#"  onclick="alert('TODO: Print in same format ');"  ><button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full"  type="submit" >Print</button></a>
      <a class="link" href="#" onclick="alert('TODO: Pdf in same format ');" ><button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full"  type="submit" >Save as PDF</button></a>
      <a class="link" href="#"  onclick="alert('TODO: Export to excel sheet ');" ><button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full"  type="submit" >Save as Excel</button></a>

    </div>



  </div>

</div>


<div v-if="pp" class=" h-full w-full lg:w-1/5">

  <img v-bind:src="`${$config.imgURL}` + `${pp}`" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block">

</div>
<div v-else class=" h-full w-full lg:w-1/5">
<NuxtLink to="/apply_details">
  <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full"  type="submit" >Add User Details</button>
</NuxtLink>
</div>
</div>



</template>
<script lang="ts">
import  Vue  from 'vue'


import { GetterTree, MutationTree } from 'vuex'
import { Results } from '@/types/api'
import moment from 'moment';
export default  Vue.extend( {
data () {

const results:Results = [];
const errors : string[] = []

    return {
      results,
      errors,
      pp: '',
      rp: '',


    }
  },



beforeCreate () {

  if(!this.$store.getters['islogged']) {
    this.$router.push('/login');
  }
},
mounted () {
  this.get()
  console.log('test')
},

  methods:{

  async get (): Promise<void> {
    //await this.$sleep(2000)
    this.results = (
      await this.$axios.get('getuserdetails', {
        params: { id: this.$store.getters['userid'] },
        headers: {
            'Authorization': 'Bearer '+this.$store.getters['token']
        }
      })
    ).data as Results
    this.pp = this.results[0].photo_path;
    console.log(this.pp);
    this.rp = this.results[0].resume_path;

    console.log(this.results[0].dob);
  },

  async dele (): Promise<void> {
    //await this.$sleep(2000)
    this.results = (
      await this.$axios.get('deluserdetails', {
        params: { id: this.$store.getters['userid'] },
        headers: {
            'Authorization': 'Bearer '+this.$store.getters['token']
        }
      })
    ).data as Results
    if(this.results.status == 'Success') {
      this.$router.push('/');
    }
  },


  format_date: function(value){
     if (value) {
       return moment(String(value)).format('DD MMM YYYY')
      }
  },


  }


})




</script>
