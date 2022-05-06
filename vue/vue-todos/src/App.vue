<template>
  <div class="mx-auto max-w-sm py-8 space-y-4">
    <h1>Todos</h1>
    <TodoForm @submit="handleSubmit" />
    <TodoList :todos="todos" />
  </div>
</template>

<style>
@tailwind base;
@tailwind components;
@tailwind utilities;
</style>

<script setup>
import ky from "ky";
import { onBeforeMount, provide, ref } from "vue";

import TodoList from "./components/TodoList.vue";
import TodoForm from "./components/TodoForm.vue";

const todos = ref([]);

onBeforeMount(async () => {
  const resp = await ky.get("http://localhost:8000/api/todos").json();

  todos.value = resp.data;
});

async function handleDeleteTodo(todo) {
  await ky.delete(`http://localhost:8000/api/todos/${todo.id}`);

  todos.value = todos.value.filter((t) => t.id !== todo.id);
}

async function handleUpdateTodo(todo, values) {
  const json = {};

  if (values.text) {
    json.text = values.text;
  }

  if (typeof values.completed === "boolean") {
    json.completed = values.completed;
  }

  const resp = await ky
    .patch(`http://localhost:8000/api/todos/${todo.id}`, {
      json,
    })
    .json();

  const index = todos.value.findIndex((t) => t.id === todo.id);

  todos.value.splice(index, 1, resp.data);
}

provide("todos", {
  handleDeleteTodo,
  handleUpdateTodo,
});

async function handleSubmit(values) {
  const resp = await ky
    .post("http://localhost:8000/api/todos", {
      json: {
        text: values.text,
        user_id: values.user_id,
      },
    })
    .json();

  todos.value.push(resp.data);
}
</script>
