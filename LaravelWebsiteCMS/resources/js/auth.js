const config = {
    auth: bearer,
    http: axios,
    router: router,
    tokenDefaultName: 'kundol',
    tokenStore: ['localStorage'],
    loginData: { url: 'auth/login', method: 'POST', redirect: '', fetchUser: true },
    logoutData: { url: 'auth/logout', method: 'POST', redirect: '/', makeRequest: true },
    fetchData: { url: 'auth/user', method: 'GET', enabled: true },
}