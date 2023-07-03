<script setup>
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
import {reactive, ref} from "vue";
import Post from "../Main/Post/Post.vue";

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
        "warning": { // <-- 'Warning' tool will accept this dictionary section
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
const show = ref(false)
function save() {
  editor.save().then((outputData) => {
     body.value = outputData
  });
}

function getPreview() {
  show.value = !show.value
}
</script>

<template>
    <input class="text-3xl w-full" style="outline: none" v-model="title" placeholder="Заголовок">
    <div id="editorjs" class="truncate mt-5"></div>
    <div class="flex space-x-5">
        <button @click="save" class="rounded-lg bg-sky-500 text-white px-4 py-2 hover:bg-sky-400">Опубликовать</button>
        <button @click="getPreview" class="px-4 py-2 border-2 border-gray-900 rounded-lg hover:shadow-lg">
          <i class="fa-solid fa-eye text-2xl text-gray-900"></i>
        </button>
    </div>
</template>



