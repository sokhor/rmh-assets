import httpClient from '@/http-client'

const state = {}

const getters = {}

const mutations = {}

const actions = {
  fetch(context, { search, sortBy, descending, page, rowsPerPage } = {}) {
    return httpClient.get('/api/user', { params: { search, sortBy, descending, page, rowsPerPage }})
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  store(context, form) {
    return httpClient.post('/api/user', form)
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  update(context, form) {
    return httpClient.put(`/api/user/${form.id}`, form)
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  destroy(context, id) {
    return httpClient.delete(`/api/user/${id}`)
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