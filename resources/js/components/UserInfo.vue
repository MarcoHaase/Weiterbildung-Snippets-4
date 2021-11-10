<template>
  <div>
    <slot></slot>
  </div>
</template>

<script>
export default ({

})
</script>

<style scoped>
h2 {
  font-size: 400;
  font-size: 1.25rem;
  margin-bottom: 30px;
}

a {
  text-decoration: none;
  color: grey;
}

@media (min-width: 768px) {
  h2 {
    margin-bottom: 10px;
  }
}
</style>
