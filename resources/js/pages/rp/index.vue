<template>
  <v-layout>
    <v-flex xs12>
      <v-card>
        <v-card-title>
          <h3 ml-0>Royal Park Hospital</h3>
        </v-card-title>
        <v-card-text>
          <v-flex ml-0 row md12>
            <v-btn color="#117fa2" @click="dialog = true" class="white--text">New</v-btn>
            <v-btn color="#117fa2" @click="$refs.excelFile.click()" class="white--text" :loading="importing">Import</v-btn>
            <v-btn 
            color="warning" 
            @click="exportExcel"
            :loading="exporting"
            >Export
            <v-icon right dark>cloud_download</v-icon>
            </v-btn>
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
          :rows-per-page-items="rowsPerPageItems"
          :pagination.sync="pagination"
          :total-items="totalItems"
          :loading="loading"
        >
          <template v-slot:items="props">            
            <td>
              <a href="#" @click.prevent="editItem(props.item)">{{props.item.asset_code }}</a>
            </td>
            <td>{{ props.item.os }}</td>
            <td>{{ props.item.building }}</td>
            <td>{{ props.item.campus }}</td>
            <td>{{ props.item.department }}</td>
            <td>{{ props.item.floor }}</td>
            <td>{{ props.item.location }}</td>
            <td>{{ props.item.serial_number }}</td>
            <td>{{ props.item.make }}</td>
            <td>{{ props.item.model }}</td>
            <td>{{ props.item.ram }}</td>
            <td>{{ props.item.notes }}</td>
            <td>{{ props.item.purchase_date }}</td>
            <td>{{ props.item.mac_address }}</td>
            <td>{{ props.item.replaced }}</td>
            <td class="justify-center layout px-0">
              <v-icon
                small
                class="mr-2"
                color="teal"
                @click="editItem(props.item)"
              >
                edit
              </v-icon>
              <v-icon
                small
                color="pink"
                @click="deleteItem(props.item)"
              >
                delete
              </v-icon>
            </td>
          </template>
          <v-alert v-slot:no-results :value="true" color="error" icon="warning">
            Your search for "{{ search }}" found no results.
          </v-alert>
        </v-data-table>
      </v-card>
    </v-flex>
    <v-dialog v-model="dialog" width="800px">
      <form-component 
        :edited-item="editedItem" 
        @savedSucceed="onFormSavedSucceed"
        @savedError="onFormSavedError"
        @close="dialog = false"
      />
    </v-dialog>
    <confirm-dialog ref="confirmDelete" />
    <v-snackbar
      v-model="snackbar"
      :color="snackbarColor"
      :timeout="2000"
    >
      {{ snackbarText }}
    </v-snackbar>
    <input type="file" id="excelFile" ref="excelFile" @change="importExcel" style="display: none;"/>
  </v-layout>
</template>

<script>
import { debounce, last, trim } from 'lodash'
import { saveAs } from 'file-saver'
import FormComponent from './form'
import ConfirmDialog from '@/components/confirm-dialog.vue'

export default {
  name: 'rp',
  components: { FormComponent, ConfirmDialog },
  data () {
    return {
      dialog: false,
      deletedItemDialog: false,
      search: '',
      totalItems: 0,
      items: [],
      loading: false,
      rowsPerPageItems: [10, 15, 20, 25, 30, 35, 40],
      pagination: {
        rowsPerPage: 15
      },
      headers: [
        {
          text: 'Asset',
          align: 'left',
          value: 'asset_code'
        },
        { text: 'OS', value: 'os'},
        { text: 'Building', value: 'building'},
        { text: 'Campus', value: 'campus' },
        { text: 'Department', value: 'department' },
        { text: 'Floor', value: 'floor' },
        { text: 'Location', value: 'location' },
        { text: 'Serial Number', value: 'serial_number' },
        { text: 'Make', value: 'make' },
        { text: 'Model', value: 'model' },
        { text: 'RAM', value: 'ram' },
        { text: 'Notes', value: 'notes' },
        { text: 'Purchase Date', value: 'purchase_date' },
        { text: 'MAC Address', value: 'mac_address' },
        { text: 'Replaced', value: 'replaced' },
        { text: 'Action', sortable: false }
      ],
      editedItem: {},
      snackbar: false,
      snackbarColor: '',
      snackbarText: '',
      importing: false,
      exporting: false
    }
  },
  methods: {
    async fetchData() {
      this.loading = true
      try {
        let response = await this.$store.dispatch('rp/fetch', { search: this.search, ...this.pagination })
        this.items = response.data
        this.totalItems = response.meta.total
      } catch(e) {
        console.error(e)
      }
      this.loading = false
    },
    editItem (item) {
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },
    async deleteItem (item) {      
      try {
        await this.$refs.confirmDelete.open('Delete', 'Are you sure want to delete this item?')        
        let response = await this.$store.dispatch('rp/destroy', item.id)
        this.snackbar = true
        this.snackbarColor = 'success'
        this.snackbarText = response.message
        this.fetchData()
      } catch (error) {
        if(error.message !== undefined) {
          this.snackbar = true
          this.snackbarColor = 'error'
          this.snackbarText = error.message
        }
      }
    },
    onFormSavedSucceed(evt) {
      this.dialog = false
      this.snackbar = evt.snackbar
      this.snackbarColor = evt.snackbarColor
      this.snackbarText = evt.snackbarText
      this.fetchData()
    },
    onFormSavedError(evt) {
      this.snackbar = evt.snackbar
      this.snackbarColor = evt.snackbarColor
      this.snackbarText = evt.snackbarText
    },
    async importExcel() {
      let excelFile = this.$refs.excelFile.files[0]

      this.importing = true

      try {
        let response = await this.$store.dispatch('rp/importExcel', excelFile)

        this.fetchData()
      } catch (error) {
          this.snackbar = true
          this.snackbarColor = 'error'
          this.snackbarText = error.response.data.message
      }

      this.importing = false
    },
    async exportExcel() {
      this.exporting = true

      try {
        let response = await this.$store.dispatch('rp/exportExcel')

        const blob = new Blob([response.data], {
          type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        })
        const fileName = trim(last(last(response.headers['content-disposition'].split(';')).split('=')))

        saveAs(blob, fileName);
      } catch (error) {
        console.error(error)
      }

      this.exporting = false
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
    }, 500),
    dialog(val) {
      if(!val) {
        this.editedItem = {}
      }
    }
  }
}
</script>