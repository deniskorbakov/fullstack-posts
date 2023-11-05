import {defineStore} from "pinia";
import {ref} from "vue";

export const usePopUpStore = defineStore('popUpStore', () => {
    const message = ref('');
    const isShow = ref(false);

    const timeForShowPopUp = 300;
    const timeForClosePopUp = 2000;

    function isShowPopUpWindow(messageInSlot) {
        message.value = messageInSlot;

        if (!isShow.value) {
            setTimeout(() => {
                isShow.value = true;
                setTimeout(() => {
                    isShow.value = false;
                }, timeForClosePopUp);
            }, timeForShowPopUp);
        }

    }

    function closePopUpWindow() {
        isShow.value = false;
    }

    return {message, isShow, isShowPopUpWindow, closePopUpWindow}
})