<div id="dropdown-content">

    <div class="flex flex-col items-center relative border-2 border-red-400 rounded-lg p-8 mx-8 max-h-64 bottom-4">
    <h4 class="absolute -top-4 w-52 bg-gray-100 text-red-400">CONFIRM DELETE</h4>

        <div class="mb-4">
            <span class="w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline">
            <strong class="text-gray-400">Home Team :</strong> {{ $game->homeTeam->name }} - {{ $game->homeTeam->AKA}}
            </span>
        </div>
        <div class="mb-4">
            <span class="w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline">
            <strong class="text-gray-400">Away Team :</strong> {{ $game->awayTeam->name }} - {{ $game->awayTeam->AKA}}
            </span>
        </div>
        <div class="mb-4">
            <span class="w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline">
            <strong class="text-gray-400">Date :</strong> {{ $game->game_date }}
            </span>
        </div>
        <div class="mb-12">
            <span class="w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline">
            <strong class="text-gray-400">Location :</strong> {{ $game->homeTeam->location }}
            </span>
        </div>
        <div class="flex flex-col justify-around">
            <div class="flex items-center justify-center mx-4 my-8">
                <form id="deleteGame" action="{{ route('games.delete', ['id' => $game->id]) }}" method="POST">
                @csrf
                
                <button type="submit" data-name="Delete" 
                        class="flex items-center justify-center w-4 h-4 bg-red-400 text-white rounded-full transition-all duration-300 ease-in-out 
                                outline-none transform hover-scale-big overflow-hidden relative">
                    <svg class="absolute inset-0 flex items-center justify-center font-bold opacity-0 hover:opacity-100 transform transition-transform hover:rotate-180 
                                duration-500" 
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" 
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                </button>
                </form>
            </div>
        </div>

    </div>

    <div class="flex items-center justify-center mt-24">
        <button type="button" data-name="view" data-type="view" class="flex items-center justify-center w-10 h-10 bg-gray-400 text-white 
                                    rounded-full transition-all duration-300 ease-in-out outline-none transform hover:scale-125 
                                    transition-transform duration-200 desplegable-btn">
            <svg class="w-6 h-6" 
                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" 
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
            </svg>
        </button>
    </div>
</div>