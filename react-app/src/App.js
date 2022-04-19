import Aside from './components/Aside.js'
import Footer from './components/Footer.js'
import Header from './components/Header/Header.js'
import Main from './components/Main.js'

export default function App() {
  return (
    <div
      style={{
        display: 'grid',
        gap: 24,
        gridTemplateColumns: '2fr 1fr',
      }}
    >
      <Header />
      <Main />
      <Aside />
      <Footer />
    </div>
  )
}
