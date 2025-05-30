<x-guest-layout>
    <class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">{{ __('Register') }}</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Role Selection -->
            <div class="mb-4">
                <x-input-label for="role" :value="__('Register as')" />
                <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md" required onchange="toggleFields()">
                    <option value="applicant">{{ __('Applicant') }}</option>
                    <option value="employer">{{ __('Employers') }}</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>
            <!-- Name -->
            <div id="name-field" class="mb-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md" 
                              type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div id="email-field" class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md" 
                              type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md" 
                              type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div> 

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md" 
                              type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
             <!-- Applicant-Specific Fields -->
             <div id="applicant-fields" class="mb-4">
                <!-- Gender -->
                <div id="gender-field" class="mb-4">
                    <x-input-label for="gender" :value="__('Gender')" />
                    <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md" required>
                        <option value="">--Select Gender--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
                <!-- Birthday -->
                <div class="mb-4">
                    <x-input-label for="birthday" :value="__('Birthday')" />
                    <x-text-input id="birthday" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md"
                                  type="date" name="birthday" :value="old('birthday')" />
                    <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                </div>
                <!-- Age -->
                <div class="mb-4">
                    <x-input-label for="age" :value="__('Age')" />
                    <x-text-input id="age" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md"
                                  type="text" name="age" :value="old('age')" />
                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                </div>
                <!-- Address -->
                <div class="mb-4">
                    <x-input-label for="address" :value="__('Address')" />
                    <x-text-input id="address" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md"
                                  type="text" name="address" :value="old('address')" />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
                <!-- Phone -->
                <div class="mb-4">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md"
                                  type="text" name="phone" :value="old('phone')" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
            </div>

            <!-- Employer-Specific Fields -->
            <div id="employer-fields" class="hidden">
                <!-- Company Name -->
                <div class="mb-4">
                    <x-input-label for="company_name" :value="__('Company/Business Name')" />
                    <x-text-input id="company_name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md" 
                                  type="text" name="company_name" :value="old('company_name')" />
                    <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                </div>

                <!-- Company Email -->
                <div class="mb-4">
                    <x-input-label for="company_email" :value="__('Company Email')" />
                    <x-text-input id="company_email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md" 
                                  type="email" name="company_email" :value="old('company_email')" />
                    <x-input-error :messages="$errors->get('company_email')" class="mt-2" />
                </div>

                <!-- Location -->
                <div class="mb-4">
                    <x-input-label for="location" :value="__('Location')" />
                    <x-text-input id="location" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md" 
                                  type="text" name="location" :value="old('location')" />
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>
                <!-- Employer Address -->
            </div>

            <!-- Already Registered -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:text-gray-900 underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>


    <!-- JavaScript to Toggle Fields -->
    <script>
        function toggleFields() {
            const role = document.getElementById('role').value;
            const employerFields = document.getElementById('employer-fields');
            const applicantFields = document.getElementById('applicant-fields');
            if (role === 'employer') {
                employerFields.classList.remove('hidden');
                applicantFields.classList.add('hidden');
            } else {
                employerFields.classList.add('hidden');
                applicantFields.classList.remove('hidden');
            }
        }
        document.addEventListener('DOMContentLoaded', toggleFields);
    </script>
</x-guest-layout>
