import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import List from '@editorjs/list';
import Checklist from '@editorjs/checklist'
import Quote from '@editorjs/quote'
import Warning from '@editorjs/warning'
import Marker from '@editorjs/marker'
import CodeTool from '@editorjs/code'
import Delimiter from '@editorjs/delimiter'
import InlineCode from '@editorjs/inline-code'
import LinkTool from '@editorjs/link'
import Embed from '@editorjs/embed';
import Table from '@editorjs/table';
import { defineStore } from 'pinia'
import {reactive, ref} from "vue";
import axios from "axios";

export const useEditorStore = defineStore('editorStore', () => {
    const editor = new EditorJS({
        holder: 'editorjs',
        autofocus: true,
        placeholder: 'Нажмите Tab для выбора инструмента',
        tools: {
            header: {
                class: Header,
                config: {
                    placeholder: 'Enter a header',
                    levels: [2, 3],
                    defaultLevel: 2
                }
            },
            list: List,
            checklist: Checklist,
            quote: Quote,
            warning: Warning,
            marker: Marker,
            code: CodeTool,
            delimiter: Delimiter,
            inlineCode: InlineCode,
            linkTool: LinkTool,
            embed: Embed,
            table: Table,
        },

        i18n: {

            messages: {

                ui: {
                    "blockTunes": {
                        "toggler": {
                            "Click to tune": "Нажмите, чтобы настроить",
                            "or drag to move": "или перетащите"
                        },
                    },
                    "inlineToolbar": {
                        "converter": {
                            "Convert to": "Конвертировать в"
                        }
                    },
                    "toolbar": {
                        "toolbox": {
                            "Add": "Добавить"
                        }
                    }
                },

                toolNames: {
                    "Text": "Параграф",
                    "Heading": "Заголовок",
                    "List": "Список",
                    "Warning": "Примечание",
                    "Checklist": "Чеклист",
                    "Quote": "Цитата",
                    "Code": "Код",
                    "Delimiter": "Разделитель",
                    "Raw HTML": "HTML-фрагмент",
                    "Table": "Таблица",
                    "Link": "Ссылка",
                    "Marker": "Маркер",
                    "Bold": "Полужирный",
                    "Italic": "Курсив",
                    "InlineCode": "Моноширинный",
                },

                tools: {
                    "warning": {
                        "Title": "Название",
                        "Message": "Сообщение",
                    },

                    "link": {
                        "Add a link": "Вставьте ссылку"
                    },

                    "stub": {
                        'The block can not be displayed correctly.': 'Блок не может быть отображен'
                    }
                },

                blockTunes: {
                    "delete": {
                        "Delete": "Удалить"
                    },
                    "moveUp": {
                        "Move up": "Переместить вверх"
                    },
                    "moveDown": {
                        "Move down": "Переместить вниз"
                    }
                },
            }
        },

    });


    const title = ref('')
    const body = reactive({})
    const userToken = localStorage.getItem('token');

    function createPost(body) {
        axios.post('http://localhost:8876/api/v1/posts', {
            body: JSON.stringify(body),
            title: title.value,
            categories: [1,2]
        },
    {
        headers: {
            'Accept' : 'application/json',
            'Authorization' : `Bearer ${userToken}`
        }})
        .then(response => {
            console.log('yes');
        })
        .catch(error => {
            console.log(error, body);
        });
    }

    function save() {
        editor.save().then((outputData) => {
            body.value = outputData;

            createPost(outputData.blocks);
        });
    }

    return {editor, title, body, save}
})