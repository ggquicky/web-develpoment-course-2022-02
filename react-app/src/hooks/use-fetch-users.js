import ky from 'ky'
import {useEffect, useState} from 'react'

export function useFetchUsers() {
  const [users, setUsers] = useState([])

  useEffect(() => {
    ky.get(`${process.env.REACT_APP_API_URL}/users`)
      .json()
      .then((resp) => {
        setUsers(resp.data)
      })
  }, [])

  return users
}
