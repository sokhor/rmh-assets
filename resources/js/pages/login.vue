<template>
  <v-layout align-center justify-center>
    <v-flex xs12 sm8 md4>
      <v-alert 
        type="error" 
        :value="errorMessage"
        class="mb-1"
      >{{ errorMessage }}</v-alert>
      <v-form ref="form" lazy-validation @submit.prevent="login">
        <v-card class="elevation-12">
          <v-toolbar dark color="#117fa2">
            <v-toolbar-title>Login Form</v-toolbar-title>
          </v-toolbar>          
          <v-card-text>
            <v-text-field 
              prepend-icon="person" 
              label="Username"
              v-model="username"
              required
              :rules="usernameErrors"
            ></v-text-field>
            <v-text-field
              prepend-icon="lock"
              label="Password" 
              type="password"
              v-model="password"
              required
              :rules="passwordErrors"
            ></v-text-field>
          </v-card-text>          
          <v-card-actions>
            <v-btn color="primary" type="submit">Login</v-btn>
            <v-spacer></v-spacer>
            <a href="#">
              Forgot Your Password?
            </a>
          </v-card-actions>
        </v-card>
      </v-form>
    </v-flex>
  </v-layout>
</template>

<script>
import { Errors } from 'form-backend-validation'

export default {
  name: 'login',
  data() {
    return {
      username: null,
      password: null,
      errors: new Errors(),
      errorMessage: '',
    }
  },
  computed: {
    usernameErrors() {
      return this.errors.get('username')
    },
    passwordErrors() {
      return this.errors.get('password')
    }
  },
  methods: {
    async login() {
      try {
        await this.$store.dispatch('login', {
          username: this.username,
          password: this.password
        })

        this.$router.push(this.$route.query.redirectTo || { name: 'home' })
      } catch (errorResponse) {
        this.errors = new Errors(errorResponse.errors)
        this.errorMessage = errorResponse.message

        this.$refs.form.validate()
      }
    }
  }
}
</script>
