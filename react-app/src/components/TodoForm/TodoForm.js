import {useState} from 'react'

import {UserSelector} from '../UserSelector/UserSelector.js'
import {useFetchUsers} from '../../hooks/use-fetch-users.js'

export function TodoForm({onSubmit}) {
  const [data, setData] = useState({})
  const users = useFetchUsers()

  function handleInputChange(e) {
    setData((data) => ({...data, text: e.target.value}))
  }

  function handleSelectChange(userId) {
    setData((data) => ({...data, userId}))
  }

  return (
    <form
      onSubmit={(e) => {
        e.preventDefault()

        onSubmit(data)
      }}
    >
      <div>
        <input
          className="border border-gray-500"
          name="text"
          onChange={handleInputChange}
          type="text"
        />
      </div>
      <div>
        <UserSelector onChange={handleSelectChange} users={users} />
      </div>
      <button type="submit">Create</button>
    </form>
  )
}
