<?php


use Illuminate\Support\Facades\Event;
use App\Events\NewMessage;
use App\Models\Message;



test('example', function () {
    expect(true)->toBeTrue();
});



test('event can be broadcast', function () {
    Event::fake();


     $message=Message::factory()->create();
 
    // Perform order shipping...
 
    // Assert that an event was dispatched...
    Event::assertDispatched(NewMessage::class);
 

});
