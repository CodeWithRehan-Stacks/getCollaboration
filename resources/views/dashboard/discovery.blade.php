<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-3 leading-tight flex items-center gap-2">
            <svg class="w-5 h-5 text-primary-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            {{ __('Recommended Collaborations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 p-6 bg-white/5 dark:bg-brand-dark/40 border border-primary-1/20 rounded-2xl backdrop-blur-md">
                <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white bg-gradient-to-r from-primary-1 to-primary-3 bg-clip-text text-transparent w-max">Smart Matches</h3>
                <p class="text-gray-500 dark:text-gray-400 mt-2">These profiles perfectly align with your niche and sub-niche settings.</p>
            </div>

            @if(count($displayMatches) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($displayMatches as $match)
                        @php
                            $isCreator = auth()->user()->role === 'creator';
                            $profileUser = $isCreator ? $match->investor->user : $match->creator->user;
                            $profileData = $isCreator ? $match->investor : $match->creator;
                            
                            $statusColor = $match->status === 'connected' ? 'bg-primary-1' : ($match->status === 'pending' ? 'bg-yellow-500' : 'bg-red-500');
                        @endphp
                        <div class="bg-white/5 dark:bg-brand-dark/60 rounded-3xl shadow-xl overflow-hidden border border-primary-1/10 hover:border-primary-1/40 transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col backdrop-blur-sm group">
                            <div class="h-32 bg-gradient-to-br {{ $isCreator ? 'from-primary-2/20 to-primary-3/20' : 'from-deep/20 to-primary-1/20' }} relative border-b border-primary-1/10 group-hover:from-primary-2/40 group-hover:to-primary-3/40 transition-colors">
                                <div class="absolute -bottom-10 left-6">
                                    <div class="w-20 h-20 bg-brand-light dark:bg-brand-dark rounded-full border-4 border-white dark:border-gray-800 flex items-center justify-center text-2xl font-bold text-primary-3 shadow-md">
                                        {{ substr($profileUser->name, 0, 1) }}
                                    </div>
                                </div>
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-black/40 text-white backdrop-blur-md flex items-center gap-2 border border-white/10">
                                        <span class="w-2 h-2 rounded-full {{ $statusColor }} shadow-[0_0_8px_currentColor]"></span>
                                        {{ ucfirst($match->status) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="pt-14 p-6 flex-grow flex flex-col">
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-1">{{ $isCreator ? $profileData->business_name : $profileUser->name }}</h4>
                                <p class="text-sm text-primary-2 mb-4 font-medium">{{ $isCreator ? 'Investor / Brand' : 'Creator' }}</p>
                                
                                <div class="space-y-3 mb-8 flex-grow p-4 bg-black/20 rounded-xl border border-white/5">
                                    <div class="flex items-center text-sm">
                                        <span class="text-gray-400 w-24">Niche:</span>
                                        <span class="font-medium text-gray-200">{{ $isCreator ? $profileData->business_category : $profileData->niche }}</span>
                                    </div>
                                    <div class="flex items-center text-sm">
                                        <span class="text-gray-400 w-24">Sub-Niche:</span>
                                        <span class="font-medium text-gray-200">{{ $isCreator ? $profileData->sub_category : $profileData->sub_niche }}</span>
                                    </div>
                                </div>

                                <a href="{{ route('chat', $match->id) }}" class="block w-full text-center px-4 py-3 bg-gradient-to-r from-primary-1 to-primary-3 text-brand-dark font-bold rounded-xl hover:from-primary-2 hover:to-deep transition-all shadow-lg hover:shadow-primary-1/20">
                                    {{ $match->status === 'connected' ? 'Continue Chat' : 'Connect / Chat' }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white/5 dark:bg-brand-dark/40 rounded-3xl shadow-sm p-12 text-center border border-primary-1/10 backdrop-blur-md">
                    <div class="w-20 h-20 bg-primary-1/10 rounded-full flex items-center justify-center mx-auto mb-6 border border-primary-1/20">
                        <svg class="w-10 h-10 text-primary-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No Matches Yet</h3>
                    <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto">We couldn't find any exact matches for your niche and sub-niche at the moment. Our engine is constantly scanning, check back later!</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
