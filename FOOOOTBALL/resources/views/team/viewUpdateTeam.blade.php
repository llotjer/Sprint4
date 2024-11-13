<div id="dropdown-content">

    <div class="relative border-2 border-blue-400 rounded-lg p-8 mx-8 max-h-96 bottom-4">
    <h4 class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-62 bg-gray-100 px-2 text-blue-400">UPDATE TEAM</h4>
        <form id="updateTeam" action="{{ route('teams.update', ['id' => $team->id]) }}" method="POST" class="w-full mt-8">
            @csrf
            
            <div class="grid grid-cols-2 gap-4">
                <label class="flex items-center justify-end text-gray-400">Home:</label>
                <input type="text" name="name" maxlength="25" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight 
                            focus:outline-none focus:shadow-outline" 
                    value="{{ $team->name }}" required>
                
                <label class="flex items-center justify-end text-gray-400">AKA:</label>
                <input type="text" name="AKA" maxlength="3" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight 
                            focus:outline-none focus:shadow-outline" 
                    value="{{ $team->AKA }}" required>
                
                <label class="flex items-center justify-end text-gray-400">Type:</label>
                <select id="type" name="type" 
                        class="shadow border rounded w-full py-2 px-3 text-gray-600 leading-tight 
                            focus:outline-none focus:shadow-outline" required>
                    <option value="" disabled selected hidden>{{ $team->type }}</option>
                    <option value="school">School</option>
                    <option value="club">Club</option>
                </select>
                
                <label class="flex items-center justify-end text-gray-400">Location:</label>
                <input type="text" id="location_team" name="location" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600 leading-tight 
                            focus:outline-none focus:shadow-outline" 
                    value="{{ $team->location }}" required>
            </div>
        </form>
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------------------------Botó d'actualització -->
        <div class="flex items-center justify-center mx-4 my-8">
                <button form="updateTeam" type="submit" data-name="Confirm Update" 
                        class="flex items-center justify-center w-4 h-4 bg-blue-400 text-white 
                            rounded-full transition-all duration-300 ease-in-out outline-none transform hover-scale-big 
                            overflow-hidden relative">
                    <svg class="absolute inset-0 flex items-center justify-center font-bold opacity-0 hover:opacity-100 transform transition-transform 
                                hover:rotate-180 duration-500" 
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" 
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                </button>
        </div>
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------------------------------Botó de retorn -->
    <div class="flex items-center justify-center">
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