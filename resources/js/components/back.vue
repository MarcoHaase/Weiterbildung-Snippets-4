<template>
<div>
   <button  v-on:click="backToUsers" class="btn">
       Zurück 
    </button>
   
  
  </div>  
</template>
<script>


export default ({
   methods: {
    backToUsers() {
      console.log("Back to user list clicked");
        try {
       window.location.href = "/home";
  

      }catch(e){
        console.error(e)
      }
    },
  },
})
</script>
<style scoped>
 

</style>
