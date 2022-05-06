<template>
  <div>
    <ul class="mt-8 space-y-4">
      <TodoListItem :key="todo.id" :todo="todo" v-for="todo in todos" />
    </ul>
  </div>
</template>

<script setup>
import TodoListItem from "./TodoListItem.vue";

defineProps({
  todos: {
    required: true,
    type: Array,
  },
});
</script>
