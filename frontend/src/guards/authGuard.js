export const authGuard = (to, from, next) => {
    const isAuthenticated = localStorage.getItem('token')

    if (to.name === 'auth' && isAuthenticated) {
        next({ name: 'me' });
    } else if (to.name === 'auth' && !isAuthenticated) {
        next();
    } else if (to.name !== 'auth' && !isAuthenticated) {
        next();
    } else {
        next();
    }

    return authGuard();
};