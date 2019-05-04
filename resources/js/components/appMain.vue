<template>
  <v-app v-if="authenticated">
    <app-toolbar></app-toolbar>
    <app-navigator></app-navigator>
    <v-content>
      <v-container fluid fill-height>
        <router-view></router-view>
      </v-container>
    </v-content>
  </v-app>
  <v-app v-else>
    <v-content>
      <v-container fluid fill-height>
        <router-view></router-view>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
import { mapGetters } from 'vuex'
import AppToolbar from './layouts/toolbar'
import AppNavigator from './layouts/navigator'

export default {
  components: {
    AppToolbar,
    AppNavigator
  },
  computed: {
    ...mapGetters(['authenticated'])
  }
}
</script>

<style>

</style>
