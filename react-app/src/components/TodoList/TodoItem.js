import {format} from 'date-fns'

import styles from './TodoItem.module.css'

export function TodoItem({onDelete, onToggle, todo}) {
  return (
    <div className={styles.todoItem}>
      <input
        checked={todo.completed}
        onChange={(e) => {
          onToggle(todo.id, e.target.checked)
        }}
        type="checkbox"
      />
      <div>
        {todo.text} - {format(new Date(todo.updated_at), 'hh:mm')}
      </div>
      <button
        onClick={() => {
          onDelete(todo.id)
        }}
      >
        Delete
      </button>
    </div>
  )
}
