<template>
  <FormKit :actions="false" type="form" v-model="values" @submit="handleSubmit">
    <FormKit name="text" type="text" label="Task" validation="required" />
    <FormKit name="user_id" type="select" label="User" validation="required">
      <option :key="user.id" :value="user.id" v-for="user in users">
        {{ user.name }}
      </option>
    </FormKit>
    <button
      class="border bg-blue-500 hover:bg-blue-700 mt-2 px-2 py-2 rounded text-white w-full"
      type="submit"
    >
      Create Todo
    </button>
  </FormKit>
</template>

<script setup>
import ky from "ky";
import { onBeforeMount, ref, watch } from "vue";

import { useTodosStore } from "../stores/todos.js";

const inputRef = ref(null);
const users = ref([]);
const searchText = ref("");
const values = ref({});

onBeforeMount(async () => {
  const resp = await ky.get("http://localhost:8000/api/users").json();

  users.value = resp.data;
});

const todosStore = useTodosStore();

function handleSubmit() {
  todosStore.create({
    ...values.value,
  });

  values.value.text = "";
  values.value.user_id = "";

  inputRef.value.focus();
}

watch(searchText, async () => {
  const resp = await ky
    .get("http://localhost:8000/api/users/search", {
      searchParams: {
        query: searchText.value,
      },
    })
    .json();

  users.value = resp.data;
});
</script>
