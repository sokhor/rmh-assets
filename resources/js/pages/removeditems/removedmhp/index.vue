<template>
  <v-layout>
    <v-flex xs12>
      <v-card>
        <v-card-title>
          <h3 ml-0>Removed Melbourne Hospital Principle</h3>
        </v-card-title>
        <v-card-text>
          <v-flex ml-0 row md12>
              <v-spacer></v-spacer>
            <v-text-field
              v-model="search"
              append-icon="search"
              label="Search"
              single-line
              hide-details
            ></v-text-field>
          </v-flex>
        </v-card-text>
        <v-data-table
          :headers="headers"
          :items="items"
          :pagination.sync="pagination"
          :total-items="totalItems"
          :loading="loading"
        >
          <template v-slot:items="props">            
            <td>{{ props.item.asset_code }}</td>
            <td>{{ props.item.os }}</td>
            <td>{{ props.item.services }}</td>
            <td>{{ props.item.campus }}</td>
            <td>{{ props.item.team }}</td>
            <td>{{ props.item.floor }}</td>
            <td>{{ props.item.location }}</td>
            <td>{{ props.item.serial_number }}</td>
            <td>{{ props.item.make }}</td>
            <td>{{ props.item.model }}</td>
            <td>{{ props.item.ram }}</td>
            <td>{{ props.item.notes }}</td>
            <td>{{ props.item.purchase_date }}</td>
            <td>{{ props.item.mac_address }}</td>
            <td>{{ props.item.printer_mapped }}</td>
            <td>{{ props.item.replaced }}</td>
          </template>
          <v-alert v-slot:no-results :value="true" color="error" icon="warning">
            Your search for "{{ search }}" found no results.
          </v-alert>
        </v-data-table>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
import { debounce } from 'lodash'

export default {
  name: 'removed-mhp',
  data () {
    return {
      search: '',
      totalItems: 0,
      items: [],
      loading: false,
      pagination: {},
      headers: [
        {
          text: 'Asset',
          align: 'left',
          value: 'asset_code'
        },
        { text: 'OS', value: 'os'},
        { text: 'Services', value: 'services'},
        { text: 'Campus', value: 'campus' },
        { text: 'Team', value: 'team' },
        { text: 'Floor', value: 'floor' },
        { text: 'Location', value: 'location' },
        { text: 'Serial Number', value: 'serial_number' },
        { text: 'Make', value: 'make' },
        { text: 'Model', value: 'model' },
        { text: 'RAM', value: 'ram' },
        { text: 'Notes', value: 'notes' },
        { text: 'Purchase Date', value: 'purchase_date' },
        { text: 'MAC Address', value: 'mac_address' },
        { text: 'Printer Mapped', value: 'printer_mapped' },
        { text: 'Replaced', value: 'replaced' }
      ],
    }
  },
  methods: {
    async fetchData() {
      this.loading = true
      try {
        let response = await this.$store.dispatch('mhp/fetchRemoved', { search: this.search, ...this.pagination })
        this.items = response.data
        this.totalItems = response.meta.total
      } catch(e) {
        console.error(e)
      }
      this.loading = false
    }
  },
  watch: {
    pagination: {
      handler () {
        this.fetchData()
      },
      deep: true
    },
    search: debounce(function(search) {
      this.fetchData()
    }, 500)
  }
}
</script>