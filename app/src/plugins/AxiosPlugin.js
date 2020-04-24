/* eslint-disable */
import axios from 'axios';
const API_URL = 'http://127.0.0.1:8000/api';

// Add base URL to axios api communication
axios.interceptors.request.use(config => {
  config.url = API_URL + config.url;

  return config;
});

axios.interceptors.response.use(response => {
  return response;
}, error => {
  return Promise.reject(error);
});

export default axios;
