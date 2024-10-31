    <div id="dropdown-content">
            <div id="menus-content" class="flex justify-around bottom-4"> <!-- contenidor menus -->
                <div class="flex-1 mx-8"> <!-- contenidor menu team -->
                    <h4 class="text-2xl font-semibold text-center text-yellow-400 dark:text-gray-400">NEW TEAM</h4>
                    <form name="team" action="/ruta-al-controlador" method="POST" class="w-full mt-8">
                            <div class="mb-4">
                                <input type="text" name="name" maxlength="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="name" required>
                            </div>
                            <div class="mb-4">
                                <select id="type" name="type" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="" disabled selected hidden>type</option>
                                    <option value="school">School</option>
                                    <option value="club">Club</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="stadium" class="block text-gray-700 text-sm mb-2"></label>
                                <input type="text" id="stadium" name="stadium" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="stadium" required>
                            </div>
                        <div class="flex items-center justify-center">
                                <button type="submit" class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white 
                                                            rounded-full hover:bg-blue-700 transition-all duration-300 ease-in-out outline-none transform hover:scale-125 
                                                            transition-transform duration-200">
                                    <svg class="w-6 h-6 transform transition-transform hover:rotate-180 duration-500" 
                                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" 
                                                xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                                    </svg>
                                </button>
                        </div>
                        <input type="hidden" name="type" value="new">
                    </form>
                </div>

                <div class="flex-1 mx-8"> <!-- contenidor menu game -->
                    <h4 class="text-2xl font-semibold text-center text-yellow-400 dark:text-gray-400">NEW GAME</h4>
                    <form name="game" action="/ruta-al-controlador" method="POST" class="w-full mt-8">
                        <div class="flex-col items-center">    
                            <div class="flex justify-around">    
                                <div class="mb-4">
                                    <input type="text" name="name" maxlength="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="local" required>
                                </div>
                                <div class="mx-4">
                                VS
                                </div>
                                <div class="mb-4">
                                <input type="text" name="name" maxlength="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="away" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="year" class="block text-gray-700 text-sm mb-2"></label>
                                <input type="text" id="year" name="year" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="date" required>
                            </div>
                            <div class="mb-4">
                                <label for="stadium" class="block text-gray-700 text-sm mb-2"></label>
                                <input type="text" id="stadium" name="stadium" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="stadium" required>
                            </div>
                            <div class="flex items-center justify-center">
                                <button type="submit" class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white 
                                                            rounded-full hover:bg-blue-700 transition-all duration-300 ease-in-out outline-none transform hover:scale-125 
                                                            transition-transform duration-200">
                                    <svg class="w-6 h-6 transform transition-transform hover:rotate-180 duration-500" 
                                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" 
                                                xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <button type="button" id="close-dropdown" class="mt-2 bg-red-500 text-white px-4 py-2 rounded">Close</button>
    </div>