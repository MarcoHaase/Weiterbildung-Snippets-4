<template>
  <div class="button">
    <button @click="setUserID" class="btn btn-primary">Show Details</button>
  </div>
</template>

<script>
export default ({
  props: {
    'uid': Number,
  },
  methods: {
    setUserID() {
      //alert(this.$parent.$parent.userid);
      //alert("Hallo: " + this.uid);
      //this.$parent.$parent.userid = this.uid;
      //this.$parent.userid = this.uid;
      this.$emit("userevent", this.uid);
    }
  }
})
</script>

<style scoped>
.button {
  margin: 5px;
}
</style>
