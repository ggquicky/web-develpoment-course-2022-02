<template>
  <div>
    <h2>Todos Count: {{ store.todosCount }}</h2>
    <ul class="mt-8 space-y-4">
      <TodoListItem :key="todo.id" :todo="todo" v-for="todo in store.todos" />
    </ul>
  </div>
</template>

<script setup>
import { useTodosStore } from "../stores/todos.js";

import TodoListItem from "./TodoListItem.vue";

const store = useTodosStore();
</script>
