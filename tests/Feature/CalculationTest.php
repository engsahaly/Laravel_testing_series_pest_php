<?php

use App\Models\User;

// pest()->group('file-group');

####################### FIRST PEST TESTS #################################
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




####################### HOOKS #################################
// beforeAll(function () {
//     // Prepare something before each test run...
//     // dump('beforeAll');
//     // dump($this);   // NOT APPLICABLE
// });

// beforeEach(function () {
//     // Prepare something before each test run...
//     dump($this);
//     $this->user = User::factory()->create();
//     $this->actingAs($this->user);
// });

// afterEach(function () {
//     // Prepare something before each test run...
//     dump('afterEach');
// });

// afterAll(function () {
//     // Prepare something before each test run...
//     dump('afterAll');
// });



####################### EXPECTATIONS #################################
// test('Check if homepage works fine', function () {
//     $response = $this->get('/');
//     $name = 'Mahmoud';

//     // $response->assertStatus(200);

//     // expect($response->status())
//     //     ->toBe(200)
//     //     ->toBeInt()
//     //     ->not->toBeString()
//     //     ->and($name)->toEqual('Mahmoud');

//     expect($name)->toBeMahmoud();
// });



####################### DATASETS #################################
// dataset('emails', [
//     'test@test.com',
//     'test2@test.com',
//     'test3@test.com',
//     'test4@test.com',
// ]);

// test('Check if email contains @ part', function ($email, $age) {
    
//     expect($email)
//         ->toContain('@')
//         ->and($age)->toBeGreaterThanOrEqual(18);

// })
// ->with('emails')
// ->with([
//     18, 19, 20
// ]);

// test('Dump reapeat data', function () {
    
//     dump('reapeat data');

// })->repeat(10);





####################### SKIPPING TESTS #################################
// $name = 'Mahmoud';

// test('Calculate two numbers', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });
// ->skip($name === 'mahmoud', 'This test is skipped')
// ->skipOnMac();

// test('Calculate two numbers 2', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });

// test('Calculate two numbers 3', function () {
    
// })->todo();





####################### GROUPING TESTS #################################
// test('Calculate two numbers', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// })->group('sum-group', 'extra-group');

// test('Calculate two numbers 2', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });

// test('Calculate two numbers 3', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });