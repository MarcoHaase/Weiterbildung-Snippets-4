<template>
    <div class="foto">
      <img :src="url" alt="Friend1" />
    </div>
</template>

<script>
export default ({
    props: {
        'url':String
    }
})
</script>

<style scoped>
.foto > img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin: 10px;
}

@media (min-width: 1024px) {
  .foto > img {
    width: auto;
    height: auto;
    margin: 0;
    border-radius: 0%;
  }
}
</style>
