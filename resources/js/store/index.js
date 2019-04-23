import Vue from 'vue'
import Vuex from 'vuex'
import modules from './modules'
import httpClient from '@/http-client'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    drawer: null,
    authUser: null
  },
  getters: {
    authenticated: state => state.authUser !== null,
    accessToken: state =>
      state.authUser !== null ? state.authUser.access_token : null
  },
  mutations: {
    toggleNavigation(state, drawer) {
      state.drawer = drawer
    },
    setAuthUser(state, authUser) {
      if(authUser === null) {
        state.authUser = null

        localStorage.clear()
      } else {
        state.authUser = Object.assign(
          {},
          {
            username: authUser.username,
            access_token: authUser.access_token
          }
        )

        localStorage.setItem('authUser', JSON.stringify(state.authUser))
      }
    }
  },
  actions: {
    init({ commit }) {
      const authUser = JSON.parse(localStorage.getItem('authUser'))

      if (authUser) {
        commit('setAuthUser', authUser)
      }
    },
    login({ commit }, credential) {
      return httpClient.post('/api/login', credential)
      .then(response => {
        commit('setAuthUser', response.data)

        return Promise.resolve(response.data)
      })
      .catch(error => Promise.reject(error.response.data))
    },
    logout({ commit }) {
      commit('setAuthUser', null)
    }
  },
  modules
})

store.dispatch('init')

export default store
