<template>
<div class="container">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div class="panel panel-default" style="margin-left: 20px;">
            <div class="form-group">
               <router-link to="/" class="btn btn-default">Back</router-link>
            </div>
            <div class="panel-heading">Create new card</div>
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
        data: function () {
            return {
                types: types,
                users: users,
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
                axios
                  .post('./cards', newCard)
                    .then(function (resp) {
                        //console.log(resp.data);                    
                        //app.$router.push({path: '/'}); //...or... - but it's without parameters
                        //app.$router.push('/'); //...or... - but it's without parameters
                        app.$router.push({ name: 'dashboard', params: { cards: resp.data } }); //!!!name for params
                    })
                    .catch(function (resp) {
                        //console.log(resp);
                        alert("Could not create new card");
                    });
            }

        }
    }
</script>
