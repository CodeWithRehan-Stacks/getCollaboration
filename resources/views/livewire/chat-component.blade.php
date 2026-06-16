<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Chat with ') }} {{ $otherUser->name }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">&larr; Back to Discovery</a>
        </div>
    </x-slot>

    <div class="py-12" wire:poll.3s="loadMessages">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col h-[70vh]">
                
                <!-- Action Bar -->
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $otherUser->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ ucfirst($match->status) }} Connection
                        </p>
                    </div>
                    @if($match->status === 'pending')
                        <button wire:click="acceptCollaboration" class="px-6 py-2 bg-gradient-to-r from-green-400 to-emerald-500 text-white font-semibold rounded-full shadow-lg hover:from-green-500 hover:to-emerald-600 transition transform hover:scale-105">
                            Accept Collaboration / Close Deal
                        </button>
                    @else
                        <div class="px-4 py-2 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-full text-sm font-semibold flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Deal Closed
                        </div>
                    @endif
                </div>

                <!-- Chat Messages -->
                <div class="flex-grow p-6 overflow-y-auto space-y-4 bg-gray-50 dark:bg-gray-900/50" id="chat-container">
                    @forelse($messages as $msg)
                        <div class="flex {{ $msg->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                            <div class="max-w-[70%] rounded-2xl px-5 py-3 shadow-sm {{ $msg->sender_id === auth()->id() ? 'bg-indigo-600 text-white rounded-br-none' : 'bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-100 dark:border-gray-700 rounded-bl-none' }}">
                                <p class="text-sm sm:text-base">{{ $msg->message }}</p>
                                <p class="text-[10px] mt-1 opacity-70 text-right">{{ $msg->created_at->format('h:i A') }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-500 dark:text-gray-400 my-10">
                            No messages yet. Say hi to start the conversation!
                        </div>
                    @endforelse
                </div>

                <!-- Input Area -->
                <div class="p-4 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
                    <form wire:submit.prevent="sendMessage" class="flex gap-4">
                        <input type="text" wire:model="newMessage" placeholder="Type your message..." class="flex-grow bg-gray-100 dark:bg-gray-900 border-transparent focus:border-indigo-500 focus:bg-white dark:focus:bg-gray-800 focus:ring-0 rounded-full px-6 py-3 dark:text-white" required>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-full p-3 h-12 w-12 flex items-center justify-center transition shadow-md">
                            <svg class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19V6m0 0l-7 7m7-7l7 7"></path></svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <script>
        // Auto scroll to bottom
        document.addEventListener('livewire:initialized', () => {
            const container = document.getElementById('chat-container');
            container.scrollTop = container.scrollHeight;
            
            Livewire.on('messageAdded', () => {
                setTimeout(() => {
                    container.scrollTop = container.scrollHeight;
                }, 50);
            });
        });
    </script>
</div>
