<template>
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      fixed
      app
    >
      <v-list dense>
        <template v-for="item in items">
          <v-layout
            v-if="item.heading"
            :key="item.heading"
            row
            align-center
          >
            <v-flex xs6>
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-flex>
            <v-flex xs6 class="text-xs-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-flex>
          </v-layout>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon=""
          >
            <template v-slot:activator>
              <v-list-tile>
                <v-list-tile-content>
                  <v-list-tile-title>
                    {{ item.text }}
                  </v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            </template>
            <v-list-tile
              v-for="(child, i) in item.children"
              :key="i"
              @click="$router.push(child.link)"
            >
              <v-list-tile-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title>
                  {{ child.text }}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list-group>
          <v-list-tile v-else :key="item.text" @click="$router.push(item.link)">
            <v-list-tile-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>
                {{ item.text }}
              </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </template>
      </v-list>
    </v-navigation-drawer>
</template>

<script>
export default {
    name: 'navigator',
    data: () => ({
      items: [
        { icon: 'contacts', text: 'Dashboard', link: '/' },
        { icon: 'people', text: 'Managed Users', link: '/user'},
        { icon: 'queue', text: 'RMH', link: '/rmh' },
        { icon: 'queue', text: 'RP', link: '/rp' },
        { icon: 'queue', text: 'MHP', link: '/mhp' },
        { icon: 'queue', text: 'VIDRL', link: '/vidrl' },
        {
          icon: 'keyboard_arrow_up',
          'icon-alt': 'keyboard_arrow_down',
          text: 'Removed Items',
          model: false,
          children: [
            { icon: 'delete', text: 'Removed RMH', link: '/removed-rmh' },
            { icon: 'delete', text: 'Removed RP', link: '/removed-rp' },
            { icon: 'delete', text: 'Removed MHP', link: '/removed-mhp' },
            { icon: 'delete', text: 'Removed VIDRL', link: '/removed-vidrl' }
          ]
        },
        { icon: 'phonelink', text: 'RMH Mobile', link: '/rmhmobile' },
        { icon: 'keyboard', text: 'MHP Mobile', link: '/mhpmobile' }
      ]
    }),
    computed: {
        drawer: {
            get() {
                return this.$store.state.drawer
            },
            set(value) {
                this.$store.commit('toggleNavigation', value)
            }
        }
    }
}
</script>
