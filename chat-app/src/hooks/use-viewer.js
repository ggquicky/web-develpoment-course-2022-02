import {useQueryClient} from 'react-query'

export function useViewer() {
  const client = useQueryClient()

  return client.getQueryData('viewer')
}
