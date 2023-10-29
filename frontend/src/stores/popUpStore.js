import {defineStore} from "pinia";
import {ref} from "vue";

export const usePopUpStore = defineStore('popUpStore', () => {
    const message = ref('');
    const isShow = ref(false);

    const timeForUpdatePopUp = 3000;

    function isShowPopUpWindow(messageInSlot) {
        message.value = messageInSlot;

        setTimeout(() => {
            isShow.value = !isShow.value;
        }, timeForUpdatePopUp);
    }

    return {message, isShow, isShowPopUpWindow}
})