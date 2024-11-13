<div id="dropdown-content">
    <div id="menus-content" class="flex justify-around bottom-4"> <!-- contenidor menus -->
        <div class="w-1/2 relative border-2 border-yellow-400 rounded-lg p-4 mx-8 h-80">
        <h4 class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gray-50 px-2 text-yellow-400">NEW TEAM</h4>
            <form id="newTeam" action="{{ route('teams.new') }}" method="POST" class="w-full mt-8">
                @csrf <!-- Token CSRF -->
                <div class="mb-4">
                    <input type="text" name="name" maxlength="25" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none focus:shadow-outline" placeholder="name" required>
                </div>
                <div class="mb-4">
                    <input type="text" name="AKA" maxlength="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none focus:shadow-outline" placeholder="AKA" required>
                </div>
                <div class="mb-4">
                    <select id="type" name="type" class="shadow border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="" disabled selected hidden>type</option>
                        <option value="school">School</option>
                        <option value="club">Club</option>
                    </select>
                </div>
                <div class="mb-7">
                    <label for="location_team" class="block text-gray-600 text-sm mb-2"></label>
                    <input type="text" id="location_team" name="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none focus:shadow-outline" placeholder="location" required>
                </div>
            </form>
                
            

            <div class="flex items-center justify-center mt-16">
                <button type="submit" form="newTeam" class="flex items-center justify-center w-4 h-4 bg-yellow-400 text-white 
                                            rounded-full transition-all duration-300 ease-in-out outline-none transform hover-scale-big 
                                            overflow-hidden relative">
                    <svg class="absolute inset-0 flex items-center justify-center tracking-negative font-bold opacity-0 hover:opacity-100 transform 
                    transition-transform hover:rotate-180 duration-500" 
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" 
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                </button>
            </div>
        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------contenidor menu game -->
        <div class="w-1/2 relative border-2 border-yellow-400 rounded-lg p-4 mx-8 h-80">  
                <form id="newGame" name="game" action="{{ route('games.new') }}" method="POST" class="w-full mt-8">
                    @csrf <!-- Token CSRF -->
                    <div class="flex-col items-center">    
                        <div class="flex justify-around">
                            <div class="mb-4">
                                <select name="home_team_id" class="shadow border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none 
                                                                                    focus:shadow-outline" required>
                                    <option value="" disabled selected hidden>Home</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">
                                                {{ $team->name }}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mx-4">
                            vs
                            </div>
                            <div class="mb-4">
                                <select name="away_team_id" class="shadow border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none 
                                                                                focus:shadow-outline" required>
                                    <option value="" disabled selected hidden>Away</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}">
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-gray-600 text-sm mb-2"></label>
                            <input type="date" id="date" name="game_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight 
                                                                                    focus:outline-none focus:shadow-outline" placeholder="date" required>
                        </div>
                        <div class="mb-20">
                            <select id="location" name="location" class="shadow border rounded w-full py-2 px-3 text-gray-600 leading-tight focus:outline-none 
                                                                            focus:shadow-outline bottom-20">
                            @foreach($teams as $team)
                                <option value="{{ $team->location }}">
                                    {{ $team->location }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </form>

                <h4 class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gray-50 px-2 text-yellow-400">NEW GAME</h4>

                <div class="flex items-center justify-center mt-28">
                    <button type="submit" form="newGame" class="flex items-center justify-center w-4 h-4 bg-yellow-400 text-white 
                                                rounded-full transition-all duration-300 ease-in-out outline-none transform hover-scale-big 
                                                overflow-hidden relative">
                        <svg class="absolute inset-0 flex items-center justify-center tracking-negative font-bold opacity-0 hover:opacity-100 transform 
                        transition-transform hover:rotate-180 duration-500" 
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
    
</div>