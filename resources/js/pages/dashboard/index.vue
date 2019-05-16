<template>
<v-layout>
  <v-flex pa-3 mp-2 xs12>
    <v-hover>
      <v-card color="#FF9800" class="white--text card-dash" @click="$router.push('/rmh')">
          <v-layout>
          <v-flex xs5 pa-2 py-3>
              <i class="fab fa-buffer fa-7x"></i>
          </v-flex>
          <v-flex xs7>
              <v-card-title primary-title>
              <div>
                  <div class="headline">RMH Assets</div>
                  <v-divider light></v-divider>
                  <div>Total Devices</div>
                  <div>3162</div>
              </div>
              </v-card-title>
          </v-flex>
          </v-layout>
      </v-card>
    </v-hover>
  </v-flex>

  <v-flex pa-3 mp-2 xs12>
    <v-hover>
      <v-card color="blue-grey darken-2" class="white--text card-dash" @click="$router.push('/rp')"> 
          <v-layout>
          <v-flex xs5 pa-2 py-3>
            <i class="fas fa-boxes fa-7x"></i>
          </v-flex>
          <v-flex xs7>
              <v-card-title primary-title>
              <div>
                  <div class="headline">RP Assets</div>
                  <v-divider light></v-divider>
                  <div>Total Devices</div>
                  <div>463</div>
              </div>
              </v-card-title>
          </v-flex>
          </v-layout>
      </v-card>
    </v-hover>
  </v-flex>

  <v-flex pa-3 mp-2 xs12>
    <v-hover>
      <v-card color="#4CAF50" class="white--text card-dash" @click="$router.push('/mhp')">
          <v-layout>
          <v-flex xs5 pa-2 py-3>
            <i class="fab fa-accusoft fa-7x"></i>
          </v-flex>
          <v-flex xs7>
              <v-card-title primary-title>
              <div>
                  <div class="headline">MHP Assets</div>
                  <v-divider light></v-divider>
                  <div>Total Devices</div>
                  <div>1432</div>
              </div>
              </v-card-title>
          </v-flex>
          </v-layout>
      </v-card>
    </v-hover>
  </v-flex>
  
  </v-layout>
</template>

<script>
  export default {
    name: 'dashboard',
    data: () => ({
      reviews: 413,
      value: 4.5
    })
  }
</script>

<style scoped>
.card-dash {
  cursor: pointer;
}
</style>
