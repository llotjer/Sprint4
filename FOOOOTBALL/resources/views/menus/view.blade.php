<div id="dropdown-content">
    <div class="flex justify-around bottom-4"> <!-- contenidor menus -->
        <div class="w-1/2 relative border-2 border-green-400 rounded-lg p-8 mx-8 max-h-96"> <!-- contenidor menu teams -->
            <h4 class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-40 bg-gray-50 px-2 text-green-400">VIEW TEAMS</h4>
            <div class="max-h-72 overflow-y-auto">

            @if(count($teams) === 0)
                <div>
                    <button type="button" class="shadow appearance-none border-2 rounded w-full px-8 h-72 text-gray-400 hover:text-yellow-400 hover:border-yellow-300 desplegable-btn" 
                    data-type="new"><strong> + </strong><br> NEW <br> TEAM </button>
                </div>
            @endif

            @foreach($teams as $team)
                <div class="mb-3">
                    <form action="{{ route('teams.getTeamById', ['id' => $team->id]) }}" method="GET">
                    <button type="submit" data-id="{{ $team->id }}" name="team" class="viewTeam shadow appearance-none border rounded w-full px-16 text-gray-400 hover:bg-green-100">
                        {{ $team->name }} <br> <strong class="text-gray-400">{{ $team->AKA }}</strong>
                    </button>
                    </form>
                </div>
            @endforeach

            </div>
        </div>

        <div class="w-1/2 relative border-2 border-green-400 rounded-lg p-8 mx-8 max-h-96"> <!-- contenidor menu games -->
            <h4 class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-44 bg-gray-50 px-2 text-green-400">VIEW GAMES</h4>
            <div class="max-h-72 overflow-y-auto">

            @if(count($games) === 0)
                <div>
                    <button type="button" class="shadow appearance-none border-2 rounded w-full px-8 h-72 text-gray-400 hover:text-yellow-400 hover:border-yellow-300 desplegable-btn" 
                    data-type="new"><strong> + </strong> <br> NEW <br> GAME </button>
                </div>
            @endif

            @foreach($games as $game)
                <div class="mb-1.5">
                    <form action="{{ route('games.getGameById', ['id' => $game->id]) }}" method="GET">
                    <button type="submit" data-id="{{ $game->id }}" name="game" class="viewGame shadow appearance-none border rounded w-full px-16 text-gray-400 hover:bg-green-100">
                    <strong class="text-gray-400">{{ $game->homeTeam->AKA }}</strong> vs <strong class="text-gray-400">{{ $game->awayTeam->AKA }}</strong>
                    <br> - {{ $game->formatted_date }}
                    </button>
                    </form>
                </div>
            @endforeach

            </div>
        </div>
    </div>

</div>
