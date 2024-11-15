<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%; 
            margin: 0; /* Evitem l'scroll */
            overflow: hidden;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        #main-title {
            transition: transform 0.5s ease-in-out;
            transform: translateY(0); /* Assegura que comenci centrat */
        }
        #main-title.move-up {
            transform: translateY(-300px); /* Ajusta aquest valor segons necessitats */
        }
        #global-dropdown {
            transition: opacity 0.5s ease-in-out, height 0.5s ease-in-out, top 0.5s ease-in-out;
            opacity: 0;
            pointer-events: none;
            height: 0;
            position: absolute;
            left: 50%; /* Centra el desplegable */
            top: calc(50% + 40px); /* Just sota el títol inicialment */
            transform: translateX(-50%); /* Centra el desplegable horitzontalment */
            width: 80%; /* Ajusta aquest valor segons necessitats */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 30%, rgba(255, 255, 255, 0) 100%);
            z-index: -1;
        }
        #global-dropdown.show {
            opacity: 1;
            pointer-events: auto;
            top: calc(50% - 260px); /* Ajusta aquest valor segons necessitats */
            height: calc(50% + 200px); /* Ajusta aquest valor segons necessitats */
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            background: linear-gradient(to top, white 0%, white 70%, #F0F0F0 100%);
            transition: opacity 0.5s ease-in-out, height 0.5s ease-in-out, top 0.5s ease-in-out, background 0.5s ease-in-out; /* Aquí s'afegeix la transició de color de fons */
            z-index: 10; /* Assegura que el desplegable es mostri per sobre */
        }
        .hover-scale-big:hover {
        transform: scale(3); /* Escala el botó 3 vegades més gran */
        }
    </style>
</head>
<body class="flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-800">
    <main class="container text-2xl font-semibold text-center text-gray-500 dark:text-gray-400">

        <div id="content" class="flex flex-wrap justify-center w-full mt-18 transition-transform duration-200">
            <div id="hover-text" style="position: absolute; top: -10px; font-size: 20px; text-align: center; display: none;"></div>
                <h1 id="main-title" class="flex items-center scale-150 leading-relaxed transition-transform duration-200 mx-8">
                    <span class="mr-2">F</span>
                    <div class="relative mx-4">
                        <button type="button" class="w-4 h-4 bg-yellow-400 rounded-full transform hover:scale-150 transition-transform duration-200 outline-none 
                        desplegable-btn" data-name="new" data-type="new"></button>
                    </div>
                    <div class="relative mx-4">
                        <button type="button" class="w-4 h-4 bg-green-400 rounded-full transform hover:scale-150 transition-transform duration-200 outline-none 
                        desplegable-btn" data-name="view" data-type="view"></button>
                    </div>
                    TBALL
                </h1>
        </div>

        <div id="global-dropdown" class="flex justify-around items-center dark:bg-gray-700 text-gray-400 dark:text-gray-200 rounded-lg shadow-md p-4">
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const dropdown = document.getElementById('global-dropdown');
        const mainTitle = document.getElementById('main-title');
        const content = document.getElementById('content');
        const hoverText = document.getElementById('hover-text');
        const fetchMenuUrl = "{{ route('fetch.menu') }}";

        let isDropdownHovered = false;

        // Configuració global d'AJAX per incloure el CSRF Token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Utilitzant event delegation per a botons dinàmics (si afegeixes més botons dinàmics més tard)
        $(document).on('mouseenter', '.desplegable-btn', function(event) {
            const name = $(this).data('name');
            const buttonColor = window.getComputedStyle(this).backgroundColor;

            // Actualitzem el text al costat del títol principal
            hoverText.textContent = `${name}`.toUpperCase();
            hoverText.style.display = 'block';
            hoverText.style.color = buttonColor; // Aplica el color del botó
            hoverText.style.top = `${mainTitle.getBoundingClientRect().top - 30}px`; // Just a sobre de `main-title`
            hoverText.style.left = '50%';
            hoverText.style.transform = 'translateX(-50%)';
        });

        // Ocultem el text en fer `mouseleave`
        $(document).on('mouseleave', '.desplegable-btn', function() {
            hoverText.style.display = 'none';
        });

        // Event per al click dels botons per carregar el contingut del menú via AJAX
        $(document).on('click', '.desplegable-btn', function(event) {
            const type = $(this).data('type');
            console.log('Tipus seleccionat:', type); // Afegeix un log per verificar el valor

            if (!type) {
                console.error('data-type no està definit per aquest botó');
                return; // Evita enviar la petició si no hi ha tipus
            }

            // Neteja el contingut anterior del desplegable
            dropdown.innerHTML = '';

            console.log('Enviament de la petició AJAX:', { type: type });

            // Petició AJAX per carregar el menú corresponent
            $.ajax({
                url: fetchMenuUrl, // Ruta definida a Laravel
                type: 'GET',
                data: { type: type }, // Passa el tipus d'acció al backend
                success: function(response) {
                    console.log('Resposta completa:', response);
                    dropdown.innerHTML = response.html; // Actualitza el contingut del desplegable
                    dropdown.classList.add('show'); // Mostra el desplegable
                    mainTitle.classList.add('move-up'); // Mou cap amunt el títol
                },
                error: function(xhr, status, error) {
                    dropdown.innerHTML = '<p style="color:red;">Error carregant el contingut.</p>';
                    console.error('Error en la sol·licitud AJAX:', error);
                    console.log('Detalls de l\'error:', xhr.responseText); // Mostra el missatge complet
                }
            });
        });

        
        $(document).on('submit', '#newTeam, #newGame, #updateTeam, #updateGame, #deleteTeam, #deleteGame', function(e) {
            e.preventDefault();
            // Petició AJAX per a creació de nous equips i partits
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response.html);
                    // Injecta la resposta al contenidor desplegable
                    $('#dropdown-content').html(response.html);
                },
                error: function(xhr) {
                    alert('Hi ha hagut un error al realitzar l\'acció.');
                }
            });
        });

        // Petició AJAX per altres enllaços d'equips i partits
        $(document).on('click', '.viewTeam, .viewTeamUpdate, .viewTeamDelete, .viewGame, .viewGameUpdate, .viewGameDelete', function (e) { 
            e.preventDefault();

            console.log('Botó clicat');

            const id = $(this).data('id');

            console.log('ID capturat:', id);

            let url;
            if ($(this).hasClass('viewTeam')) { // Rutes per al TeamController
                url = `/team/${id}`; 
            } else if ($(this).hasClass('viewTeamUpdate')) {
                url = `/viewUpdateTeam/${id}`; 
            } else if ($(this).hasClass('viewTeamDelete')) {
                url = `/viewDeleteTeam/${id}`;

            } else if ($(this).hasClass('viewGame')) { // Rutes per al GameController
                url = `/game/${id}`; 
            } else if ($(this).hasClass('viewGameUpdate')) {
                url = `/viewUpdateGame/${id}`;
            } else if ($(this).hasClass('viewGameDelete')) {
                url = `/viewDeleteGame/${id}`;
            }

            $.ajax({
                url: url, // Ruta cap al controlador corresponent
                type: 'GET',
                success: function(response) {
                    //console.log(response.html);
                    $('#dropdown-content').html(response.html); // Actualitza el contingut amb la resposta
                },
                error: function() {
                    $('#dropdown-content').html('<p style="color:red;">Error en carregar la informació.</p>');
                }
            });
        });

        // Funcions per gestionar l'estat de hover
        const handleMouseEnter = () => {
            isDropdownHovered = true;
        };

        document.addEventListener('click', function(event) {
            const isClickInside = dropdown.contains(event.target) || mainTitle.contains(event.target);
            
            if (!isClickInside) {
                dropdown.classList.remove('show');
                mainTitle.classList.remove('move-up');
                console.log("S'ha tancat el desplegable perquè s'ha clicat fora.");
            }
        });

        // Afegeix `mouseenter` i `mouseleave` als elements
        dropdown.addEventListener('mouseenter', handleMouseEnter);
        mainTitle.addEventListener('mouseenter', handleMouseEnter);
        content.addEventListener('mouseenter', handleMouseEnter);

        // Opcionalment, netejar el sessionStorage al sortir de la pàgina o refrescar
        window.addEventListener('beforeunload', () => {
            sessionStorage.removeItem('type');
        });
    </script>


</body>
</html>