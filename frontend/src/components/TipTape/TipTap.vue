<script setup>
import { Editor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Highlight from '@tiptap/extension-highlight'
import TaskItem from '@tiptap/extension-task-item'
import TaskList from '@tiptap/extension-task-list'
import TextAlign from "@tiptap/extension-text-align";


const editor = new Editor({
  content: '<p>Введите текст</p>',
  extensions: [
    StarterKit,
    Highlight,
    TaskList,
    TaskItem,
    TextAlign.configure({
      types: ['heading', 'paragraph'],
    }),
  ],
})
const json = editor.getHTML()
console.log(json)
</script>

<template>
  <div v-if="editor" class="flex bg-gray-900 text-white rounded-t-lg p-5">
    <div class="flex-initial w-1/6 space-x-2">
      <button @click="editor.chain().focus().toggleBold().run()" :disabled="!editor.can().chain().focus().toggleBold().run()">
        <i class="fa-solid fa-bold"></i>
      </button>

      <button @click="editor.chain().focus().toggleStrike().run()" :disabled="!editor.can().chain().focus().toggleStrike().run()">
        <i class="fa-solid fa-strikethrough"></i>
      </button>
    </div>

    <div class="flex-initial w-1/2 space-x-2">
      <button @click="editor.chain().focus().toggleHeading({ level: 1 }).run()">
        H1
      </button>

      <button @click="editor.chain().focus().toggleHeading({ level: 2 }).run()">
        H2
      </button>

      <button @click="editor.chain().focus().toggleHeading({ level: 3 }).run()">
        H3
      </button>

      <button @click="editor.chain().focus().toggleBulletList().run()">
        <i class="fa-solid fa-list"></i>
      </button>

      <button @click="editor.chain().focus().toggleCodeBlock().run()">
        <i class="fa-solid fa-code"></i>
      </button>

      <button @click="editor.chain().focus().toggleBlockquote().run()">
        <i class="fa-solid fa-quote-left"></i>
      </button>

      <button @click="editor.chain().focus().setHorizontalRule().run()">
        <i class="fa-solid fa-underline"></i>
      </button>
    </div>

    <div class="flex-initial w-1/2 space-x-2">
      <button @click="editor.chain().focus().setTextAlign('justify').run()">
        <i class="fa-solid fa-align-justify"></i>
      </button>

      <button @click="editor.chain().focus().setTextAlign('left').run()">
        <i class="fa-solid fa-align-left"></i>
      </button>

      <button @click="editor.chain().focus().setTextAlign('center').run()">
        <i class="fa-solid fa-align-center"></i>
      </button>

      <button @click="editor.chain().focus().setTextAlign('right').run()">
        <i class="fa-solid fa-align-right"></i>
      </button>
    </div>

    <div class="flex-initial w-1/2 space-x-2 text-right">
      <button @click="editor.chain().focus().undo().run()" :disabled="!editor.can().chain().focus().undo().run()" class="">
        <i class="fa-solid fa-rotate-left"></i>
      </button>

      <button @click="editor.chain().focus().redo().run()" :disabled="!editor.can().chain().focus().redo().run()" class="">
        <i class="fa-solid fa-rotate-right"></i>
      </button>
    </div>
  </div>

  <EditorContent :editor="editor" class="border-2 border-gray-900 p-5 style"/>

  <div v-if="editor" class="border-x-2 border-b-2 border-gray-900 text-black rounded-b-lg px-4 py-2 flex">
    <button class="flex-initial w-1/2 text-left flex space-x-2">
      <i class="fa-solid fa-eye text-xl"></i>
      <p>Превью</p>
    </button>
    <button class="flex-initial w-1/2 text-right">Опубликовать</button>
  </div>
</template>

<style lang="scss">
.ProseMirror-focused {
  outline:none;
}

/* Basic editor styles */
.ProseMirror {

  > * + * {
    margin-top: 0.75em;
  }

  ul,
  ol {
    padding: 0 1rem;
  }

  h1 {
    @apply text-4xl
  }
  h2 {
    @apply text-3xl
  }
  h3 {
    @apply text-2xl
  }

  code {
    background-color: rgba(#616161, 0.1);
    color: #616161;
  }

  pre {
    background: #0D0D0D;
    color: #FFF;
    font-family: 'JetBrainsMono', monospace;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;

    code {
      color: inherit;
      padding: 0;
      background: none;
      font-size: 0.8rem;
    }
  }

  img {
    max-width: 100%;
    height: auto;
  }

  blockquote {
    padding-left: 1rem;
    border-left: 2px solid black;
  }

  hr {
    border: none;
    border-top: 2px solid rgba(#0D0D0D, 0.1);
    margin: 2rem 0;
  }
}
</style>

