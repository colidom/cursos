import React, {useState, useEffect} from 'react'
import { Form, Button } from 'react-bootstrap'
import { useDispatch, useSelector } from 'react-redux'
import FormContainer from "../components/FormContainer";

function ShippingScreen({ history }) {

    const cart = useSelector(state => state.cart)
    const {shippingAddress} = cart

    const [address, setAddress] = useState(shippingAddress.address)
    const [city, setCity] = useState(shippingAddress.address)
    const [postalCode, setpostalCode] = useState(shippingAddress.address)
    const [country, setCountry] = useState(shippingAddress.address)

    const submitHandler = (e) => {
        e.preventDefault()
        console.log('Submited!')
    }

    return (
        <FormContainer>
            <h1>Envío</h1>
            <Form onSubmit={submitHandler}>

                <Form.Group controlId='address'>
                    <Form.Label>Dirección</Form.Label>
                    <Form.Control
                        required
                        type='text'
                        placeholder='Introduzca su dirección'
                        value={address ? address : ''}
                        onChange={(e) => setAddress(e.target.value)}
                    >
                    </Form.Control>
                </Form.Group>

                <Form.Group controlId='city'>
                    <Form.Label>Ciudad</Form.Label>
                    <Form.Control
                        required
                        type='text'
                        placeholder='Introduzca su ciudad'
                        value={city ? city : ''}
                        onChange={(e) => setCity(e.target.value)}
                    >
                    </Form.Control>
                </Form.Group>

                <Form.Group controlId='postalCode'>
                    <Form.Label>Código postal</Form.Label>
                    <Form.Control
                        required
                        type='text'
                        placeholder='Introduzca su código postal'
                        value={postalCode ? postalCode : ''}
                        onChange={(e) => setpostalCode(e.target.value)}
                    >
                    </Form.Control>
                </Form.Group>

                <Form.Group controlId='country'>
                    <Form.Label>País</Form.Label>
                    <Form.Control
                        required
                        type='text'
                        placeholder='Introduzca su país'
                        value={country ? country : ''}
                        onChange={(e) => setCountry(e.target.value)}
                    >
                    </Form.Control>
                </Form.Group>

                <Button type='submit' variant='primary'>
                    Siguiente
                </Button>

            </Form>
        </FormContainer>
    )
}

export default ShippingScreen
