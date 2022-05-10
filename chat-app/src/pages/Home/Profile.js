import {useViewer} from '../../hooks/use-viewer.js'

export function Profile() {
  const viewer = useViewer()

  return <h1>{viewer.name}</h1>
}
