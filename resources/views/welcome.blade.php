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

<nav class="bg-[#010066] text-white" x-data="{ open: false }">
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
    <div class="hidden md:flex space-x-6 items-center">
      <a href="#" class="hover:underline">Home</a>
      <a href="#" class="hover:underline">Jobs</a>
      <a href="#" class="hover:underline">About</a>
      <a href="#" class="hover:underline">Contact</a>
      <a href="#" class="hover:underline">Career</a>
     
      <a href="{{ route('login') }}" class="px-4 py-2 bg-[#010066] border-2 border-white rounded-lg">Login</a>
    <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-[#010066] rounded-lg">Register</a>
  </div>
  </div>

  <!-- Mobile Dropdown Menu -->
  <div x-show="open" class="md:hidden bg-[#010066] px-6 pb-4 space-y-2">
    <a href="#" class="block hover:underline">Home</a>
    <a href="#" class="block hover:underline">Jobs</a>
    <a href="#" class="block hover:underline">About</a>
    <a href="#" class="block hover:underline">Contact</a>
    <a href="#" class="block hover:underline">Career</a>
    <div class="flex flex-col space-y-2 mt-4">
    <a href="{{ route('login') }}" class="px-4 py-2 bg-[#010066] border-2 border-white rounded-lg text-center">Login</a>
    <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-[#010066] rounded-lg text-center">Register</a>
  </div>
</nav>
      <!-- <button class="hover:text-gray-300">Menu</button>
      <div class="absolute left-0 mt-2 hidden group-hover:block bg-white text-black rounded shadow-lg py-2 w-40 z-10">
        <a href="/" class="block px-4 py-2 hover:bg-gray-200">Home</a>
        <a href="/jobs" class="block px-4 py-2 hover:bg-gray-200">Jobs</a>
        <a href="/about" class="block px-4 py-2 hover:bg-gray-200">About</a>
        <a href="/contact" class="block px-4 py-2 hover:bg-gray-200">Contact</a>
      </div>
    </div>
           <div>
               <a href="{{ route('login') }}" class="px-4 py-2 bg-[#010066] border-2 border-white rounded-lg">Login</a>
               <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-[#010066] rounded-lg">Sign Up</a>
           </div>
        </div> 
    <!-- Hero Section -->
   <section class="bg-gray-400 px-20 pt-10">
  <div class="grid grid-cols-1 md:grid-cols-2">
    
    <!-- Text Content -->
    <div class="text-left md:text-left flex flex-col justify-center items-start px-6">
      <h1 class="text-4xl md:text-6xl font-semibold text-black leading-tight">
        Find Your Dream<br>
        Job here in Bataan!
      </h1>
      <p class="mt-4 text-lg text-black max-w-md mx-auto md:mx-0">
        Explore top job opportunities near you. Connect with the best companies. Start your career today!
      </p>
   </div>
      <!-- Call to Action Button -->
    <div class="justify-center items-bottom px-6 pt-10">
      <img src="{{ asset('images/subject.png') }}" alt="subject" class="object-contain">
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

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-6 mt-12">
        <p>&copy; 2025 JobStreet for Students. All rights reserved.</p>
    </footer>

</body>
</html>