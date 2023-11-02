import {usePopUpStore} from "../stores/popUpStore.js";

export const meGuard = (to, from, next) => {
    const isAuthenticated = localStorage.getItem('token')

    const popUpStore = usePopUpStore();

    const {isShowPopUpWindow} = popUpStore;

    if (to.name === 'me' && isAuthenticated) {
        next();
    } else if (to.name === 'me' && !isAuthenticated) {
        next({name: 'auth'});
        isShowPopUpWindow('Вы не авторизованы');
    } else if (to.name !== 'me' && !isAuthenticated) {
        next();
    } else {
        next();
    }

    return meGuard();
}