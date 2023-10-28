export const postCreateGuard = (to, from, next) => {
    const isAuthenticated = localStorage.getItem('token')

    if (to.name === 'create' && isAuthenticated) {
        next();
    } else if (to.name === 'create' && !isAuthenticated) {
        next({name: 'home'});
    } else if (to.name !== 'create' && !isAuthenticated) {
        next();
    } else {
        next();
    }

    return postCreateGuard();
}