<template>
    <section class="container-groß">

        <div>
            {{ myid }}
            <button @click="toggleUser" class="btn btn-primary">Toggle</button>
            <button @click="loadUser" class="btn btn-primary">Laden</button>
            <button v-on:click="saveUser" class="btn btn-primary">Speichern</button>
        </div>
        <template v-if="userid == 0">
        <user-item 
            v-for="i in users" 
            :key="i.id" 
            :user="i"
            :myid="myid"
            v-on:userevent="event2"
        />

        </template>
        <template v-else>
          <user-details :uid="userid"/>
        </template>
    </section>
</template>

<script>
import UserItem from "./UserItem.vue";
import ShowDetails from "./ShowDetails.vue";
import UserDetails from "./UserDetails.vue";
export default {
    data: () => ({
        userid: 0,
        users: []
    }),
    props: {
      'myid': String
    },
  components: {
    UserItem,
    UserDetails,
    ShowDetails,
  },
  methods: {
      event2 (uid) {
        this.userid = uid;
        alert("Hallo, ich bin Event 2. ID: " + uid);
      },
    toggleUser(){
      if (this.userid == 0 ) {
        this.userid = 3;
      }else{
        this.userid = 0;
      }
    },
      async loadUser () {
          try {
            console.log("Ich wurde angeklickt");
            let inhalt = await axios.get("/api");
            console.log(inhalt.data);
            for (let d of inhalt.data) { //in = index, of = value
              //d.id = this.users.length + 1;
              //d.picture = {large:"https://randomuser.me/api/portraits/men/61.jpg"};
              if (d.id != this.myid)
                this.users.push(d);
            }
          } catch(e) {
            console.error(e);
          }
      },
      async saveUser () {
          try {
            console.log("Save");
            let randomuser = await axios.get("https://randomuser.me/api");
            let inhalt = await axios.post("/api", randomuser.data.results[0]);
            console.log(inhalt.data);
          } catch(e) {
            console.error(e);
          }
      }

  },
  beforeCreate() {
    //this.loadUser();
    //console.log("Component beforeCreate.");
  },
  created() {
    this.loadUser();
    console.log("Component created.");
  },
  beforeMount() {
    //this.loadUser();
    //console.log("Component beforeMount.");
  },
  mounted() {
    //this.loadUser();
    //console.log("Component mounted.");
  },
  beforeUpdate() {
    //this.loadUser();
    //console.log("Component updated.");
  },
};
</script>

<style scoped>
.container-groß {
  display: block;
  justify-content: center;
  align-self: center;
  text-align: center;
  width: 100%;
  margin: 25px;
  border-radius: 10px;
}

h1 {
  font-size: 2rem;
  margin: 1rem;
  text-align: center;
  font-weight: 700;
  padding: 15px;
}

@media (min-width: 768px) {
  .container-groß {
    max-width: 1000px;
    margin: auto;
  }
}

@media (min-width: 1024px) {
  .container-groß {
    display: flex;
    flex-wrap: wrap;
  }
}

</style>