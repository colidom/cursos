import React, {useState, useEffect} from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { Link } from "react-router-dom"
import { Row, Col, Image, ListGroup, Button, Card } from "react-bootstrap"
import Rating  from "../components/Rating"
import Loader  from "../components/Loader"
import Message  from "../components/Message"
import { listProductsDetails } from '../actions/productActions'

function ProductScreen({ match }) {
    const dispatch = useDispatch()
    const productDetails = useSelector(state => state.productDetails)
    const { loading, error, product } = productDetails

    useEffect(()=> {
        dispatch(listProductsDetails(match.params.id))

    }, [dispatch])

    return (
        <div>
            <Link to='/' className='btn btn-light my-3'>Ir atrás</Link>
            {loading ?
                <Loader />
                : error
                    ? <Message variant='danger'>{error}</Message>
                :(
                    <Row>
                        <Col md={6}>
                            <Image src={product.image} alt={product.name} fluid />
                        </Col>
                        <Col md={3}>
                            <ListGroup variant="flush">
                                <ListGroup.Item>
                                    <h3>{product.name}</h3>
                                </ListGroup.Item>

                                <ListGroup.Item>
                                    <Rating value={product.rating} text={`${product.numReviews} comentarios`} color={'#f8e825'} />
                                </ListGroup.Item>

                                <ListGroup.Item>
                                    Precio: {product.price}€
                                </ListGroup.Item>

                                <ListGroup.Item>
                                    Descripción: {product.description}
                                </ListGroup.Item>
                            </ListGroup>
                        </Col>
                        <Col md={3}>
                            <Card>
                                <ListGroup variant="flush">
                                    <ListGroup.Item>
                                        <Row>
                                            <Col>Precio:</Col>
                                            <Col>
                                                <strong>{product.price}€</strong>
                                            </Col>
                                        </Row>
                                    </ListGroup.Item>

                                    <ListGroup.Item>
                                        <Row>
                                            <Col>Estado:</Col>
                                            <Col>
                                                {product.countInStock > 0 ? 'En stock' : 'Sin stock'}
                                            </Col>
                                        </Row>
                                    </ListGroup.Item>

                                    <ListGroup.Item>
                                        <Button className='btn-block'disabled={product.countInStock == 0} type='button'>Añadir al carrito</Button>
                                    </ListGroup.Item>

                                </ListGroup>
                            </Card>
                        </Col>
                    </Row>
                )
        
            }
        </div>
    )
}

export default ProductScreen
