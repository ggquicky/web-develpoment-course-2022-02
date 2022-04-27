export function UserSelector({onChange, users}) {
  return (
    <select
      className="border border-gray-500"
      name="user_id"
      onChange={(e) => {
        onChange(e.target.value)
      }}
    >
      {users.map((user) => (
        <option key={user.id} value={user.id}>
          {user.name}
        </option>
      ))}
    </select>
  )
}
