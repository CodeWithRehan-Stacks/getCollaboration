<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Creator Onboarding') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">Complete Your Creator Profile</h3>
                    
                    <form method="POST" action="{{ route('onboarding.creator.store') }}">
                        @csrf

                        <!-- Date of Birth -->
                        <div class="mb-5">
                            <x-input-label for="dob" :value="__('Date of Birth')" />
                            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autofocus />
                            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                        </div>

                        <!-- Niche -->
                        <div class="mb-5">
                            <x-input-label for="niche" :value="__('Main Niche')" />
                            <select id="niche" name="niche" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="" disabled selected>Select your primary niche</option>
                                <option value="Technology">Technology</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Fitness">Fitness</option>
                                <option value="Finance">Finance</option>
                            </select>
                            <x-input-error :messages="$errors->get('niche')" class="mt-2" />
                        </div>

                        <!-- Sub Niche -->
                        <div class="mb-5">
                            <x-input-label for="sub_niche" :value="__('Sub-Niche')" />
                            <x-text-input id="sub_niche" class="block mt-1 w-full" type="text" name="sub_niche" :value="old('sub_niche')" required placeholder="e.g. PC Hardware, Streetwear" />
                            <x-input-error :messages="$errors->get('sub_niche')" class="mt-2" />
                        </div>

                        <!-- Social Media Links (Simplified as comma separated or JSON for now, let's use a single text field that we cast to array later or just use JSON text) -->
                        <div class="mb-6">
                            <x-input-label for="social_media_links" :value="__('Social Media Profile URL (Primary)')" />
                            <x-text-input id="social_media_links" class="block mt-1 w-full" type="url" name="social_media_links[]" :value="old('social_media_links.0')" placeholder="https://instagram.com/yourhandle" />
                            <x-input-error :messages="$errors->get('social_media_links')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:from-purple-600 hover:to-pink-600 focus:bg-purple-600 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 transform hover:-translate-y-1 shadow-lg">
                                {{ __('Save Profile & Discover Matches') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
