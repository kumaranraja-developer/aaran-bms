<div class="px-6 py-12 cursor-default bg-white dark:text-dark-9 dark:bg-dark text-gray-800 pt-30">
    <div class="grid grid-cols-1 lg:grid-cols-[40%_60%] gap-8 max-w-7xl mx-auto">

        <!-- Profile Card -->
        <article class="bg-gray-100 dark:bg-dark-4  rounded-2xl shadow-lg p-6 flex flex-col items-center text-center">
            <h2 class="text-2xl font-bold mt-4">{{$user->vname}} Profile</h2>

            <img src="{{ Storage::url('images/teams/' . $user->photo) }}" alt="Profile Photo"
                 class="w-40 h-40 rounded-full object-cover shadow-md hover:shadow-xl mt-5 transition duration-300" />

            <div
                class="inline-flex items-center mt-5 px-3 py-1 shadow-2xl rounded-full gap-x-2 {{$user->active_id==1?'bg-green-600':'bg-red-600'}}">

                <span class="h-2 w-2  rounded-full {{$user->active_id==1?'bg-green-300':'bg-red-500bg-red-500'}}"></span>

                <h2 class="font-normal {{$user->active_id==1?'text-white':'text-red-500'}}">
                    {{$user->active_id==1?'Active':'In-Active'}}
                </h2>

            </div>
            <p class="text-gray-600  dark:text-dark-8 mt-2">{{$user->vname}}</p>
            <p class="text-gray-500 dark:text-dark-8 text-sm mt-1">{{$user->role}}</p>
            <p class="text-gray-500 dark:text-dark-8 text-sm mt-1">{{$user->address}}</p>
        </article>

        <!-- About & Contact -->
        <div class="flex flex-col gap-8">

            <!-- About Section -->
            <section class="bg-gray-100 dark:bg-dark-4  p-6 rounded-2xl shadow-lg">
                <h3 class="text-xl dark:text-dark-9 font-bold mb-3 text-gray-800">About</h3>
                <p class="text-sm dark:text-dark-8 text-gray-700 leading-relaxed">
                    “I believe the best software is not just functional, but also reliable and scalable. That’s what I strive to deliver every day.”
                    Muthukumaran oversees the development of backend systems and ensures our GST software runs smoothly under all conditions. His coding expertise and team leadership help deliver robust, high-quality features.
                </p>
            </section>

            <!-- Contact Section -->
            <section class="bg-gray-100 dark:bg-dark-4 p-6 rounded-2xl shadow-lg">
                <h3 class="text-xl font-bold mb-4 dark:text-dark-9 text-gray-800">Contact</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="font-medium dark:text-dark-8 text-gray-600">Mobile:</span>
                        <span>{{$user->mobile}}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium dark:text-dark-8 text-gray-600">Email:</span>
                        <span>{{$user->mail}}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium dark:text-dark-8 text-gray-600">Facebook:</span>
                        <a href="https://my.codexsun.com/dev-teams" target="_blank" class="text-blue-500 hover:underline">{{$user->fb}}</a>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium dark:text-dark-8 text-gray-600">Twitter:</span>
                        <a href="https://my.codexsun.com/dev-teams" target="_blank" class="text-blue-500 hover:underline">{{$user->twitter}}</a>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium dark:text-dark-8 text-gray-600">Messenger:</span>
                        <a href="https://my.codexsun.com/dev-teams" target="_blank" class="text-blue-500 hover:underline">{{$user->msg}}</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
