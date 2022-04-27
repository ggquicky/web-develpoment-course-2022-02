import {format} from 'date-fns'
import {memo, useState} from 'react'

import {UserSelector} from '../UserSelector/UserSelector.js'

export const TodoItem = function TodoItem({onDelete, onUpdate, todo, users}) {
  const [data, setData] = useState({
    text: todo.text,
  })
  const [editing, setEditing] = useState(false)

  function handleInputChange(e) {
    setData((data) => ({...data, text: e.target.value}))
  }

  function handleSelectChange(userId) {
    setData((data) => ({...data, userId}))
  }

  return (
    <div className="border border-gray-500 rounded-md flex items-center space-x-4 p-4">
      <input
        checked={todo.completed}
        onChange={(e) => {
          onUpdate(todo.id, {completed: e.target.checked})
        }}
        type="checkbox"
      />
      <div className="flex flex-col min-w-[200px]">
        {editing ? (
          <UserSelector users={users} onChange={handleSelectChange} />
        ) : (
          <h2>{todo.user.name}</h2>
        )}
        {editing ? (
          <input
            autoFocus
            className="border border-gray-500"
            onChange={handleInputChange}
            type="text"
            value={data.text}
          />
        ) : (
          <div>{todo.text}</div>
        )}

        <div>{format(new Date(todo.updated_at), 'hh:mm a')}</div>
      </div>
      {editing && (
        <button
          className="border border-green-500 rounded px-4 hover:bg-green-500 hover:text-white"
          onClick={() => {
            setEditing(false)
            onUpdate(todo.id, data)
          }}
        >
          Save
        </button>
      )}
      {!editing && (
        <button
          className="border border-blue-500 rounded px-4 hover:bg-blue-500 hover:text-white"
          onClick={() => {
            setEditing(true)
          }}
        >
          Edit
        </button>
      )}
      <button
        className="border border-red-500 rounded px-4 hover:bg-red-500 hover:text-white"
        onClick={() => {
          onDelete(todo.id)
        }}
      >
        Delete
      </button>
    </div>
  )
}
