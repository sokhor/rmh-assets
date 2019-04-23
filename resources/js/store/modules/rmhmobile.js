import httpClient from '@/http-client'

const state = {}

const getters = {}

const mutations = {}

const actions = {
  fetch(context, { search, sortBy, descending, page, rowsPerPage } = {}) {
    return httpClient.get('/api/rmhmobile', { params: { search, sortBy, descending, page, rowsPerPage }})
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  store(context, form) {
    return httpClient.post('/api/rmhmobile', form)
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  update(context, form) {
    return httpClient.put(`/api/rmhmobile/${form.id}`, form)
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  destroy(context, id) {
    return httpClient.delete(`/api/rmhmobile/${id}`)
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}