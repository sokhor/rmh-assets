import httpClient from '@/http-client'

const state = {}

const getters = {}

const mutations = {}

const actions = {
  fetch(context, { search, sortBy, descending, page, rowsPerPage } = {}) {
    return httpClient.get('/api/vidrl', { params: { search, sortBy, descending, page, rowsPerPage }})
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  store(context, form) {
    return httpClient.post('/api/vidrl', form)
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  update(context, form) {
    return httpClient.put(`/api/vidrl/${form.id}`, form)
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  destroy(context, id) {
    return httpClient.delete(`/api/vidrl/${id}`)
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
  importExcel(context, excelFile) {
    let formData = new FormData()
    formData.append('excelFile', excelFile)

    return httpClient.post('/api/vidrl/import', formData, {
      headers: {
          'Content-Type': 'multipart/form-data'
      }
    })
  },
  exportExcel(context) {
    return httpClient.get('/api/vidrl/export', {
      responseType: 'arraybuffer'
    })
  },
  fetchRemoved(context, { search, sortBy, descending, page, rowsPerPage } = {}) {
    return httpClient.get('/api/removed-vidrl', { params: { search, sortBy, descending, page, rowsPerPage }})
    .then(response => {
      return response.data
    })
    .catch(error => {
        return Promise.reject(error.response.data)
    })
  },
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}