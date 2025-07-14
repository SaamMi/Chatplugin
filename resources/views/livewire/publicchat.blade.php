

<div x-data="chat">


{{--($userName = request()->cookie('user_name'))
  (dd($username))--}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
              <div class="flex items-center h-screen">
                <div class="w-3/5"> content... </div>
                <div class="w-1/5 h-screen">
             

             <div>
            <template
                x-for= "message in messages">
                    
<div>
    <span x-html="message.message">
    </span>




</div>



             </template>       
        </div>       
             
             
                <div class="overflow-y-auto">
            <ul class="ml-12 space-y-4">
                messages
            
              {{$this->msg}}
                
            </ul>
        </div>
                             

                  
                                   
               
<div x-data='{open:false}'>
   
                            
                                <div class="w-screen items-start" >
                                <form
                                class="mt-4 mb-8 ml-12 space-x-2"
                wire:submit.prevent="sendMessage"
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

                                <button   x-on:click='open=open'  class="py-2 px-3 text-white bg-blue-500 rounded-lg dark:text-white dark:bg-blue-900 hover:bg-blue-600" type="submit">
                                   Send Message
                                </button>
                            </form>       
                                

                                
    </div>
                             
                            
                            
                        

                            

                              
                        
                         
            
        </div>
    </div>
            
            </div>
        </div>
    </div>
</div>
<script>


document.addEventListener("alpine:init", async () => {
        const channel = Echo.join("chat-room");

        Alpine.data("chat", () => ({
            message: "",
            messages: [],

            async init() {
                await channel.here
            







</script>

</div>






