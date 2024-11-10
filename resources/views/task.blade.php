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
        <p class="w-full text-right text-[18px] text-[#716040]">Welcome back, Auth::user()->name</p>

        <h1 class="mt-10 text-2xl text-[#020826] font-bold ">Todo List</h1>

        <div class="w-full">
            <button class="mt-11 px-[18px] py-[5px] bg-[#8C7851] text-xl text-[#FFFFFE] rounded-[10px]">
                <a href="/tasks/create">
                    Add Task
                </a>
            </button>
        </div>


        {{-- Todo List --}}
        <div class="mt-2 px-[30px] py-[70px] w-full bg-[#EADDCF] text-[#716040] rounded-tl-[10px] rounded-tr-[100px] rounded-bl-[100px] rounded-br-[10px] flex flex-col gap-[30px]">

            {{-- Show item --}}
            <div class="px-6 py-2 bg-[#FFFFFE] text-[#716040] rounded-[5px]  shadow">
                
                {{-- card upper section --}}
                <div class="md:flex md:justify-between md:items-center">
                    {{-- check completed + title + date --}}
                    <div class="flex items-center">
                        {{-- check completed --}}
                        <form action="" method="post" class="flex items-center" > @csrf
                            @method('patch')
                            <input type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}
                            class="w-6 h-6 rounded focus:ring-3"
                            >
                        </form>
                        {{-- END check completed --}}
                        
                        {{-- Title & date --}}
                        <div class="mx-6">
                            <h1 class="text-lg">{{ $task->title }}</h1>
                            <p class="text-sm">{{ $task->created_at }}</p>
                        </div>
                    </div>
                    {{-- END check completed + title + date --}}

                    {{-- Actions --}}
                    <div class="flex justify-end gap-16">
                        <div>
                            <a class="flex items-center gap-[5px]" href="">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                    d="M11 4.5H4C3.46957 4.5 2.96086 4.71071 2.58579 5.08579C2.21071 5.46086 2 5.96957 2 6.5V20.5C2 21.0304 2.21071 21.5391 2.58579 21.9142C2.96086 22.2893 3.46957 22.5 4 22.5H18C18.5304 22.5 19.0391 22.2893 19.4142 21.9142C19.7893 21.5391 20 21.0304 20 20.5V13.5"
                                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                    d="M18.5 3.00023C18.8978 2.6024 19.4374 2.37891 20 2.37891C20.5626 2.37891 21.1022 2.6024 21.5 3.00023C21.8978 3.39805 22.1213 3.93762 22.1213 4.50023C22.1213 5.06284 21.8978 5.6024 21.5 6.00023L12 15.5002L8 16.5002L9 12.5002L18.5 3.00023Z"
                                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                        
                                <button>Edit</button>
                            </a>
                        </div>
                
                        <div>
                            <form method="POST" action=""  > @csrf
                                @method('delete')
    
                                <button class="flex items-center gap-[5px] active:animate-ping" type="submit">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                        d="M8.66806 14.1837C4.41024 17.5959 3.03927 19.4598 0.0836861 20.5C-0.106038 20.1121 0.0544429 19.7947 0.289739 19.1932L2.83071 15.2001L5.78374 11.3522L2.76204 7.43176L1.73191 5.76193L0.839139 3.9469C0.715303 2.84566 0.796876 2.40526 1.18249 1.91406C1.64188 1.46389 2.08447 1.43398 3.31141 1.91406C4.35516 2.39527 4.95504 2.74858 6.05844 3.58389C7.82851 5.03093 8.50346 5.72121 9.90424 7.06872C16.2921 1.69975 18.667 0.0339854 19.9995 0.607157C20.0307 2.04938 18.7235 4.12109 12.8573 10.5535C15.8093 14.4433 17.2692 16.4833 18.2826 18.9754C18.1942 19.881 17.9961 20.1489 16.9091 20.1369C13.543 18.417 11.742 17.0998 8.66806 14.1837Z"
                                        fill="#EF4136" />
                                    </svg>
                                    <p>Delete</p>
                                </button>
                            </form>
                        </div>
                    </div>
                    {{-- END Actions --}}
                </div>
                {{-- END card upper section --}}

                {{-- Description --}}
                <div class="my-5">
                    <p>{{ $task->description }}</p>
                </div>
                {{-- END Description --}}


            </div>
            {{-- END Show item --}}


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
