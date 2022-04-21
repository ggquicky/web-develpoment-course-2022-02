export function TodoForm({onSubmit}) {
  return (
    <form
      onSubmit={(e) => {
        e.preventDefault()

        const data = new FormData(e.target)

        // onSubmit(data)
        onSubmit(data.get('text'))
      }}
    >
      <input name="text" type="text" />
      <button type="submit">Create</button>
    </form>
  )
}
