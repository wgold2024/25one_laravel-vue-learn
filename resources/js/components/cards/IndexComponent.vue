<template>
      <table>
         <thead>
          <tr>
            <td>Card name</td>
            <td>Card number</td>     
            <td>User name</td>                    
            <td>Date of create</td>          
            <td class="widthbutton">Edit</td>                                                             
            <td class="widthbutton">Delete</td>                                              
          </tr>  
          </thead>
         <tbody id="pannel">
            <tr v-for="card, index in cards">
                <td>{{ card.card.name }}</td>
                <td>{{ card.number }}</td>
                <td>{{ card.user.name }}</td>
                <td>{{ card.created_at }}</td>                                               
                <td>
                    <router-link class="btn btn-xs btn-edit" :to="{name: 'EditComponent', params: {id: card.id}}">
                        Edit
                    </router-link>      
                </td>
                <td>               
                    <a href="#" v-on:click="deleteCard(card.id, index)" v-on:click.prevent class="btn btn-xs btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
        </tbody>        
      </table>
</template>

<script>
    export default {
        data: function() {
           return {
              cards: cards,
             }
        },
        mounted() {
           /*
           console.log(this.$route.params);
           if (this.$route.params.cards) {
              console.log(this.$route.params.cards);
              this.cards = this.$route.params.cards;
           }   
           */
           //or... 
           let app = this;
            if (app.$route.params.cards) {
               app.cards = app.$route.params.cards;
           }             
        },
        methods: {
           deleteCard: function(id, index){
             var app = this;
             axios
              //.delete('/api/cards/' + id)   
              .delete('/cards/' + id)       
                .then(function (resp) {                
                     //console.log(resp.data);                
                     app.cards = resp.data;
                    //app.cards.splice(index, 1);
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not delete card");
                });
           },
                
        },
    }
</script>
