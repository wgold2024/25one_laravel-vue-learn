<template>
<div class="container">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div class="panel panel-default" style="margin-left: 20px;">
            <div class="form-group">
               <router-link to="/" class="btn btn-default">Back</router-link>
            </div>        
            <div class="panel-heading">Edit selected card</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Card Name</label>
                            <select v-model="card.card_id" class="form-control">
                               <option v-for="type, indextype in types" v-bind:value="type.id">{{ type.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Card Number</label>
                            <input type="text" v-model="card.number" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">User Name</label>
                             <select v-model="card.user_id" class="form-control">
                               <option v-for="user, indexuser in users" v-bind:value="user.id">{{ user.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>  
</div>    
</template>
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.cardId = id;
            axios.get('/cards/' + id)
                .then(function (resp) {
                    //console.log(resp.data);
                    app.card = resp.data;
                })
                .catch(function (resp) {
                    //console.log(resp);
                    alert("Could not load your card")
                });
        },
        data: function () {
            return {
                types: types,
                users: users,           
                cardId: 0,
                card: {
                    card_id: 0,
                    number: '',
                    user_id: 0,
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCard = app.card;
                axios.patch('./cards/' + app.cardId, newCard)
                    .then(function (resp) {
                        //console.log(resp);
                        app.$router.push({ name: 'dashboard', params: { cards: resp.data } }); //!!!name for params
                    })
                    .catch(function (resp) {
                        //console.log(resp);
                        alert("Could not create your card");
                    });
            }
        }
    }
</script>
