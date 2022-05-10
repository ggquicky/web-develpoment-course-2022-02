import ky from "ky";
import { defineStore } from "pinia";

export const useTodosStore = defineStore("todos", {
  state: () => {
    return {
      todos: [],
    };
  },

  actions: {
    async create(values) {
      const resp = await ky
        .post("http://localhost:8000/api/todos", {
          json: {
            text: values.text,
            user_id: values.user_id,
          },
        })
        .json();

      this.todos.push(resp.data);
    },

    async delete(todo) {
      await ky.delete(`http://localhost:8000/api/todos/${todo.id}`);

      this.todos = this.todos.filter((t) => t.id !== todo.id);
    },

    async update(todo, values) {
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

      const index = this.todos.findIndex((t) => t.id === todo.id);

      this.todos.splice(index, 1, resp.data);
    },
  },

  getters: {
    todosCount: (state) => state.todos.length,
  },
});
