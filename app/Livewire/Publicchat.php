<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Events\NewMessage;
use App\Models\Message;
  
class Publicchat extends Component
{

  
    public $message;

    //$userName = request()->cookie('user_name');
    //dd($username);

    #[Computed]
    public  function cookieValue()
    {

        $userName = request()->cookie('ccookie');
       // return "User Name: $userName";

       return "$userName";


    }

    public function render()
    {
        return view('livewire.publicchat');
        /* ->with([
            'messg'=>$this->messg,
        ]
        );  */
        
      
    }


    





    public function sendMessage(): void
    {
       
        /* Db::table('messages')->insert([

            'message'=> $this->message,
            'cookievalue'=> $this->cookieValue,
            'replied'=>false,
            'auth'=>false,
        ])  */

      $eventmessage=  Message::create([
         'message'=> $this->message,
            'cookievalue'=> $this->cookieValue,
            'replied'=>false,
            'auth'=>false,
          ]);

      /* $eventmessage= Message::where('replied',0)
       ->last();  */
        NewMessage::dispatch($eventmessage);



       /* Auth::user()
            ->messages()
            ->create([
                'message' => $this->transform($this->message),
            ]); */

        // $this->emitSelf('scrollToBottom');

        $this->message = '';
    }


    #[Computed]
    public function msg()
    {
       // $this->sendMessage;
        
        return DB::table('messages')
->where('cookievalue',$this->cookieValue)
->pluck('message');
    }



    public function messg(): array|\App\Livewire\Collection
    {
       // $this->sendMessage;
        
        return DB::table('messages')
->pluck('message');
    }








  /*  public function render()
    {

        $userName = request()->cookie('user_name');
        //dd($username);

        return "User Name: $userName";


       // return view('livewire.publicchat');

    } */
}
