<template>
    <div class="wrapper" id="home-wrapper">
      <div class="row">
          <div class="col-md-6 col-md-push-3">
              <div class="panel panel-default">
              <div class="panel-heading"><strong>Login</strong></div>
              <form v-on:submit.prevent="handleLoginFormSubmit()">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Please Enter Email Address"
                           v-model="login.email"
                    />
                </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input type="password"
                             class="form-control"
                             placeholder="Please Enter Password"
                             v-model="login.password"
                              />
                  </div>

                <button class="btn btn-primary">Login</button>
              </form>
            </div>
          </div>
      </div>
    </div>
</template>

<script>
    import {loginUrl , getHeader , userDataUrl} from './config.js';
    import {clientId , clientSecret} from './env';
export default {
    data () {
        return {
            login: {
                email: 'osama@gmail.com',
                password: 'secret'
            }
        }
    },
    methods: {
        handleLoginFormSubmit(){
            const userData = {
                grant_type: 'password',
                client_id : clientId,
                client_secret : clientSecret,
                username : this.login.email,
                password : this.login.password,
                scope    : ''
            };
            const authUser = {};
            this.$http.post(loginUrl,userData)
                    .then(response => {
                            if(response.status == 200){
                                authUser.access_token = response.data.access_token;
                                authUser.refresh_token = response.data.refresh_token;
                                window.localStorage.setItem('authUser',JSON.stringify(authUser));
                                this.$http.get(userDataUrl,{headers : getHeader()})
                                .then(userResponse => {
                                    console.log(userResponse);
                                    authUser.email = userResponse.body.email;
                                    authUser.name = userResponse.body.name;
                                    window.localStorage.setItem('authUser',JSON.stringify(authUser));
                                    this.$router.push({name : 'dashboard'});
                                });
                            }
            });
        }
    }
}
</script>

<style lang="sass">
    @import "assets/css/bootstrap.css";
</style>
