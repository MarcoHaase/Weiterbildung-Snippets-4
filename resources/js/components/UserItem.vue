<template>
  <div class="flex-container">
      <user-image
        :url="user.picture"
      />
      <user-infos
        :data="userinfo"
      />
      <show-details
        :uid="user.id"
        v-on:userevent="event1"
      />
      <toggle-friendship
        :v="myid == user.isfriend"
        :uid="user.id"
      />
  </div>
</template>

<script>
import UserImage from "./UserImage.vue";
import UserInfos from "./UserInfos.vue";
import ShowDetails from "./ShowDetails.vue";
import ToggleFriendship from "./ToggleFriendship.vue";

export default ({
    computed: {
        userinfo () {
          let n = "undefined";
            if (typeof this.user.name === "string") {
              n = this.user.name
            }
            if (typeof this.user.name === "object") {
              n = this.user.name.first + " " + this.user.name.last
            }
            return {
                name:n,
                phone:this.user.phone,
            }
        }
    },
    props: {
        'user':Object,
        'myid': String
    },
    methods: {
      event1 (uid) {
        alert("Hallo, ich bin Event 1. ID: " + uid);
        this.$emit("userevent", uid);
      }
    },
    components: {
    UserImage,
    UserInfos,
    ShowDetails,
    ToggleFriendship,
  }
})
</script>

<style scoped>
.flex-container {
  max-width: 368px;
  height: 120;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-self: center;
  background-color: white;
  border-radius: 6px;
  margin: 8px;
  box-shadow: 0 0 8px 1px #6d6c6c;
  transition: all 0.4s ease-in;
}

.flex-container:hover {
  background-color: rgb(223, 223, 223);
}

@media (min-width: 768px) {
  .flex-container {
    width: 230px;
    height: 230px;
    flex-direction: column;
  }
}

@media (min-width: 1024px) {
  .flex-container {
    height: auto;
  }
}
</style>
