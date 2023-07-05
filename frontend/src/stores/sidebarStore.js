import { defineStore } from 'pinia'
import {ref} from "vue";

export const useSidebarStore = defineStore('sidebarStore', () => {
    const show = ref(false)
    function getSidebar() {
        show.value = !show.value
    }

    return {show, getSidebar}
})