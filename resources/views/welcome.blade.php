<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Job Marketplace</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 overflow-x-hidden">
    <!-- Navigation Bar -->
<nav class="bg-[#010066] text-white" style="position: sticky; top: 0; z-index: 50;" x-data="{ open: false }">
  <div class="container mx-auto px-6 py-4 flex justify-between items-center">
 
  <!-- Logo -->
    <a href="{{ url('/') }}" class="flex items-center space-x-2">
      <img src="{{ asset('images/mainlogo.png') }}" alt="Logo" class="h-12 w-auto">
      <span class="text-xl font-aboreto">Bataan JobStreet</span>
    </a>

    <!-- Mobile Toggle Button -->
    <button @click="open = !open" class="md:hidden text-white focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

    <!-- Desktop Menu -->
    <div class="hidden md:flex flex-1 justify-center space-x-6 items-center mx-4">
      <a href="#" class="hover:underline">Home</a>
      <a href="#" class="hover:underline">Jobs</a>
      <a href="#" class="hover:underline">About</a>
      <a href="#" class="hover:underline">Contact</a>
      <a href="#" class="hover:underline">Career</a>
    </div>
  <!-- Authentication Links -->
  <div class="hidden md:flex space-x-4 mx-4">
    @php
        $applicant = Auth::guard('applicant')->user();
        $employer = Auth::guard('employer')->user();
    @endphp

    @if(!$applicant && !$employer)
        <!-- Show Login/Register links -->
        <a href="{{ route('login') }}" class="px-4 py-2 bg-[#010066] border-2 border-white rounded-lg">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-[#010066] rounded-lg">Register</a>
    @else
        <!-- Show Logout button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="hidden" name="role" value="{{ $applicant ? 'applicant' : 'employer' }}">
            <button type="submit" class="px-4 py-2 bg-[#010066] border-2 border-white rounded-lg text-white">
                Logout
            </button>
        </form>
    @endif
</div>
  </div>

  <!-- Mobile Dropdown Menu -->
<div x-show="open" x-transition class="md:hidden bg-[#010066] px-6 pb-4 space-y-2">
    <a href="#" class="block text-white hover:bg-[#002080] px-4 py-2 rounded-lg">Home</a>
    <a href="#" class="block text-white hover:bg-[#002080] px-4 py-2 rounded-lg">Jobs</a>
    <a href="#" class="block text-white hover:bg-[#002080] px-4 py-2 rounded-lg">About</a>
    <a href="#" class="block text-white hover:bg-[#002080] px-4 py-2 rounded-lg">Contact</a>
    <a href="#" class="block text-white hover:bg-[#002080] px-4 py-2 rounded-lg">Career</a>
    <div class="flex flex-col space-y-2 mt-4">
        @php
            $applicant = Auth::guard('applicant')->user();
            $employer = Auth::guard('employer')->user();
        @endphp

        @if(!$applicant && !$employer)
            <a href="{{ route('login') }}" class="px-4 py-2 bg-[#010066] border-2 border-white rounded-lg text-center">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-[#010066] rounded-lg text-center">Register</a>
        @else
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-[#010066] border-2 border-white rounded-lg text-center text-white">
                    Logout
                </button>
            </form>
        @endif
    </div>
</div>
</nav>

    <!-- Hero Section -->
<section class="relative bg-gray-400 px-6 md:px-20 pt-10">
  <!-- Background Image -->
  <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/background.png') }}'); opacity: 0.3;"></div>

  <!-- Content Overlay -->
  <div class="relative z-10 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Text Content -->
    <div class="text-center md:text-left flex flex-col justify-center items-center md:items-start px-6">
      <h1 class="text-6xl md:text-8xl font-semibold text-black leading-tight">
        Find Your Dream<br>
        Job here in Bataan!
      </h1>
      <p class="my-4 text-base md:text-lg text-black max-w-md">
        Explore top job opportunities near you. Connect with the best companies. Start your career today!
      </p>
    </div>

    <!-- Image Content -->
    <div class="flex justify-center items-center px-6 md:mt-6 lg:mt-0">
      <img src="{{ asset('images/subject.png') }}" alt="subject" class="object-contain w-3/4 md:w-1/2 lg:w-auto">
    </div>
  </div>
</section>

    <!-- Features Section -->
    <section class="container mx-auto py-16 px-6">
        <h2 class="text-3xl font-bold text-center">Why Choose Us?</h2>
        <div class="grid md:grid-cols-3 gap-8 mt-8">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <img src="{{ asset('images/internship.png') }}" alt="Internships" class="w-20 mx-auto">
                <h3 class="text-xl font-semibold mt-4">Internships</h3>
                <p class="text-gray-600 mt-2">Get real-world experience with top companies.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <img src="{{ asset('images/freelance.png') }}" alt="Freelancing" class="w-20 mx-auto">
                <h3 class="text-xl font-semibold mt-4">Freelance Jobs</h3>
                <p class="text-gray-600 mt-2">Earn while you study with remote projects.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <img src="{{ asset('images/community.png') }}" alt="Community" class="w-20 mx-auto">
                <h3 class="text-xl font-semibold mt-4">Student Community</h3>
                <p class="text-gray-600 mt-2">Network and grow with like-minded students.</p>
            </div>
        </div>
    </section>
    <section class="mx-auto py-16 px-6 bg-gray-400">
    <h2 class="text-3xl font-bold text-center mb-8">Our Partners</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-11 gap-4">
        <!-- Replace these with your actual logo image paths -->
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/abucay-logo.png') }}" alt="Partner 1" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/bagac-logo.png') }}" alt="Partner 2" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/balanga-logo.png') }}" alt="Partner 3" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/dinalupihan-logo.png') }}" alt="Partner 4" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/limay-logo.png') }}" alt="Partner 5" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/mariveles-logo.png') }}" alt="Partner 6" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/morong-logo.png') }}" alt="Partner 7" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/pilar-logo.png') }}" alt="Partner 8" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/orani-logo.png') }}" alt="Partner 9" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/orion-logo.png') }}" alt="Partner 10" class="object-contain h-25 w-auto">
        </div>
        <div class="flex justify-center items-center bg-white p-1 rounded-lg shadow-md">
            <img src="{{ asset('images/hermosa-logo.png') }}" alt="Partner 11" class="object-contain h-25 w-auto">
        </div>
    </div>
</section>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-6 mt-12">
        <p>&copy; 2025 JobStreet for Students. All rights reserved.</p>
    </footer>

</body>
</html>