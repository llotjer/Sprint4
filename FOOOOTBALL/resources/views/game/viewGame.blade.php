<div id="dropdown-content">

    <div class="flex flex-col items-center relative border-2 border-gray-400 rounded-lg p-8 mx-8 max-h-72 bottom-4">

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
        <div class="flex justify-around py-3 z-10">
            <div class="relative mx-4">
                <button type="button" data-name="Update" data-id="{{ $game->id }}" class="viewGameUpdate w-4 h-4 bg-blue-400 rounded-full transform hover:scale-150 
                                                                        transition-transform duration-200 outline-none"></button>
            </div>
            <div class="relative mx-4">
                <button type="button" data-name="Delete" data-id="{{ $game->id }}" class="viewGameDelete w-4 h-4 bg-red-400 rounded-full transform hover:scale-150 
                                                                        transition-transform duration-200 outline-none"></button>
            </div>
        </div>
        <div class="absolute flex top-64 left-30 bg-white w-24 h-14 mx-2"></div>

    </div>

    <div class="flex items-center justify-center mt-20">
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