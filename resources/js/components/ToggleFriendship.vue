<template>
<div class="p-3">

<vue-toggles
  checkedText="On"
  uncheckedText="Off"
  :value="value" 
  @click="togglefriendship"
/>

</div>  
</template>

<script>
import VueToggles from 'vue-toggles';

export default ({
  data:() =>({
    value: false,
  }),

  props:{
    uid:Number,
    v:Boolean
  },

  methods:{
      async togglefriendship () {
          try {
            console.log("Ich wurde angeklickt");
            let inhalt = await axios.get("/api/tf/" + this.uid);
            console.log(inhalt.data);
            this.value = inhalt.data;
            // noch die daten hochgeben an Useritems mit emit
          } catch(e) {
            console.error(e);
          }
      }
  },
  components: {
    VueToggles,
  },

  created() {
    this.value = this.v;
  }

})
</script>

<style scoped>

</style>
