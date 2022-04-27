import {Routes, Route} from 'react-router-dom'

import {Home} from './pages/Home/Home.js'
import {Login} from './pages/Login/Login.js'
import {Register} from './pages/Register/Register.js'

export default function App() {
  return (
    <Routes>
      <Route element={<Home />} path="/" />
      <Route element={<Login />} path="login" />
      <Route element={<Register />} path="register" />
    </Routes>
  )
}
