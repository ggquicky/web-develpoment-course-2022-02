import ky from 'ky'
import {useCallback, useEffect, useState} from 'react'

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

  async function handleSubmit({text, userId}) {
    const resp = await ky
      .post('http://localhost:8000/api/todos', {
        json: {
          text,
          user_id: userId,
        },
      })
      .json()

    setTodos((todos) => [...todos, resp.data])
  }

  const handleUpdate = useCallback(async (id, data) => {
    const resp = await ky
      .patch(`http://localhost:8000/api/todos/${id}`, {
        json: {
          ...data,
          user_id: data.userId,
        },
      })
      .json()

    setTodos((todos) => {
      return todos.map((todo) => {
        if (todo.id === id) {
          return {
            ...todo,
            ...resp.data,
          }
        }

        return todo
      })
    })
  }, [])

  const handleDelete = useCallback(async (id) => {
    await ky.delete(`http://localhost:8000/api/todos/${id}`).json()

    setTodos((todos) => todos.filter((todo) => todo.id !== id))
  }, [])

  return (
    <div>
      <TodoForm onSubmit={handleSubmit} />
      <br />
      <TodoList onDelete={handleDelete} onUpdate={handleUpdate} todos={todos} />
    </div>
  )
}
