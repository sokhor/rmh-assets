<template>
  <v-card>
    <v-card-title
      class="grey lighten-4 py-4 title"
    >
      Edit User
    </v-card-title>
    <v-container grid-list-sm class="pa-4">
      <v-layout row wrap>
        <v-flex xs12>
          <v-text-field
            v-model="form.username"
            label="Username"
          ></v-text-field>
        </v-flex>
        <v-flex xs12>
          <v-text-field
            v-model="form.email"
            label="Email"
          ></v-text-field>
        </v-flex>
        <v-flex xs12>
          <v-text-field
            v-model="form.telephone"
            label="Telephone"
          ></v-text-field>
        </v-flex>
        <v-flex xs12>
          <v-text-field
            v-model="form.department"
            label="Department"
          ></v-text-field>
        </v-flex>
      </v-layout>
    </v-container>
    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn flat @click="$emit('close')">Cancel</v-btn>
      <v-btn color="primary" @click="save">Save</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: 'form-edit',
  props: ['editedItem'],
  data() {
    return {
      form: {},
      saving: false,
    }
  },
  methods: {
    async save() {
      this.saving = true

      try {
        let response = await this.$store.dispatch('user/update', this.form)   
        
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
          this.form = Object.assign({}, editedItem)
        }
      }
    }
  }
}
</script>