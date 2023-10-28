export const meGuard = (to, from, next) => {
    const isAuthenticated = localStorage.getItem('token')

    if (to.name === 'me' && isAuthenticated) {
        next();
    } else if (to.name === 'me' && !isAuthenticated) {
        next({name: 'auth'});
    } else if (to.name !== 'me' && !isAuthenticated) {
        next();
    } else {
        next();
    }

    return meGuard();
}