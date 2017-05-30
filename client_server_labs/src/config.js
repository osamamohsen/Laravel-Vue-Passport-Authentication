export const DomainUrl  = "http://localhost:8000/";
export const loginUrl   = DomainUrl + "oauth/token";
export const userDataUrl   = DomainUrl + "api/user";
export const getHeader = function () {
    const tokenData = JSON.parse(window.localStorage.getItem('authUser'));
    const headers = {
        'Accept' : 'application/json',
        'Authorization' : 'Bearer '+tokenData.access_token
    }
    return headers;
};