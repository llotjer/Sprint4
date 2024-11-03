<div id="dropdown-content">
    <div id="menus-content" class="flex justify-around bottom-4"> <!-- contenidor menus -->
        <div class="flex-1 mx-8"> <!-- contenidor menu team -->
            <h4 class="text-2xl font-semibold text-center text-yellow-400 dark:text-gray-400">NEW TEAM</h4>
            <form name="team" action="{{ route('teams.store') }}" method="POST" class="w-full mt-8">
                @csrf <!-- Token CSRF -->
                <div class="mb-4">
                    <input type="text" name="name" autocomplete="off" maxlength="25" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="name" required>
                </div>
                <div class="mb-4">
                    <input type="text" name="AKA" autocomplete="off" maxlength="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="AKA" required>
                </div>
                <div class="mb-4">
                    <select id="type" name="type" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="" disabled selected hidden>type</option>
                        <option value="school">School</option>
                        <option value="club">Club</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="location_team" class="block text-gray-700 text-sm mb-2"></label>
                    <input type="text" id="location_team" name="location" autocomplete="off" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="location" required>
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
                <input type="hidden" name="form_type" value="new"> <!-- Nom del camp modificat -->
            </form>
        </div>

        <div class="flex-1 mx-8"> <!-- contenidor menu game -->
            <h4 class="text-2xl font-semibold text-center text-yellow-400 dark:text-gray-400">NEW GAME</h4>
            <form name="game" action="{{ route('games.store') }}" method="POST" class="w-full mt-8">
                @csrf <!-- Token CSRF -->
                <div class="flex-col items-center">    
                    <div class="flex justify-around">
                        <div class="mb-4">
                            <select id="home_team" name="home_team_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="" disabled selected hidden>Home</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}" data-location="{{ $team->location }}">
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="mx-4">
                        vs
                        </div>
                        <div class="mb-4">
                        <select id="away_team" name="away_team_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
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
                        <label for="date" class="block text-gray-700 text-sm mb-2"></label>
                        <input type="date" id="date" name="game_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="date" required>
                    </div>
                    <div class="mb-4">
                        <input type="text" id="location" name="location" autocomplete="off" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bottom-20" placeholder="location">
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
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#home_team').change(function() {
            var selectedOption = $(this).find('option:selected');
            var location = selectedOption.data('location'); // Recollir la localització de l'opció seleccionada
            console.log(location);
            $('#location').val(location); // Actualitzar el camp de localització
        });
    });
</script>