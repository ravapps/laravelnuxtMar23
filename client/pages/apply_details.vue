<template>
  <div class="container p-2 lg:p-8 flex flex-col">
    <p v-if="errors.length">
      <b>Please correct the following error(s):</b>
      <ul>
        <li v-for="error in errors">{{ error }}</li>
      </ul>
    </p>


    <div class="flex flex-wrap">
      <div class="w-full">
        <h1 class="block mb-1" >Personal Details</h1>
      </div>
    </div>

    <div class="flex flex-wrap -mx-4 space-y-4 md:space-y-0">
      <div class="w-full px-2 md:w-1/4">
        <input  id="alt_email" type="text"  name="alt_email" v-model="alt_email" placeholder="Alternative EmailID "  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
      <div class="w-full px-2 md:w-2/4">
        <input  id="address"  type="text"  placeholder="Address *" name="address"  v-model="address" class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
      <div class="w-full px-2 md:w-1/4">
        <input   id="pincode"  type="text"  placeholder="Pin Code *" name="pincode" v-model="pincode"   class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
    </div>

    <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
      <div class="w-full px-2 md:w-1/3">
         Your Photo: {{Photouploaded}}
        <input v-if="!isHidden" class="dtpclass form-control block w-34 px-2 py-1 text-sm font-normal text-gray-700
        bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" @change="selectFile" id="photo"
        ref='file' accept=".jpeg,.jpg,.png,image/jpeg,image/png" type="file">
      </div>
      <div class="w-full px-2 md:w-1/3">
           Your Resume: {{Documentuploaded}}
          <input v-if="!isHiddentwo" class="dtpclass form-control block w-34 px-2 py-1 text-sm font-normal text-gray-700
          bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" @change="selectFile" id="resume" type="file">
      </div>
      <div class="w-full px-2 md:w-1/3">
        <input   id="phone"  type="text"  placeholder="Phone *" name="phone" v-model="phone"   class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 space-y-4 md:space-y-0">
      <div class="w-full px-2 md:w-1/3">
        <input type="text" id="father"  placeholder="Guardian/Father Name * " v-model="father" name="father"  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
      <div class="w-full px-2 md:w-1/3">
        <input  id="mother"  placeholder="Mother Name" v-model="mother" name="mother" type="text" class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
      <div class="w-full px-2 md:w-1/3">
        <input   id="passport"  placeholder="Passport No" v-model="passport"  name="passport" type="text"  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
    </div>


    <div class="flex flex-wrap -mx-3 space-y-4 md:space-y-0">
      <div class="w-full px-2 md:w-1/3">
         <client-only> Your Date of Birth: <date-picker placeholder="MM/DD/YYYY" input-class="w-full h-8 px-3 text-base placeholder-white-600 border rounded-lg focus:shadow-outline"
         wrapper-class="dtpclass" format="dd/MM/yyyy" v-model="dob" /></client-only>
      </div>
      <div class="w-full px-2 md:w-2/3">
        <input    id="objective"  placeholder="Your objective " v-model="objective" name="objective" type="text"  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
    </div>



    <div class="flex flex-wrap -mx-3 space-y-4 md:space-y-0">
      <div class="w-full px-2 md:w-1/3">
        <input  id="income_tax_payee"  placeholder="Income Tax Number  "  v-model="income_tax_payee" name="income_tax_payee" type="text"    class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
      <div class="w-full px-2 md:w-2/3">
        <input   id="about"  placeholder="About You " v-model="about" name="about" type="text"  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 space-y-4 md:space-y-0">
      <div class="w-full px-2 md:w-1/3">
        <select placeholder="Preferred  " class="w-full h-8 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"  name="communication_preffered"   v-model="communication_preffered">
          <option value="">Communication  Preference *</option>
          <option value="email">email</option>
          <option value="msn">msn</option>
        </select>
      </div>
      <div class="w-full px-2 md:w-2/3">
        <input    id="hobbies"  placeholder="Hobbies " v-model="hobbies" name="hobbies" type="text"  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" />
      </div>
    </div>

    <div class="flex flex-wrap">
      <div class="w-full">
        <h1 class="block mb-1" >Education Details</h1>
      </div>
    </div>

    <div class="w-full ">
      <table>
        <thead><tr>
          <th>#</th>
          <th>Degree/Diploma/Certificate/Standard</th>
          <th>University/School</th>
          <th>Passing year </th>
          <th>Score/Percentage/Grade</th>
          <th></th>
        </tr></thead>
        <tbody v-sortable="table_lsts">
          <tr v-for="(lst,index) in table_lsts" >
            <td>
              {{ index +1 }} <input type="hidden" v-model="lst.user_id"  name="user_id"/>
            </td>
            <td>
              <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"  v-model="lst.degree_name" placeholder="* Eg - Associate Degree in Electrical" name="degree_name"/>
            </td>
            <td>
              <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"  v-model="lst.degree_univ"   placeholder="* Eg. - IGNOU"  name="degree_univ" />
            </td>
            <td>
              <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"  v-model="lst.year_passed" number  placeholder="* Eg - 2004"  name="year_passed"/>
            </td>
            <td>
              <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"  v-model="lst.score_grade" placeholder="* Ex - 60%, A+, 560" name="score_grade" />
            </td>
            <td>
              <button  class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"  @click="CreateRow(index,'a')">Add</button>
              <button  class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800" @click="deleteRow(index,'a')">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="flex flex-wrap">
      <div class="w-full">
        <h1 class="block mb-1" >Skills</h1>
      </div>
    </div>

    <div class="w-full ">
      <table>
        <thead><tr>
          <th>#</th>
          <th>Skill name eg:PHP</th>
          <th>Total Experience in months</th>
          <th>Expertise level  1 - 10</th>
          <th></th>
        </tr></thead>
        <tbody v-sortable="tble_lsts">
          <tr v-for="(lst,index) in tble_lsts" >
            <td>
              {{ index +1 }} <input type="hidden" v-model="lst.user_id"  name="user_id"/>
            </td>
            <td>
                <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"  v-model="lst.skill_name" placeholder="* Ex- PHP" name="skill_name"/>
            </td>
            <td>
                <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"  v-model="lst.exp_months" number  placeholder="* Ex- 20" name="exp_months" />
            </td>
            <td>
                <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"    v-model="lst.expertise" number   placeholder="Ex- 1" name="expertise" />
            </td>
            <td>
                <button  class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"  @click="CreateRow(index, 'b')">Add</button>
                <button  class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800" @click="deleteRow(index, 'b')">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="flex flex-wrap">
      <div class="w-full">
        <h1 class="block mb-1" >Employment History</h1>
      </div>
    </div>

    <div class="w-full ">
      <table>
        <thead><tr>
          <th>#</th>
          <th>Designation,Company Name</th>
          <th>From date</th>
          <th>To date </th>
          <th>Your responsibilities</th>
          <th>References</th>
          <th></th>
        </tr></thead>
        <tbody v-sortable="tle_lsts">
                <tr v-for="(lst,index) in tle_lsts" >
                    <td>
                      {{ index +1 }} <input type="hidden" v-model="lst.user_id"  name="user_id"/>
                    </td>
                    <td>
                        <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"  v-model="lst.desig_company" name="desig_company" placeholder="* Designation & Company name"/>
                    </td>
                    <td>
                      <client-only><date-picker  placeholder="MM/DD/YYYY"
                          input-class="w-32  h-8 px-3 text-base placeholder-white-600 border rounded-lg focus:shadow-outline"
                          wrapper-class="dtpclass"  format="dd/MM/yyyy" name="from_date" v-model="lst.from_date" />
                      </client-only>
                    </td>
                    <td>
                      <client-only>
                        <date-picker    placeholder="MM/DD/YYYY"
                        input-class="w-32 h-8 px-3 text-base placeholder-white-600 border rounded-lg focus:shadow-outline"
                        wrapper-class="dtpclass" format="dd/MM/yyyy" name="to_date" v-model="lst.to_date" />
                      </client-only>
                    </td>
                    <td>
                        <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" v-model="lst.responsibility_detail"  name="responsibility_detail"  placeholder="*" />
                    </td>
                    <td>
                        <input  class="w-full h-8 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"  v-model="lst.any_references"  name="any_references"   placeholder="" />
                    </td>
                    <td>
                        <button  class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"  @click="CreateRow(index,'c')">Add</button>
                        <button  class="h-10 px-5 m-2 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800" @click="deleteRow(index,'c')">Delete</button>
                    </td>
                </tr>
                <tr v-if="!tle_lsts.length"><td ><button  class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800"  @click="CreateRow(1,'c')">Add Row</button></td></tr>
              </tbody>
        </table>
    </div>

    <br><br>
    <div class="w-full text-center mt-4">
        <button class="h-10 px-5 m-2 text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800" type="button" @click="checkForm" >Save</button>
    </div>
    <br><br>
  </div>
</template>

<script lang="ts">

import  Vue  from 'vue'
import { GetterTree, MutationTree } from 'vuex'
import { Results } from '@/types/api'

export default  Vue.extend( {



  data () {
    const errors : string[] = []
    const results:Results = [];
    const table_lsts : any[] = []
    const tble_lsts : any[] = []
    const tle_lsts : any[] = []
    return {
        table_lsts: [
            { user_id:  this.$store.getters['userid'],  degree_name: '', degree_univ: "", year_passed: 2022, score_grade: ''},
        ],
        tble_lsts: [
            {  user_id:  this.$store.getters['userid'], skill_name: '', exp_months: 1, expertise: 1},
        ],
        tle_lsts: [
            {  user_id:  this.$store.getters['userid'], desig_company: '', from_date: "", to_date: "", responsibility_detail: '', any_references: ''},
        ],
        errors,
        dob:new Date(),
        alt_email:'',
        address:'',
        pincode:'',
        phone: '',
        father:'',
        communication_preffered:'',
        user_id:0,
        isHidden: false,
        Photouploaded: '',
        photpath: '',
        docpath: '',
        Documentuploaded: '',
        isHiddentwo: false,
        results,
        mother:'',
        passport:'',
        objective:'',
        income_tax_payee:'',
        about:'',
        hobbies: '',
    }
  },

  directives: {
    sortable: {
    }
  },

  created () {
    if(!this.$store.getters['islogged']) {
      this.$router.push('/login');
    }
    this.user_id = this.$store.getters['userid']
    this.dob.setFullYear(this.dob.getFullYear() - 18);
  },

  methods:{
    async selectFile(e:any):  Promise<void> {
      console.log( );
      const file = e.target.files[0];
      if (!file) return;
      let formData = new FormData();
      if(e.target.id == "photo") {
        this.isHidden = true;
      }
      if(e.target.id == "resume")  {
        this.isHiddentwo = true;
      }
      formData.append('file', file);
      formData.append('typeoffile', e.target.id);

      await this.$axios.post('storefile',
        formData,
          {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
          }
      ).then(res => {
        if(this.isHidden == true && this.photpath == '') {
          this.Photouploaded = 'Photo uploaded.'
          this.photpath = res.data.file;
        }
        if(this.isHiddentwo == true && this.docpath == '') {
            this.Documentuploaded = 'Document uploaded.'
            this.docpath = res.data.file;
        }
        console.log('pp ' + this.photpath);
        console.log('dp' + this.docpath);
        console.log(res.data.file);
        console.log(res);
      }).catch(err => {
        e.target.value = '';
        if(this.isHidden == true &&  this.Photouploaded.length == 0) {
          this.isHidden = false
          this.Photouploaded = ''
          this.photpath = '';
        }
        if(this.isHiddentwo == true &&  this.Documentuploaded.length == 0) {
          this.isHiddentwo = false
          this.Documentuploaded = ''
          this.docpath = '';
        }
        console.log(err)
      });
    },

    CreateRow: function (index:number, rowin:string) {
      this.errors = [];
      try {
        if(rowin == "a") {
          this.table_lsts.splice(index + 1, 0, { user_id:  this.$store.getters['userid'], degree_name: '', degree_univ: "", year_passed: 2022, score_grade: ''});
        }
        if(rowin == "b") {
          this.tble_lsts.splice(index + 1, 0,   {  user_id:  this.$store.getters['userid'], skill_name: '', exp_months: 1, expertise: 1});
        }
        if(rowin == "c") {
          this.tle_lsts.splice(index + 1, 0, {  user_id:  this.$store.getters['userid'], desig_company: '', from_date: "", to_date: "", responsibility_detail: '', any_references: ''});
        }
      } catch(e) {
           console.log(e);
      }
    },

    deleteRow: function (index:number, rowin:string) {
      this.errors = [];
      if(rowin == "a") {
        if(this.table_lsts.length > 1) {
          this.table_lsts.splice(index, 1);
        } else {
          this.errors.push('At least one educational qualification is required.');
        }
      }
      if(rowin == "b") {
        if(this.tble_lsts.length > 1) {
            this.tble_lsts.splice(index, 1);
        } else {
            this.errors.push('At least one skill is required.');
        }
      }
      if(rowin == "c") {
         this.tle_lsts.splice(index, 1);
      }
    },

    async checkForm(e:any):  Promise<void> {

      this.errors = [];

      if(this.alt_email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if ( !re.test(this.alt_email)) {
          this.errors.push('Valid Email required.');
        }
      }
      if(!this.address) {
        this.errors.push('Valid Address required.');
      }
      const ri = /^(0|[1-9][0-9]*)$/;
      if(!this.pincode || !ri.test(this.pincode)) {
        this.errors.push('Valid pin code required.');
      }
      if(!this.father) {
        this.errors.push('Valid father/guardian required.');
      }
      if(!this.phone) {
        this.errors.push('Valid phone required.');
      }
      if(!this.communication_preffered) {
        this.errors.push('Communication preference required.');
      }
      if(!this.photpath) {
        this.errors.push('Please upload your photo.');
      }
      if(!this.docpath) {
        this.errors.push('Please upload your resume.');
      }

      console.log(this.table_lsts);

      for(var x in this.table_lsts) {
        if(!this.table_lsts[x].degree_name) {
          this.errors.push('Degree name is required under eduction details.');
          break;
        }
        if(!this.table_lsts[x].degree_univ) {
          this.errors.push('University/College/School name is required under eduction details.');
          break;
        }
        if(!this.table_lsts[x].year_passed) {
          this.errors.push('Passing year is required under eduction details.');
          break;
        }
        if(!this.table_lsts[x].score_grade) {
          this.errors.push('Score/Grade/Percentage is required under eduction details.');
          break;
        }
      }

      for(var x in this.tble_lsts) {
        if(!this.tble_lsts[x].skill_name) {
          this.errors.push('Skill name is required under skills details.');
          break;
        }
        if(!this.tble_lsts[x].exp_months) {
          this.errors.push('Experience in month(s) is required under skill details.');
          break;
        }
        if(!this.tble_lsts[x].expertise) {
          this.errors.push('Expertise level begineer 1 to expert 10 is required under skill details.');
          break;
        }
      }

      for(var x in this.tle_lsts) {
        if(!this.tle_lsts[x].desig_company) {
          this.errors.push('Designation/company name is required under employment details.');
          break;
        }
        if(!this.tle_lsts[x].from_date) {
          this.errors.push('From date is required under emploment details.');
          break;
        }
        if(!this.tle_lsts[x].to_date) {
          this.errors.push('To date is required under emploment details.');
          break;
        }
        var d1 = new Date(this.tle_lsts[x].from_date);
        var d2 = new Date(this.tle_lsts[x].to_date);
        if(d1 > d2) {
          this.errors.push('Invalid date range entered under emploment details.');
          break;
        }
        if(!this.tle_lsts[x].responsibility_detail) {
          this.errors.push('Responsibilities during job is required under employment details.');
          break;
        }
      }
      console.log(this.phone);
      if(!this.errors.length) {
        try {
            this.results = (

              await this.$axios.post('userdetails', {
                  user_id: this.user_id,
                  alt_email: this.alt_email,
                  address: this.address,
                  pincode: this.pincode,
                  photo_path: this.photpath,
                  resume_path: this.docpath,
                  father: this.father,
                  phone: this.phone,
                  mother: this.mother,
                  passport: this.passport,
                  dob: this.dob.getDate()+'/'+(this.dob.getMonth()+1)+'/'+this.dob.getFullYear(),
                  objective: this.objective,
                  income_tax_payee: this.income_tax_payee,
                  skills: this.table_lsts,
                  education: this.tble_lsts,
                  employment: this.tle_lsts,
                  about: this.about,
                  communication_preffered: this.communication_preffered,
                  hobbies: this.hobbies,
              })




              ).data.data as Results;

 this.$router.push('/profile');

//              .then(res => {
//
  //              this.$router.push('/profile');

    //          })


            //  alert(this.results);
              //var parsedobj = JSON.parse(JSON.stringify(this.results));
              //console.log(this.results);
              //console.log(this.results);
              //this.$store.commit("changeislogged", 1);
              //this.$store.commit("changetoken", this.results);

        }
        catch(e:any){
             this.errors.push('Invalid user details added');
        }
      }
      e.preventDefault();
    },

    reset: function (e:any) {
        //  this.errors = [];
        e.preventDefault();
    }

  }


})
</script>
