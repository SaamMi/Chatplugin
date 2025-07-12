<div>
    

                

                
                     
                     
                    unanswered messages : 
                     
                     
                    


<div class="flex items-center h-screen">
              
                <div class="w-3/9 h-screen">
                
             
             
                <div class="overflow-y-auto">
            <ul class="ml-12 space-y-4">
                messages

        {{ $this->seen}}
        
              {{-- DB::table('messages')->where('cookievalue', '$dc->cookievalue')->value('message') --}}
                
            </ul>
        </div>
        </div>
        <div class="w-3/9">
                  
                     
                    <form wire:click="sendMessage" 
                                class="mt-4 mb-8 ml-12 space-x-2"
               
            >
            <label for="message">
                    <input
                        autofocus
                        class="dark:text-white dark:bg-gray-800"
                        id="message"
                        name="message"
                        type="text"
                        wire:model="message"
                        x-ref="message"
                    >
                </label>

                                <button  type="submit"  class="py-2 px-3 text-white bg-blue-500 rounded-lg dark:text-white dark:bg-blue-900 hover:bg-blue-600">
                                   Send Message
                                </button>
                            </form>  
  


                            </div>
                            </div>



                     


</div>
