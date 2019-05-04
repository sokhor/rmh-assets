<template>
  <v-toolbar
    :clipped-left="$vuetify.breakpoint.lgAndUp"
    color="#117fa2"
    dark
    app
    fixed
  >
    <v-toolbar-title style="width: 400px" class="ml-0 pl-3">
      <v-toolbar-side-icon @click.stop="toggleNavigation"></v-toolbar-side-icon>
      <span class="hidden-sm-and-down">RMH Assets Management System</span>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <span>{{ userName }}</span>
    <v-btn icon>
      <v-icon>notifications</v-icon>
    </v-btn>
    <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-btn 
          icon
          color="primary"
          dark
          v-on="on"
        >
          <v-icon>person</v-icon>
        </v-btn>
      </template>
      <v-list>
        <v-list-tile @click="logout">
          <v-list-tile-title>
            <v-icon>fas fa-sign-out-alt</v-icon> Signout
          </v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
  </v-toolbar>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'toolbar',
  data: () => ({
    items: [
      { icon: 'contacts', text: 'Dashboard', link: '/' },
      { icon: 'content_copy', text: 'Campus', link: '/campus' },
      { icon: 'queue', text: 'RMH', link: '/rmh' },
      { icon: 'queue', text: 'RP' },
      { icon: 'queue', text: 'MHP' },
      { icon: 'queue', text: 'VIDRL' },
      {
        icon: 'keyboard_arrow_up',
        'icon-alt': 'keyboard_arrow_down',
        text: 'Removed Items',
        model: false,
        children: [
          { icon: 'delete', text: 'Removed RMH' },
          { icon: 'delete', text: 'Removed RP' },
          { icon: 'delete', text: 'Removed MHP' },
          { icon: 'delete', text: 'Removed VIDRL' }
        ]
      },
      { icon: 'phonelink', text: 'RMH Mobile' },
      { icon: 'keyboard', text: 'MHP Mobile' }
    ]
  }),
  computed: {
    ...mapGetters(['userName'])
  },
  methods: {
    toggleNavigation() {
      this.$store.commit('toggleNavigation', !this.$store.state.drawer)
    },
    logout() {
      this.$store.dispatch('logout')

      this.$router.push({ name: 'login' })      
    }
  }
}
</script>