<template>
  <v-card>
    <v-card-title
      class="grey lighten-4 py-4 title"
    >
      {{ formTitle }}
    </v-card-title>
    <v-container grid-list-sm class="pa-4">
      <v-layout row wrap>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.asset_code"
            label="Asset"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.os"
            label="OS"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.building"
            label="Building"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.campus"
            label="Campus"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.department"
            label="Department"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.floor"
            label="Floor"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.location"
            label="Location"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.serial_number"
            label="Serial Number"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.make"
            label="Make"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.model"
            label="Model"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.ram"
            label="Ram"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.notes"
            label="Notes"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-menu
            v-model="purchaseDateMenu"
            :close-on-content-click="false"
            :nudge-right="40"
            lazy
            transition="scale-transition"
            offset-y
            full-width
            min-width="290px"
          >
            <template v-slot:activator="{ on }">
              <v-text-field
                v-model="form.purchase_date"
                label="Purchase Date"
                readonly
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker v-model="form.purchase_date" @input="purchaseDateMenu = false"></v-date-picker>
          </v-menu>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.mac_address"
            label="Mac Address"
          ></v-text-field>
        </v-flex>
        <v-flex xs12 md4>
          <v-text-field
            v-model="form.replaced"
            label="Replaced"
          ></v-text-field>
        </v-flex>
      </v-layout>
    </v-container>
    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn flat @click="$emit('close')">Cancel</v-btn>
      <v-btn dark color="#117fa2" @click="save">Save</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: 'form-component',
  props: ['editedItem'],
  data() {
    const newForm = {
      asset_code: null,
      os: null,
      building: null,
      campus: null,
      department: null,
      floor: null,
      location: null,
      serial_number: null,
      make: null,
      model: null,
      ram: null,
      notes: null,
      purchase_date: null,
      mac_address: null,
      replaced: null
    }

    return {
      newForm: newForm,
      form: Object.assign({}, newForm),
      saving: false,
      purchaseDateMenu: false
    }
  },
  computed: {
    formTitle() {
      return this.editedItem.id !== undefined ? 'Edit RMH Assets' : 'Create RMH Assets'
    }
  },
  methods: {
    async save() {
      this.saving = true

      let action = this.editedItem.id !== undefined ? 'update' : 'store'

      try {
        let response = await this.$store.dispatch(`rmh/${action}`, this.form)   
        
        this.$emit('savedSucceed', {
          snackbar: true,
          snackbarColor: 'success',
          snackbarText: response.message
        })
      } catch (error) {
        this.$emit('savedError', {
          snackbar: true,
          snackbarColor: 'error',
          snackbarText: error.message
        })
      }

      this.saving = false
    }
  },
  watch: {
    editedItem: {
      handler(editedItem) {
        if(editedItem.id !== undefined) {
          for(let prop in this.form) {
            this.form[prop] = editedItem[prop]
          }

          this.$set(this.form, 'id', editedItem.id)
        } else {
          this.form = Object.assign({}, this.newForm)
        }
      }
    }
  }
}
</script>