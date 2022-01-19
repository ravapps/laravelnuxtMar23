<template>

<div class="w-full h-90">
<nav class="bg-white shadow-lg">
  <div class="max-w-6xl mx-auto px-4">
    <div class="flex justify-between">
      <div class="flex space-x-7">

      <div>
        <a href="#" class="flex items-center py-4 px-2">
        <br><br>
          <IconLaravel class="w-16 h-16 -mt-8" primary="text-red-500" />
          <span class="font-semibold text-gray-500 text-lg"
            >Navigation</span
          >
        </a>
      </div>

      <div class="hidden md:flex items-center space-x-1">

      <NuxtLink to="/" class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold hover:text-gray-500 transition duration-300">
        Home
      </NuxtLink>




   <NuxtLink v-if="is_logged"  to="/profile" class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold hover:text-gray-500 transition duration-300">
     My Profile
   </NuxtLink>

   <NuxtLink  v-if="is_logged"  to="/" class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold hover:text-gray-500 transition duration-300"  @click.native="logout" >
     Logout
   </NuxtLink>


  <NuxtLink  v-if="!is_logged"  to="/apply" class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold hover:text-gray-500 transition duration-300">
    Register
  </NuxtLink>

   <NuxtLink v-if="!is_logged" to="/login" class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold hover:text-gray-500 transition duration-300">
     Login
   </NuxtLink>





    </div>
    				</div>
    			</div>
    		</div>
    	</nav>
      </div>
</template>

<script>
import Vue from 'vue'
import { IconLaravel, IconNuxt } from 'tv-icon'
import { getters, MutationTree } from 'vuex'
import { RootState } from '~/store'
export default Vue.extend({
  components: { IconLaravel, IconNuxt },

  computed: {
    is_logged () {

      return this.$store.getters['islogged'];
    },
  },
  methods: {
    logout: function () {
        this.$store.commit("changeislogged", 0);
        this.$router.push('/apply');
    }
  }
})
</script>
