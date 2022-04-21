import ky from 'ky'
import {useEffect, useState} from 'react'

import {TodoForm} from './components/TodoForm/TodoForm.js'
import {TodoList} from './components/TodoList/TodoList.js'

export default function App() {
  const [todos, setTodos] = useState([])

  useEffect(() => {
    ky.get('http://localhost:8000/api/todos')
      .json()
      .then((resp) => {
        setTodos(resp.data)
      })
  }, [])

  async function handleSubmit(text) {
    const resp = await ky
      .post('http://localhost:8000/api/todos', {
        json: {
          text,
        },
      })
      .json()

    setTodos((todos) => [...todos, resp.data])
  }

  async function handleToggle(id, completed) {
    const resp = await ky
      .patch(`http://localhost:8000/api/todos/${id}`, {
        json: {
          completed,
        },
      })
      .json()

    setTodos((todos) => {
      return todos.map((todo) => {
        if (todo.id === id) {
          return resp.data
        }

        return todo
      })
    })
  }

  async function handleDelete(id) {
    await ky.delete(`http://localhost:8000/api/todos/${id}`).json()

    setTodos((todos) => todos.filter((todo) => todo.id !== id))
  }

  return (
    <div>
      <TodoForm onSubmit={handleSubmit} />
      <br />
      <TodoList onDelete={handleDelete} onToggle={handleToggle} todos={todos} />
    </div>
  )
}
