<script setup>
  import FormInput from "../Form/FormInput/FormInput.vue";
  import FormTitle from "../Form/FormTitle/FormTitle.vue";
  import FormItem from "../Form/FormItem/FormItem.vue";
  import Form from "../Form/Form.vue";
  import FormButton from "../Form/FormButton/FormButton.vue";
  import FormLink from "../Form/FormLink/FormLink.vue";
  import FormSpan from "../Form/FormSpan/FormSpan.vue";
  import Message from "../Message.vue";

  import {useRegisterStore} from "../../../stores/registerStore.js";
  import {storeToRefs} from "pinia";

  const store = useRegisterStore()
  const {formData, errorReg, register, v$} = storeToRefs(store)
  const {submitForm} = store
</script>

<template>
  <FormTitle>Регитрация пользователя</FormTitle>
  <Form>
    <Message :data="errorReg"></Message>
    <FormItem>
      <i class="fa-solid fa-user text-5xl text-gray-900"></i>

      <FormInput
          type="text"
          placeholder="Введите никнейм"
          v-model="formData.username"
          :class="{'border-2 border-red-500' : v$.username.$error}"
      />

      <FormSpan v-if="v$.username.$error">
        <template v-if="!v$.username.minLength.$response">
          минимум 3 символа
        </template>

        <template v-else>
          поле не заполнено
        </template>
      </FormSpan>
    </FormItem>

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

    <FormItem>
      <i v-if="v$.passwordConfirm.$error" class="fa-solid fa-unlock text-5xl text-gray-900"></i>
      <i v-else class="fa-solid fa-lock text-5xl text-gray-900"></i>

      <FormInput
          type="password"
          placeholder="Повторите пароль"
          v-model="formData.passwordConfirm"
          :class="{'border-2 border-red-500' : v$.passwordConfirm.$error}"
      />

      <FormSpan v-if="v$.passwordConfirm.$error">
        <template v-if="!v$.passwordConfirm.required.$response">
          поле не заполнено
        </template>

        <template v-else>
          пароли не верны
        </template>
      </FormSpan>
    </FormItem>

    <div class="flex space-x-2">
      <p class="text-gray-900">уже есть аккаунт ?</p>
      <router-link to="/auth" class="text-sky-500">Войти</router-link>
    </div>

    <FormButton @click.prevent="submitForm">
      Создать аккаунт
    </FormButton>

    <FormLink>
      Зарегистрироваться с помощью
    </FormLink>
  </Form>
</template>

<style scoped>

</style>