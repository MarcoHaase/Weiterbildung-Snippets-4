<template>
      <div class="overlay-container">
         <div class="card-header">
           <h2>{{user.name}}</h2><div class="inline"> <back /></div></div>

          <div class="card-body justify-content-center text-left">
            <div class="flex row justify-content-between"> 
              <user-image
                :url="user.picture"/>
             <div class="basics p-3 flex column  justify-content-between">
          
             <span class="block heading">{{ user.title }}  {{ user.name }} </span> 
             <span  class="block">Geburtsdatum: <br> {{ user.dob}}</span>  
             <span  class="block">Benutzer seit: <br>{{user.registered}}</span>
           
           </div>
              <toggle-friendship 
                :uid="user.id"
              />
              </div>
           
         
           <div class="contactdata">
             <p><b>E-Mail: </b>{{user.email}}</p>
              <div class="phones">
                <p><b>Telefon: </b>{{user.phone}} | <b>Mobil: </b>{{user.cell}}</p>
              </div>
                <div class="Adress">
                 <p class="my">{{user.street}}<br><b>{{user.postcode}} {{  user.city  }} {{user.state}}</b></p>
                
              </div>
              <a class="attribution" href="https://www.freepik.com/vectors/background">Background vector created by freepik - www.freepik.com</a>
           </div>
            <div class="tags">
              hier kommen die tags über interessen der User hin
            </div>
        
          
         
          </div>
        <div class="card-footer"> 
          <back />
          </div>

           
        </div>
</template>


<script>
import UserImage from "./UserImage.vue";
import UserInfos from "./UserInfos.vue";
import Back from "./back.vue";
import ToggleFriendship from "./ToggleFriendship.vue";
export default ({
    props:{
    'uid':Number
  },
 data:() =>({
         
          user:[]
        }),
  methods: {
    async fetchUser() {
      console.log(this.uid)
      console.log("fetch User");
        try {
        let url = "/api/details/" + this.uid;
        console.log(url);
        let response = await axios.get(url);
        console.log (response.data);
        this.user =  (response.data);
    

      }catch(e){
        console.error(e)
      }
    },
  },

    computed:{
  
    },

    components:{
        UserImage,
       UserInfos,
        Back,
        ToggleFriendship,
       
    },
    created() {
    this.fetchUser();
  
    console.log("userdetails created.");
    
  
  },  
})

</script>
<style scoped>
.card-header{
  display:flex;
  flex-direction: row ;
  justify-content: space-between;
}
.overlay-container {
  width: 80vw;
  height: 80vh;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-self: center;
  background-color: white;
  border-radius: 6px;
  margin: 8px;
  box-shadow: 0 0 8px 1px #6d6c6c;
  transition: all 0.4s ease-in;
}

.block{
  display: block;
}

.heading  {
    color: darkblue;
    font-weight: 700;
    font-size: 1.4rem;
}

h1 {
  font-size: 2rem;
  margin: 1rem;
  text-align: center;
  font-weight: 700;
  padding: 15px;
}

.contactdata {
  background: aqua  url('/img/5770958.jpg') no-repeat center top  ;
  background-size: cover;

  border: 1px soild grey;
  border-radius: 10px;
  padding: 1rem 4rem 1rem  2rem;
}

.tags{
   background: aqua  url('/img/5770958.jpg') no-repeat center bottom  ;
  background-size: cover;
  margin-top:3rem;
  border: 1px soild grey;
  border-radius: 10px;
  padding: 1rem 4rem 1rem  2rem;
}

.attribution{
  opacity: 0.1;
  margin-bottom:-1rem;
}

.attribution:hover{
  opacity: 1;
  background-color:darkblue;
  color:wheat;

}


@media (min-width: 768px) {


}


@media (min-width: 1024px) {
  .overlay-container{
width: 60vw;
 }
 
}

</style>