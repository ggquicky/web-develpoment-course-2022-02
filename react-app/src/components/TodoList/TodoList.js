import {TodoItem} from './TodoItem.js'

export function TodoList({onDelete, onToggle, todos}) {
  return (
    <div>
      {todos.map((todo) => (
        <TodoItem
          key={todo.id}
          onDelete={onDelete}
          onToggle={onToggle}
          todo={todo}
        />
      ))}
    </div>
  )
}
