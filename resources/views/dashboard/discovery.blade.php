<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recommended Collaborations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white">Smart Matches</h3>
                <p class="text-gray-500 dark:text-gray-400 mt-2">These profiles perfectly align with your niche and sub-niche settings.</p>
            </div>

            @if(count($displayMatches) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($displayMatches as $match)
                        @php
                            $isCreator = auth()->user()->role === 'creator';
                            $profileUser = $isCreator ? $match->investor->user : $match->creator->user;
                            $profileData = $isCreator ? $match->investor : $match->creator;
                            
                            $statusColor = $match->status === 'connected' ? 'bg-green-500' : ($match->status === 'pending' ? 'bg-yellow-500' : 'bg-red-500');
                        @endphp
                        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700 transform transition duration-300 hover:scale-105 hover:shadow-2xl flex flex-col">
                            <div class="h-32 bg-gradient-to-r {{ $isCreator ? 'from-blue-500 to-cyan-500' : 'from-purple-500 to-pink-500' }} relative">
                                <div class="absolute -bottom-10 left-6">
                                    <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full border-4 border-white dark:border-gray-800 flex items-center justify-center text-2xl font-bold text-gray-500 dark:text-gray-300 shadow-md">
                                        {{ substr($profileUser->name, 0, 1) }}
                                    </div>
                                </div>
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-white/20 text-white backdrop-blur-md flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full {{ $statusColor }}"></span>
                                        {{ ucfirst($match->status) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="pt-14 p-6 flex-grow flex flex-col">
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-1">{{ $isCreator ? $profileData->business_name : $profileUser->name }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">{{ $isCreator ? 'Investor / Business' : 'Creator' }}</p>
                                
                                <div class="space-y-2 mb-6 flex-grow">
                                    <div class="flex items-center text-sm">
                                        <span class="text-gray-500 dark:text-gray-400 w-24">Niche:</span>
                                        <span class="font-medium text-gray-900 dark:text-gray-200">{{ $isCreator ? $profileData->business_category : $profileData->niche }}</span>
                                    </div>
                                    <div class="flex items-center text-sm">
                                        <span class="text-gray-500 dark:text-gray-400 w-24">Sub-Niche:</span>
                                        <span class="font-medium text-gray-900 dark:text-gray-200">{{ $isCreator ? $profileData->sub_category : $profileData->sub_niche }}</span>
                                    </div>
                                </div>

                                <a href="{{ route('chat', $match->id) }}" class="block w-full text-center px-4 py-3 bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-semibold rounded-xl hover:bg-gray-800 dark:hover:bg-gray-100 transition shadow-md">
                                    {{ $match->status === 'connected' ? 'Continue Chat' : 'Connect / Chat' }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-12 text-center border border-gray-200 dark:border-gray-700">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">No Matches Yet</h3>
                    <p class="text-gray-500 dark:text-gray-400">We couldn't find any exact matches for your niche and sub-niche at the moment. Check back later!</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
