<template>
  <v-layout>
    <v-flex xs12>
      <v-card>
        <v-card-title>
          <h3 ml-0>User List</h3>
        </v-card-title>
        <v-card-text>
          <v-flex ml-0 row md12>
            <v-btn color="#117fa2" @click="dialogCreate = true" class="white--text">New</v-btn>
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
              <a href="#" @click="editItem(props.item)"> {{ props.item.username }}</a>
            </td>        
            <td>{{ props.item.email }}</td>            
            <td>{{ props.item.department }}</td>            
            <td>{{ props.item.telephone }}</td>
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
    <v-dialog v-model="dialogCreate" width="800px">
      <form-create
        @savedSucceed="onFormSavedSucceed"
        @savedError="onFormSavedError"
        @close="dialogCreate = false"
      />
    </v-dialog>
    <v-dialog v-model="dialogEdit" width="800px">
      <form-edit 
        :edited-item="editedItem" 
        @savedSucceed="onFormSavedSucceed"
        @savedError="onFormSavedError"
        @close="dialogEdit = false"
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
  </v-layout>
</template>

<script>
import { debounce } from 'lodash'
import ConfirmDialog from '@/components/confirm-dialog.vue'
import FormCreate from './form-create'
import FormEdit from './form-edit'

export default {
  name: 'user',
  components: { FormCreate, FormEdit, ConfirmDialog },
  data () {
    return {
      search: '',
      headers: [
        { text: 'Username', value: 'username' },
        { text: 'Email', value: 'email' },
        { text: 'Department', value: 'department' },
        { text: 'Telephone', value: 'telephone' },
        { text: 'Action', sortable: false }
      ],
      items: [],
      pagination: {},
      totalItems: 0,
      loading: false,
      rowsPerPageItems: [10, 15, 20, 25, 30, 35, 40],
      pagination: {
        rowsPerPage: 15
      },
      dialogCreate: false,
      dialogEdit: false,
      editedItem: {},
      snackbar: false,
      snackbarColor: '',
      snackbarText: '',
    }
  },
  methods: {
    async fetchData() {
      this.loading = true
      try {
        let response = await this.$store.dispatch('user/fetch', { search: this.search, ...this.pagination })
        this.items = response.data
        this.totalItems = response.meta.total
      } catch(e) {
        console.error(e)
      }
      this.loading = false
    },
    editItem (item) {
      this.editedItem = Object.assign({}, item)
      this.dialogEdit = true
    },
    async deleteItem (item) {      
      try {
        await this.$refs.confirmDelete.open('Delete', 'Are you sure want to delete this item?')        
        let response = await this.$store.dispatch('user/destroy', item.id)
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
      this.dialogCreate = false
      this.dialogEdit = false
      this.snackbar = evt.snackbar
      this.snackbarColor = evt.snackbarColor
      this.snackbarText = evt.snackbarText
      this.fetchData()
    },
    onFormSavedError(evt) {
      this.snackbar = evt.snackbar
      this.snackbarColor = evt.snackbarColor
      this.snackbarText = evt.snackbarText
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
    dialogEdit(val) {
      if(!val) {
        this.editedItem = {}
      }
    }
  }
}
</script>