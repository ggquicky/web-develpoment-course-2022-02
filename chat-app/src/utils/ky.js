import ky from 'ky'

export default ky.extend({
  prefixUrl: process.env.REACT_APP_API_URL,
  hooks: {
    beforeRequest: [
      (request) => {
        const accessToken = localStorage.getItem('access_token')

        if (!accessToken) {
          window.location.href = '/login'
          return
        }

        request.headers.set('Authorization', `Bearer ${accessToken}`)
      },
    ],
    afterResponse: [
      (_request, _options, response) => {
        if (response.status === 401) {
          window.location.href = '/login'
        }
      },
    ],
  },
})
