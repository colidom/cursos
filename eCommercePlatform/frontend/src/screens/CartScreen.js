import React, {useEffect} from 'react'
import { Link } from 'react-router-dom'
import { useDispatch, useSelector } from 'react-redux'
import { Row, Col, ListGroup, Image, Form, Button, Card } from 'react-bootstrap'
import Message from '../components/Message'
import { addToCart } from '../actions/cartActions'

function CartScreen({match, location, history}) {
    const productId = match.params.id
    const qty = location.search ? Number(location.search.split('=')[1]) : 1
    
    const dispatch = useDispatch()
    const cart = useSelector(state => state.cart)
    const {cartItems} = cart

    useEffect(() =>{
        if(productId){
            dispatch(addToCart(productId, qty))
        }
    }, [dispatch, productId, qty])
    return (
        <Row>
            <Col md={8}>
                <h1>Carrito de compra</h1>
                {cartItems.length === 0 ?( 
                    <Message variant='info'>
                        El carrito arrito vacío <Link to='/'>Ir atrás</Link>
                    </Message>
                ) : (
                    <ListGroup variant='flush'>

                    </ListGroup>
                )}
            </Col>
            <Col md={4}>
            
            </Col>
        </Row>
    )
}

export default CartScreen
