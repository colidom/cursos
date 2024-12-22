<?php


use Core\Container;

test('it can resolve something out of the container', function () {
    // arrange
    $container = new Container();
//    $container->bind('foo', function () {
//        return 'bar';
//    });
    $container->bind('foo', fn () =>  'bar');

    // action
    $result = $container->resolve('foo');

    // assert/expect
    expect($result)->toEqual('bar');

});
