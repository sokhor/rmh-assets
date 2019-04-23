import axios from 'axios'
import store from '@/store'

const client = axios.create({
  baseURL: null,
  headers: {
    'X-Requested-With': 'XMLHttpRequest'
  }
})

client.interceptors.request.use(
  config => {
    if (store && store.getters.authenticated) {
      config.headers = {
        Authorization: `Bearer ${store.getters.accessToken}`
      }
    }

    return config
  },
  error => Promise.reject(error)
)

export default client