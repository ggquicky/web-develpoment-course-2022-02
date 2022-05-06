<template>
  <form class="space-y-4" @submit.prevent="handleSubmit">
    <input
      class="rounded w-full"
      ref="inputRef"
      required
      type="text"
      v-model="values.text"
    />
    <!-- <select class="rounded w-full" required v-model="values.user_id">
      <option>Select an user</option>
      <option :key="user.id" :value="user.id" v-for="user in users">
        {{ user.name }}
      </option>
    </select> -->
    <input
      class="rounded w-full"
      list="ice-cream-flavors"
      type="text"
      v-model="searchText"
    />
    <datalist id="ice-cream-flavors">
      <option :key="user.id" :value="user.id" v-for="user in users">
        {{ user.name }}
      </option>
    </datalist>

    <button
      class="border bg-blue-500 hover:bg-blue-700 mt-2 px-2 py-2 rounded text-white w-full"
      type="submit"
    >
      Create Todo
    </button>
  </form>
</template>

<script setup>
import ky from "ky";
import { onBeforeMount, ref, watch, watchEffect } from "vue";

const inputRef = ref(null);
const users = ref([]);
const searchText = ref("");
const values = ref({
  text: "",
  user_id: "",
});

const emit = defineEmits(["submit"]);

onBeforeMount(async () => {
  const resp = await ky.get("http://localhost:8000/api/users").json();

  users.value = resp.data;
});

function handleSubmit() {
  emit("submit", {
    ...values.value,
    user_id: searchText.value,
  });

  values.value.text = "";
  values.value.user_id = "";

  inputRef.value.focus();
}

watchEffect(() => {
  console.log(`watchEffect: `);
  console.log(values.value);
});

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
