<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
           <h1></h1>
                <div class="flex flex-col gap-4 lg:w-1/2">
                    <h1 class="text-2xl lg:text-3xl font-bold">welcome to your Laravel Jetstream application!</h1>
                    <p class="text-[#6b6b6b] dark:text-[#a8a8a8]">Laravel Jetstream is designed using Tailwind CSS and offers your choice of Livewire or Inertia scaffolding.</p>
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
gi