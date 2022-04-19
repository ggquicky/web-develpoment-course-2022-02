import {useState} from 'react'

export default function Main() {
  const [text, setText] = useState('')
  const [todos, setTodos] = useState([])

  function handleClick() {
    setText('')
    setTodos([...todos, text])
  }

  return (
    <main>
      <h1>Main</h1>
      <input
        onChange={(e) => {
          setText(e.target.value)
        }}
        type="text"
        value={text}
      />
      <button onClick={handleClick}>Add</button>
      <br />
      {todos.map((item, index) => {
        return (
          <p key={index} style={{color: 'green'}}>
            {item}
          </p>
        )
      })}
    </main>
  )
}
