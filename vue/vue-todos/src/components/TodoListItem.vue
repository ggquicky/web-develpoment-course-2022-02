<template>
  <li class="flex items-center bg-slate-300 rounded p-2 shadow-md gap-2">
    <template v-if="isEditing">
      <input class="flex-1 p-1 rounded" type="text" v-model="text" />
      <button
        class="border border-gray-700 p-1 rounded"
        @click="handleUpdateText"
      >
        Update
      </button>
      <button
        class="border border-gray-700 p-1 rounded"
        @click="isEditing = false"
      >
        Cancel
      </button>
    </template>
    <template v-else>
      <input
        class="rounded"
        type="checkbox"
        :checked="todo.completed"
        @change="handleChange"
      />
      {{ todo.text }} - {{ format(new Date(todo.updated_at), "hh:mm a") }}
      <button
        class="border border-gray-700 ml-auto px-2 py-1 rounded"
        @click="isEditing = true"
      >
        Edit
      </button>
      <button
        class="border border-red-700 ml-1 px-2 py-1 rounded"
        @click="todosStore.delete(todo)"
      >
        Delete
      </button>
    </template>
  </li>
</template>

<script setup>
import { format } from "date-fns";
import { ref } from "vue";

import { useTodosStore } from "../stores/todos.js";

const props = defineProps({
  todo: {
    required: true,
    type: Object,
  },
});

const todosStore = useTodosStore();

const text = ref(props.todo.text);
const isEditing = ref(false);

function handleUpdateText() {
  todosStore.update(props.todo, { text: text.value });
  isEditing.value = false;
}

async function handleChange() {
  todosStore.update(props.todo, { completed: !props.todo.completed });
}
</script>
