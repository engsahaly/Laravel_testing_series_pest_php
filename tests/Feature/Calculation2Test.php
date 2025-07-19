<?php

pest()->group('file-group');

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
})->group('sum-group');
