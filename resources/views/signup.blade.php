<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Log in</title>
</head>
<body class="bg-[#EADDCF]">
    <nav class="flex justify-between py-5 px-8 md:px-20 lg:px-[120px] text-[#716040] text-xl">
        <div><a href="/">Todo App</a></div>
        <ul class="flex gap-[50px]">
            <li><a href="/login">Log in</a></li>
        </ul>
    </nav>

    
    {{-- Main --}}
    <div class="pt-[76px] pb-[100px] px-8 md:px-20 lg:px-[120px] bg-[#FFFFFE] flex flex-col items-center min-h-screen">
        <p class="text-center text-[18px] text-[#716040]">Sign up to Todo App to Get started...</p>
        
        <div class="mt-3 px-[30px] pt-[30px] pb-[90px] md:w-[526px] bg-[#EADDCF] text-[#716040] rounded-tl-[10px] rounded-tr-[100px] rounded-bl-[100px] rounded-br-[10px]">
            <h1 class="text-[32px]">Sign up</h1>
            <form action="{{ route('register') }}" method="POST"> @csrf
                <label for="name" class="text-base">Name:</label>
                <div class="mb-[20px]">
                    <input type="text" name="name" id="name" placeholder="Enter name" class="px-3 py-[6px] w-full text-xl rounded-[7px]">
                </div>
                <label for="email" class="text-base">Email:</label>
                <div class="mb-[20px]">
                    <input type="text" name="email" id="email" placeholder="Enter email" class="px-3 py-[6px] w-full text-xl rounded-[7px]">
                </div>
                <label for="password" class="text-base">Password</label>
                <div class="mb-[20px]">
                    <input type="password" name="password" id="password" placeholder="Enter password" class="px-3 py-[6px] w-full text-xl rounded-[7px]">
                </div>
                <label for="password_confirmation" class="text-base">Password Confirm</label>
                <div class="mb-[20px]">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter password again" class="px-3 py-[6px] w-full text-xl rounded-[7px]">
                </div>
                <button class="px-[18px] py-[5px] bg-[#8C7851] text-[#FFFFFE] text-xl rounded-[10px]">Sign up</button>
            </form>
        </div>
        
    </div>
    {{-- END Main --}}

    <footer class="py-5 bg-[#EADDCF] text-center">
        <p class="text-[#716040] text-xl"><a href="https://vedanthakur.com.np/">Vedant Thakur</a> © All rights reserved | {{ now()->year }}</p>
    </footer>

</body>
</html>