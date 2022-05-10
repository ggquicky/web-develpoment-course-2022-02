<template>
  <div class="mx-auto max-w-sm py-8 space-y-4">
    <h1>Todos</h1>
    <TodoForm />
    <TodoList />
  </div>
</template>

<style>
@tailwind base;
@tailwind components;
@tailwind utilities;
</style>

<script setup>
import ky from "ky";
import { onBeforeMount } from "vue";

import { useTodosStore } from "./stores/todos.js";

import TodoList from "./components/TodoList.vue";
import TodoForm from "./components/TodoForm.vue";

const todosStore = useTodosStore();

onBeforeMount(async () => {
  const resp = await ky.get("http://localhost:8000/api/todos").json();

  todosStore.$patch({
    todos: resp.data,
  });
});
</script>
