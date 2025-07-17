<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use App\Models\Message;
use Livewire\Attributes\On; 
use Illuminate\Support\ItemNotFoundException;
use Throwable;
use App\Events\NewMessage;

class PublicResponse extends Component
{






    public $message='type here';



    #[Computed]
   public function unanswered()
   {



    return DB::table('messages')->where('auth',false)->where('replied',false)->count('cookievalue');

    


    



   }




   #[Computed]
   public function seen()
   {  

    try {



     $user = DB::table('messages')
->where('auth',false)
->where('replied',false)
->firstOrFail()
;  } 
catch 
    (Throwable $e) {

        report($e);
    return "nothing" ; }


//->orderBy('id','desc')->first()->id;



     return $user->id;
    


    



   }

#[Computed]
   public function cv()
   {

try{

     $user = DB::table('messages')
     ->where('auth',false)
->where('replied',false)
->orderBy('id','desc')->firstOrFail();
}
catch (ItemNotFoundException $ex)
{


     dd($ex);
 }


 return $user->cookievalue;







   }





    #[On('show-post-cookie')] 
    public function updateCookie($cookievalue)
    {
           dd($cookievalue);
    }


  /*  #[Computed]
    public  function cookieValue()
    {

        $userName = request()->cookie('ccookie');
       // return "User Name: $userName";

       return "$userName";


    }  */







    public function sendMessage()
    {
       

       // $cookievalue = Db::table('messages')->where('id','$messageCookievalue-1')->select('cookievalue')->get();
        Db::table('messages')->insert([

            'message'=> $this->message,
            'cookievalue'=> $this->cv,
            'auth'=>true,
            'replied'=>true,
        ]);



Db::table('messages')
        ->where('id','=',$this->seen)
        ->update(['replied'=>true]); 


        NewMessage::dispatch($message);
  

      
    //Message::where('id',$




       /* Auth::user()
            ->messages()



            ->create([
                'message' => $this->transform($this->message),
            ]); */

        // $this->emitSelf('scrollToBottom');

        $this->message = '';
    }



    #[Computed]
    public function distinctcookie()
    {
       // $this->sendMessage;
        
        return DB::table('messages')->distinct()->select('cookievalue')->get();

       // dd($dc);
    }



    #[Computed]
    public function distinctmessage()
    {

       $dc=$this->distinctcookie;

       return Message::all();
                     
       //return DB::table('messages')->select('message')->get();
       
        //dd($dc);



    }

    #[Computed]
    public function distinctcookiecount()
    {
       // $this->sendMessage;
        
        return DB::table('messages')->distinct()->count('cookievalue');
    }


















    public function render()
    {
        return view('livewire.public-response');
    }
}
