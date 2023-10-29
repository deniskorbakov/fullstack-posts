import {usePopUpStore} from "../stores/popUpStore.js";

const popUpStore = usePopUpStore();

const {isShowPopUpWindow} = popUpStore;

export const postCreateGuard = (to, from, next) => {
    const isAuthenticated = localStorage.getItem('token')

    if (to.name === 'create' && isAuthenticated) {
        next();
    } else if (to.name === 'create' && !isAuthenticated) {
        isShowPopUpWindow('Вы не зарегистрированы');
    } else if (to.name !== 'create' && !isAuthenticated) {
        next();
    } else {
        next();
    }

    return postCreateGuard();
}