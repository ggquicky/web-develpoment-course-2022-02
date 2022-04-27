import {TodoItem} from './TodoItem.js'
import {useFetchUsers} from '../../hooks/use-fetch-users.js'

export function TodoList({onDelete, onUpdate, todos}) {
  const users = useFetchUsers()

  return (
    <div className="p-8 space-y-4">
      {todos.map((todo) => (
        <TodoItem
          key={todo.id}
          onDelete={onDelete}
          onUpdate={onUpdate}
          todo={todo}
          users={users}
        />
      ))}
    </div>
  )
}
