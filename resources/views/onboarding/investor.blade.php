<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Investor Onboarding') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-500">Complete Your Investor/Business Profile</h3>
                    
                    <form method="POST" action="{{ route('onboarding.investor.store') }}">
                        @csrf

                        <!-- Business Name -->
                        <div class="mb-5">
                            <x-input-label for="business_name" :value="__('Business / Company Name')" />
                            <x-text-input id="business_name" class="block mt-1 w-full" type="text" name="business_name" :value="old('business_name')" required autofocus />
                            <x-input-error :messages="$errors->get('business_name')" class="mt-2" />
                        </div>

                        <!-- Website -->
                        <div class="mb-5">
                            <x-input-label for="website" :value="__('Website (Optional)')" />
                            <x-text-input id="website" class="block mt-1 w-full" type="url" name="website" :value="old('website')" placeholder="https://yourcompany.com" />
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>

                        <!-- Business Category -->
                        <div class="mb-5">
                            <x-input-label for="business_category" :value="__('Business Category')" />
                            <select id="business_category" name="business_category" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="" disabled selected>Select category matching creators you want</option>
                                <option value="Technology">Technology</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Fitness">Fitness</option>
                                <option value="Finance">Finance</option>
                            </select>
                            <x-input-error :messages="$errors->get('business_category')" class="mt-2" />
                        </div>

                        <!-- Sub Category -->
                        <div class="mb-5">
                            <x-input-label for="sub_category" :value="__('Sub-Category')" />
                            <x-text-input id="sub_category" class="block mt-1 w-full" type="text" name="sub_category" :value="old('sub_category')" required placeholder="e.g. PC Hardware, Streetwear" />
                            <x-input-error :messages="$errors->get('sub_category')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:from-blue-600 hover:to-cyan-600 focus:bg-blue-600 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 transform hover:-translate-y-1 shadow-lg">
                                {{ __('Save Profile & Discover Matches') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
