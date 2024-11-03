<div id="dropdown-content">
    <div class="flex justify-around bottom-4"> <!-- contenidor menus -->
        <div class="flex-1 mx-8"> <!-- contenidor menu team -->
            <h4 class="text-2xl font-semibold text-center text-green-400 dark:text-gray-400 mb-8">VIEW TEAMS</h4>
            
            @foreach($teams as $team)
                <div class="mb-4">
                    <input type="text" name="team" value="{{ $team->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                </div>
            @endforeach

        </div>

        <div class="flex-1 mx-8"> <!-- contenidor menu match -->
            <h4 class="text-2xl font-semibold text-center text-green-400 dark:text-gray-400 mb-8">VIEW GAMES</h4>
            
            @foreach($games as $game)
                <div class="mb-4">
                    <input type="text" name="game" value="{{ $game->homeTeam->AKA }} vs {{ $game->awayTeam->AKA }} - {{ $game->game_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                </div>
            @endforeach

        </div>
    </div>
</div>