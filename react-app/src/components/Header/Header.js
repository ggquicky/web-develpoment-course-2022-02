import Navigation from './Navigatin.js'

export default function Header() {
  return (
    <header
      style={{
        gridColumn: '1 / 3',
      }}
    >
      Header <Navigation />
    </header>
  )
}
