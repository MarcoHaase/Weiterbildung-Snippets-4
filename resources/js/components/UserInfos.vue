<template>
    <div class="text">
        <user-info><h2>{{data.name}}</h2></user-info>
        <user-info><a href="#">{{data.phone}}</a></user-info>
    </div>
</template>

<script>
import UserInfo from "./UserInfo.vue";

export default ({
    props: {
        'data':Object
    },
    components: {
    UserInfo,
  }
})
</script>

<style scoped>
.text {
  padding: 20px;
  text-align: right;
}

@media (min-width: 768px) {
  .text {
    text-align: center;
  }
}
</style>
