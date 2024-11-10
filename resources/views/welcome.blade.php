<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Todo App</title>
</head>
<body class="bg-[#EADDCF]">
    <nav class="flex justify-between py-5 px-8 md:px-20 lg:px-[120px] text-[#716040] text-xl">
        <div><a href="/">Todo App</a></div>
        <ul class="flex gap-[50px]">
            @auth
                <li><a href="">View Tasks</a></li> 
                <li>
                    <form action="" method="post"> @csrf
                        <button type="submit">Log out</button>
                    </form>
                </li>   
            @endauth

            @guest
                <li><a href="/signup">Sign up</a></li>
                <li><a href="/login">Log in</a></li>
            @endguest
        </ul>
    </nav>

    {{-- Hero section --}}
    <div class="relative pt-24 pb-[300px] flex flex-col justify-center items-center text-center">
        <h1 class="text-[#716040] text-2xl">Todo App</h1>
        <div class="max-w-[600px]">
            <p class="mt-6 px-8 text-base text-[#716040] ">
                An App to organize and keep track of your tasks. Made with love using Laravel 11, Blade and Tailwind CSS.
            </p>
        </div>
            
        <button class="mt-11 px-4 py-[5px] bg-[#8C7851] text-2xl text-[#FFFFFE] rounded-[10px]">
            @auth
                <a href="/tasks/create">
                    Add Tasks
                </a>
            @endauth

            @guest
                <a href="/tasks">
                    Get Started
                </a>
            @endguest
        </button>
        
        <div class="w-full">
            <svg class="absolute bottom-[-2px] left-0 w-full" viewBox="0 0 1440 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path  d="M1440 82C1440 60.2523 1364.14 39.3952 1229.12 24.0172C1094.09 8.63926 910.956 1.64191e-06 720 0C529.044 -1.64191e-06 345.909 8.63926 210.883 24.0172C75.857 39.3952 2.88335e-05 60.2522 0 82L720 82H1440Z" fill="#FFFFFE"/>
            </svg>
        </div>

    </div>
    {{-- END Hero section --}}

    
    {{-- Core Features --}}
    <div class="pt-[76px] pb-[100px] px-8 md:px-20 lg:px-[120px] bg-[#FFFFFE]">
        <h1 class="text-[32px] text-[#716040] text-center">Core Features</h1>
        
        {{-- Cards row1 --}}
        <div class="pt-8 flex justify-between flex-wrap gap-8">
            {{-- Card 1 --}}
            <div class="mt-[40px] px-[10px] md:px-[30px] py-[30px] bg-[#EADDCF] rounded-[10px] w-full md:w-full lg:w-2/5 ">
                <h1 class="text-2xl text-[#716040]">Task Creation</h1>
                <ul class="pl-[30px] text-base text-[#716040] list-disc">
                    <li>A simple form to input a task title.</li>
                    <li>Validation to ensure the title isn't empty.</li>
                    <li>Store the task in the database.</li>
                </ul>
            </div>
            
            {{-- Card 2 --}}
            <div class="mt-[40px] px-[10px] md:px-[30px] py-[30px] bg-[#EADDCF] rounded-[10px] w-full md:w-full lg:w-2/5 ">
                <h1 class="text-2xl text-[#716040]">Task Listing</h1>
                <ul class="pl-[30px] text-base text-[#716040] list-disc">
                    <li>Display a list of all created tasks.</li>
                    <li>Include task titles and a status (completed/incomplete).</li>
                </ul>
            </div>
            
        </div>
        {{-- END Cards row 1 --}}
        
        {{-- Cards row 2 --}}
        <div class="pt-8 flex justify-between flex-wrap gap-8">
            {{-- Card 1 --}}
            <div class="mt-[40px] px-[10px] md:px-[30px] py-[30px] bg-[#EADDCF] rounded-[10px] w-full md:w-full lg:w-2/5 ">
                <h1 class="text-2xl text-[#716040]">Task Completion</h1>
                <ul class="pl-[30px] text-base text-[#716040] list-disc">
                    <li>A checkbox next to each task to mark it as completed.</li>
                    <li>Update the task's status in the database.</li>
                </ul>
            </div>
            
            {{-- Card 2 --}}
            <div class="mt-[40px] px-[10px] md:px-[30px] py-[30px] bg-[#EADDCF] rounded-[10px] w-full md:w-full lg:w-2/5 ">
                <h1 class="text-2xl text-[#716040]">Task Deletion</h1>
                <ul class="pl-[30px] text-base text-[#716040] list-disc">
                    <li>Delete a task from the database table.</li>
                </ul>
            </div>
            
        </div>
        {{-- END Cards row 2 --}}
    </div>
    {{-- Core Features --}}

    <footer class="py-5 bg-[#EADDCF] text-center">
        <p class="text-[#716040] text-xl"><a href="https://vedanthakur.com.np/">Vedant Thakur</a> © All rights reserved | {{ now()->year }}</p>
    </footer>

</body>
</html>