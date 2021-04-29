import React, {useState, useEffect} from 'react'
import { Button, Row, Col, ListGroup, Image, Card } from 'react-bootstrap'
import { Link } from 'react-router-dom'
import { useDispatch, useSelector } from 'react-redux'
import Message from "../components/Message";
import CheckoutSteps from "../components/CheckoutSteps";

function PlaceOrderScreen() {
    const cart = useSelector(state => state.cart)
    return (
        <div>
            <CheckoutSteps step1 step2 step3 step4/>
        </div>
    )
}

export default PlaceOrderScreen
