import axios from "axios";

window.axios = axios;
window.axios.default.headers.common['X-Requsted-eith'] ='X-Request';