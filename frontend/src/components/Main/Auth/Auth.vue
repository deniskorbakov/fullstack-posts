<script setup>
  import FormInput from "../Form/FormInput/FormInput.vue";
  import FormTitle from "../Form/FormTitle/FormTitle.vue";
  import FormItem from "../Form/FormItem/FormItem.vue";
  import Form from "../Form/Form.vue";
  import FormButton from "../Form/FormButton/FormButton.vue";
  import FormLink from "../Form/FormLink/FormLink.vue";
  import FormSpan from "../Form/FormSpan/FormSpan.vue";
  import Message from "../Message.vue";

  import {useLoginStore} from "../../../stores/loginStore.js";
  import {storeToRefs} from "pinia";

  const store = useLoginStore()
  const {formData, errorAuth, v$} = storeToRefs(store)
  const {submitForm} = store
</script>

<template>
  <FormTitle>Авторизация пользователя</FormTitle>
  <Form>
    <Message :data="errorAuth.value"/>
    <FormItem>
      <i class="fa-solid fa-square-envelope text-5xl text-gray-900"></i>

      <FormInput
          type="email"
          placeholder="Введите почту"
          v-model="formData.email"
          :class="{'border-2 border-red-500' : v$.email.$error}"
      />

      <FormSpan v-if="v$.email.$error">
        <template v-if="!v$.email.required.$response">
          поле не заполнено
        </template>

        <template v-else>
          неправильно указана почта
        </template>
      </FormSpan>
    </FormItem>

    <FormItem>
      <i v-if="v$.password.$error" class="fa-solid fa-unlock text-5xl text-gray-900"></i>
      <i v-else class="fa-solid fa-lock text-5xl text-gray-900"></i>

      <FormInput
          type="password"
          placeholder="Введите пароль"
          v-model="formData.password"
          :class="{'border-2 border-red-500' : v$.password.$error}"
      />

      <FormSpan v-if="v$.password.$error">
        <template v-if="!v$.password.minLength.$response">
          минимум 8 символов
        </template>

        <template v-else>
          поле не заполнено
        </template>
      </FormSpan>
    </FormItem>

    <div class="flex space-x-2">
      <p class="text-gray-900">нет аккаунта ?</p>
      <router-link to="/registration" class="text-sky-500">Регистрация</router-link>
    </div>

    <FormButton @click.prevent="submitForm">
      Войти в аккаунт
    </FormButton>

    <FormLink>
      Войти с помощью
    </FormLink>
  </Form>
</template>

<style scoped>

</style>