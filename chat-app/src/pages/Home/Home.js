import ky from 'ky'
import {useEffect, useState} from 'react'
import {useNavigate} from 'react-router-dom'

export function Home() {
  const navigate = useNavigate()
  const [loading, setLoading] = useState(true)
  const [user, setUser] = useState(null)

  useEffect(() => {
    const accessToken = localStorage.getItem('access_token')

    ky.get(`${process.env.REACT_APP_API_URL}/user`, {
      headers: {
        Authorization: `Bearer ${accessToken}`,
      },
    })
      .json()
      .then((resp) => {
        setUser(resp)
      })
      .catch((err) => {
        localStorage.removeItem('access_token')
        navigate('/login')
      })
      .finally(() => {
        setLoading(false)
      })
  }, [navigate])

  if (loading) {
    return <div>Loading app..</div>
  }

  if (!user) {
    return null
  }

  return (
    <div className="p-8">
      <div className="flex justify-between">
        <h1>Home</h1>
        <button onClick={handleLogout}>Logout</button>
      </div>
    </div>
  )

  function handleLogout() {
    localStorage.removeItem('access_token')

    navigate('/login')
  }
}
