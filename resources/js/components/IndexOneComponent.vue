<template>
               <table>
                 <thead>
                  <tr>
                    <td>Card Name</td>
                    <td>Card Number</td>     
                    <td>User Name</td>                    
                    <td>Date of create</td>                                                      
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
            //...
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
