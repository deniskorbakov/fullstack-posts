import {usePopUpStore} from "../stores/popUpStore.js";

export const postCreateGuard = (to, from, next) => {
    const popUpStore = usePopUpStore();

    const {isShowPopUpWindow} = popUpStore;

    const isAuthenticated = localStorage.getItem('token')

    if (to.name === 'create' && isAuthenticated) {
        next();
    } else if (to.name === 'create' && !isAuthenticated) {
        next({name: 'home'});
        isShowPopUpWindow('Вы не авторизованы');
    } else if (to.name !== 'create' && !isAuthenticated) {
        next();
    } else {
        next();
    }

    return postCreateGuard();
}