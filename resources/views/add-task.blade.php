<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Todos</title>
</head>

<body class="bg-[#EADDCF]">
    <nav class="flex justify-between py-5 px-8 md:px-20 lg:px-[120px] text-[#716040] text-xl">
        <div><a href="/">Todo App</a></div>
        <ul class="flex gap-[50px]">
            <li>
                <form action="" method="post"> @csrf
                    <button type="submit">Log out</button>
                </form>
            </li>
        </ul>
    </nav>


    {{-- Main --}}
    <div class="pt-6 pb-[100px] px-8 md:px-20 lg:px-[120px] bg-[#FFFFFE] flex flex-col items-center min-h-screen">
        <p class="w-full text-right text-[18px] text-[#716040]">Welcome back,  Auth::user()->name</p>

        <h1 class="mt-10 mb-11 text-2xl text-[#020826] font-bold">Add a Todo</h1>


        {{-- Add Task --}}
        <div class="mt-2 px-[30px] pt-[30px] pb-[70px] w-full bg-[#EADDCF] text-[#716040] rounded-tl-[10px] rounded-tr-[100px] rounded-bl-[100px] rounded-br-[10px] flex flex-col gap-[30px]">
            <form action="{{ route('tasks.store') }}" method="post" class="flex flex-col gap-[25px]"> @csrf
                <div>
                    <label for="title" class="text-[#716040]">Title: *</label>
                    <div>
                        <input type="text" id="title" name="title" placeholder="Enter Title" class="px-3 py-[6px] w-full text-xl rounded-[7px] bg-[#FFFFFE]">
                    </div>
                    @error('title')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="text-[#716040]">Description:</label>
                    <div>
                        <textarea name="description" id="description" cols="30" rows="5" placeholder="Enter description" class="px-3 py-[6px] w-full text-xl rounded-[7px] bg-[#FFFFFE]"></textarea>
                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <button class="px-[18px] py-[5px] bg-[#8C7851] text-[#FFFFFE] text-xl rounded-[10px]">Add Task</button>
                </div>
            </form>

        </div>
        {{-- END Todo List --}}

    </div>
    {{-- END Main --}}

    <footer class="py-5 bg-[#EADDCF] text-center">
        <p class="text-[#716040] text-xl"><a href="https://vedanthakur.com.np/">Vedant Thakur</a> © All rights reserved
            | {{ now()->year }}</p>
    </footer>

</body>

</html>
