<script setup>
    import { computed,ref,watch, reactive } from 'vue'
    import { useRoute, useRouter } from 'vue-router'

    const router = useRouter()
    const route = useRoute()
    
    //let villes=ref([{ville_nom:"paris"},{ville_nom:"lyon"}])
    
    
    let dataSearch=ref('')
    let villes=ref('')
    const answer=ref('')
    const loading = ref(false)
    const searchVille2=ref('')
    const nom_ville=ref('')
    
    const props=defineProps({
      msg: {
        type: String,
        required: false,
        default: "Message"
      },
      pter: {
        type: String,
        required: false
      },
    })
    
    
    function display() {
      console.log(villes)
    }
    
    watch (searchVille2, async (newQuestion, oldQuestion) => {
      console.log("set Term")
      const url = 'http://163.172.211.49/pter/db_02/readVille_3.php?term='+newQuestion
      loading.value = true
      answer.value = 'Thinking...'
      console.log(newQuestion, oldQuestion)
      if (1==1) {
        loading.value = true
        answer.value = 'Thinking...'
        try {
          const Response = await fetch(url,{
            method: 'get',
            dataType: "json",
            headers: {
              'Content-Type': 'application/json'
            }
          })
          villes.value = await Response.json()
          console.log("answer",answer);
        } catch (error) {
          answer.value = 'Error! Could not reach the API. ' + error
        } finally {
          loading.value = false
        }
      }
        //villes = await Response.json()
      
        
      //return villes
    })
    
    /*
    const searchVille = computed({
        async get() {
        
        },
        async set(dataSearch) {
            console.log("set Term searchVille",dataSearch)
            const url = 'http://163.172.211.49/pter/db_02/readVille_3.php?term='+dataSearch
            const Response = await fetch(url,{
                method: 'get',
                dataType: "json",
                headers: {
                  'Content-Type': 'application/json'
                }
              })
            villes = await Response.json()
            console.log (villes)
            return villes
            //return route.query.search ?? ''
        }
    }) 
    //console.log ("globale",villes);
  */
</script>

<template>
  
  <div>
    
    <h3>
      Création d'un CRUD
    </h3>
  </div>
  <div>
      <h4>Liste des villes</h4>
      
      <p></p>
       Search: <input v-model="searchVille2" maxlength="20">
       
  </div>
  <div>
      <h4>Ville </h4>
      
      Nom : <input v-model="nom_ville">
  </div>
  <ul>
    <li v-for="ville in villes">
      {{ville.ville_code_postal}}--{{ ville.ville_nom }}
    </li>
  </ul>
</template>

<style scoped>
h1 {
  font-weight: 500;
  font-size: 2.6rem;
  position: relative;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

.green {
    color: green;
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}
</style>
