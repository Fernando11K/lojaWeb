import axios from 'axios';

export const configure = {
    local: location.origin.replace(location.port, ""),
    //local: location.origin.replace(location.port, "") + "/api/"
};

const http = axios.create({
    baseURL: configure.local,
    headers: {
        'Access-Control-Allow-Origin': '*',
        'Content-Type': 'application/json;charset=utf-8',
    }
});

export default http;

// http.interceptors.request.use(
//     function (config) {
//         const token = localStorage.getItem('token');
//         config.headers.Authorization = token ? "Bearer " + token : '';
//         return config;
//     }
// );
