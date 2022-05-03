import {Suspense} from 'react'
import {Routes, Route} from 'react-router-dom'
import {QueryClient, QueryClientProvider} from 'react-query'
import {ReactQueryDevtools} from 'react-query/devtools'

import {ChakraProvider} from '@chakra-ui/react'

import {Home, HomeSkeleton} from './pages/Home/Home.js'
import {Login} from './pages/Login/Login.js'
import {Register} from './pages/Register/Register.js'

const queryClient = new QueryClient({
  defaultOptions: {
    queries: {
      suspense: true,
    },
  },
})

export default function App() {
  return (
    <QueryClientProvider client={queryClient}>
      <ChakraProvider>
        <Routes>
          <Route
            element={
              <Suspense fallback={<HomeSkeleton />}>
                <Home />
              </Suspense>
            }
            path="/"
          />
          <Route element={<Login />} path="login" />
          <Route element={<Register />} path="register" />
        </Routes>
      </ChakraProvider>
      <ReactQueryDevtools initialIsOpen={false} />
    </QueryClientProvider>
  )
}
