<?php

use App\Models\User;

beforeAll(function () {
    // Prepare something before each test run...
    // dump('beforeAll');
    dump($this);   // NOT APPLICABLE
});

beforeEach(function () {
    // Prepare something before each test run...
    dump($this);
    // $this->user = User::factory()->create();
    // $this->actingAs($this->user);
});

// afterEach(function () {
//     // Prepare something before each test run...
//     dump('afterEach');
// });

// afterAll(function () {
//     // Prepare something before each test run...
//     dump('afterAll');
// });








// describe('Sum Group', function () {
    
//     beforeEach(function () {
//         dump('beforeEach');
//     });

//     test('Calculate two numbers', function () {
//         $response = $this->get('/');
    
//         $response->assertStatus(200);
//     });
    
//     it('Calculate two numbers', function () {
//         $response = $this->get('/');
    
//         $response->assertStatus(200);
//     });

// });

test('Check if homepage works fine', function () {
    $response = $this->get('/');
    $name = 'Mahmoud';

    // $response->assertStatus(200);

    // expect($response->status())
    //     ->toBe(200)
    //     ->toBeInt()
    //     ->not->toBeString()
    //     ->and($name)->toEqual('Mahmoud');

    expect($name)->toBeMahmoud();
});
