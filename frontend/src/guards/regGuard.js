export const regGuard = (to, from, next) => {
    const isAuthenticated = localStorage.getItem('token')

    if (to.name === 'reg' && isAuthenticated) {
        next({ name: 'me' });
    } else if (to.name === 'reg' && !isAuthenticated) {
        next();
    } else if (to.name !== 'reg' && !isAuthenticated) {
        next();
    } else {
        next();
    }

    return regGuard();
};