import {useQuery} from 'react-query'
import {useNavigate} from 'react-router-dom'

import {Skeleton, SkeletonCircle, Stack} from '@chakra-ui/react'

import ky from '../../utils/ky.js'

export function Home() {
  const navigate = useNavigate()
  const {data: user} = useQuery('viewer', () => ky.get('user').json())

  if (!user) {
    return null
  }

  return (
    <div className="p-8">
      <div className="flex justify-between">
        <h1>{user.name}</h1>
        <button onClick={handleLogout}>Logout</button>
      </div>
    </div>
  )

  function handleLogout() {
    localStorage.removeItem('access_token')

    navigate('/login')
  }
}

export function HomeSkeleton() {
  return (
    <Stack spacing="4">
      {Array.from(Array(5).keys()).map((i) => (
        <Stack alignItems="center" direction="row" key={i}>
          <SkeletonCircle boxSize="32px" />
          <Stack spacing="2">
            <Skeleton height="2" width="40" />
            <Skeleton height="1" width="40" />
          </Stack>
        </Stack>
      ))}
    </Stack>
  )
}
