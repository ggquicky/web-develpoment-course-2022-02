import {FastField, Form, Formik} from 'formik'
import ky from 'ky'
import {useNavigate} from 'react-router-dom'

import {
  Button,
  Container,
  FormControl,
  FormErrorMessage,
  FormLabel,
  Heading,
  Input,
  Stack,
} from '@chakra-ui/react'

import {buildFormikErrors} from '../../utils/build-formik-errors.js'

export function Register() {
  const navigate = useNavigate()

  return (
    <Container maxWidth="container.lg">
      <Formik
        initialValues={{
          email: '',
          name: '',
          password: '',
        }}
        onSubmit={handleSubmit}
      >
        <Stack as={Form} spacing="4">
          <Heading as="h1" size="md">
            Register
          </Heading>
          <FastField name="name">
            {({field, meta}) => (
              <FormControl isInvalid={!!meta.error}>
                <FormLabel>Name</FormLabel>
                <Input {...field} type="text" />
                <FormErrorMessage>{meta.error}</FormErrorMessage>
              </FormControl>
            )}
          </FastField>
          <FastField name="email">
            {({field, meta}) => (
              <div>
                <Input {...field} type="text" />
                {!!meta.error && (
                  <div className="text-red-500">{meta.error}</div>
                )}
              </div>
            )}
          </FastField>
          <FastField name="password">
            {({field, meta}) => (
              <div>
                <Input {...field} type="password" />
                {!!meta.error && (
                  <div className="text-red-500">{meta.error}</div>
                )}
              </div>
            )}
          </FastField>
          <Button colorScheme="blue" type="submit">
            Create
          </Button>
        </Stack>
      </Formik>
    </Container>
  )

  async function handleSubmit(values, formikBag) {
    const resp = await ky
      .post(`${process.env.REACT_APP_API_URL}/register`, {
        json: values,
        throwHttpErrors: false,
      })
      .json()

    if (resp.errors) {
      const errors = buildFormikErrors(resp.errors)

      formikBag.setErrors(errors)

      return
    }

    localStorage.setItem('access_token', resp.access_token)

    navigate('/')
  }
}
