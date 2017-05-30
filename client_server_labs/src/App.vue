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
    import {loginUrl} from './config.js';
    import {clientId , clientSecret} from './env';
export default {
//  name: 'app',
//  created () {
//    const postData = {
//      grant_type: 'password',
//      client_id: 4,
//      client_secret: 'XT0ae1fiG6d49hSn6cfB2q3iFiYZxgk1C6tGCHLL',
//      username: 'osama@gmail.com',
//      password: 'secret',
//      scope: ''
//    };
//    this.$http.post('http://localhost:8000/oauth/token',postData)
//        .then(response => {
//            console.log(response);
//            const token = response.body.access_token;
//            const header = {
//              'Accept': 'application/json',
//              'Authorization': 'Bearer '+ token
//            };
//            this.$http.get('http://localhost:8000/api/user',{ headers: header})
//              .then(response => {
//                  console.log(response);
//              });
//        });
//  }

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
            this.$http.post(loginUrl,userData)
                    .then(response => {
                            console.log(response);
            });
        }
    }
}
</script>

<style lang="sass">
    @import "assets/css/bootstrap.css";
</style>
