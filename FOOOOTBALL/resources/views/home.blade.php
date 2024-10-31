<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>
<body class="flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-800">
    <main class="container text-2xl font-semibold text-center text-gray-500 dark:text-gray-400">

        <div id="content" class="flex flex-wrap justify-center w-full mt-18 transition-transform duration-200">
            <div id="hover-text" style="position: absolute; top: -10px; font-size: 20px; text-align: center; display: none;"></div>
                <h1 id="main-title" class="flex items-center scale-150 leading-relaxed transition-transform duration-200 mx-8">
                    <span class="mr-2">F</span>
                    <div class="relative mx-4">
                        <button type="button" class="w-4 h-4 bg-yellow-400 rounded-full transform hover:scale-150 transition-transform duration-200 outline-none desplegable-btn" 
                        data-type="new"></button>
                    </div>
                    <div class="relative mx-4">
                        <button type="button" class="w-4 h-4 bg-green-400 rounded-full transform hover:scale-150 transition-transform duration-200 outline-none desplegable-btn" 
                        data-type="view"></button>
                    </div>
                    <div class="relative mx-3">
                        <button type="button" class="w-4 h-4 bg-blue-400 rounded-full transform hover:scale-150 transition-transform duration-200 outline-none desplegable-btn" 
                        data-type="update"></button>
                    </div>
                    <div class="relative mx-4">
                        <button type="button" class="w-4 h-4 bg-red-400 rounded-full transform hover:scale-150 transition-transform duration-200 outline-none desplegable-btn" 
                        data-type="delete"></button>
                    </div>
                    TBALL
                </h1>
        </div>

        <div id="global-dropdown" class="flex justify-around items-center dark:bg-gray-700 text-gray-400 dark:text-gray-200 rounded-lg shadow-md p-4">
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Assegura't que jQuery està carregat -->
    <script>
        const dropdown = document.getElementById('global-dropdown');
        const buttons = document.querySelectorAll('.desplegable-btn');
        const mainTitle = document.getElementById('main-title');
        const content = document.getElementById('content');
        const hoverText = document.getElementById('hover-text');
        const fetchMenuUrl = "{{ route('fetch_menu') }}";

        let isDropdownHovered = false; // Variable per controlar l'estat de hover

        buttons.forEach(button => {

            button.addEventListener('mouseenter', (event) => {

                const type = event.target.getAttribute('data-type');
                const buttonColor = window.getComputedStyle(event.target).backgroundColor;

                // Actualitza el text i mostra'l a prop de `#main-title`
                hoverText.textContent = `${type}`.toUpperCase();
                hoverText.style.display = 'block';
                hoverText.style.color = buttonColor; // Aplica el color del botó
                hoverText.style.top = `${mainTitle.getBoundingClientRect().top - 30}px`; // Just a sobre de `main-title`
                hoverText.style.left = '50%';
                hoverText.style.transform = 'translateX(-50%)';
            });

            // Oculta el text en fer `mouseleave`
            button.addEventListener('mouseleave', () => {
                hoverText.style.display = 'none';
            });

            button.addEventListener('click', (event) => {
                const type = event.target.getAttribute('data-type');

                // Neteja el contingut anterior del desplegable
                dropdown.innerHTML = '';

                console.log('Enviament de la petició AJAX:', { type: type });

                // Petició AJAX per carregar el menú corresponent
                $.ajax({
                    url: '/fetch-menu', // Ruta definida a Laravel
                    type: 'GET',
                    data: { type: type }, // Passa el tipus d'acció al backend
                    success: function(response) {
                        if (response && response.html) { // Comprova si la resposta té l'atribut 'html'
                            dropdown.innerHTML = response.html; // Actualitza el contingut del desplegable
                            dropdown.classList.add('show'); // Mostra el desplegable
                            mainTitle.classList.add('move-up'); // Mou cap amunt el títol
                            console.log(response);
                        } else {
                            console.log(type);
                            console.error('No hi ha contingut HTML a la resposta.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la sol·licitud AJAX:', error);
                    }
                });
            });
        });

        // Funcions per gestionar l'estat de hover
        const handleMouseEnter = () => {
            isDropdownHovered = true;
        };

        const handleMouseLeave = () => {
            isDropdownHovered = false;
            // Retard per assegurar-se que el ratolí no ha entrat en un altre element abans de tancar
            setTimeout(() => {
                if (!isDropdownHovered) {
                    dropdown.classList.remove('show');
                    mainTitle.classList.remove('move-up');
                    console.log("S'ha tancat el desplegable perquè el ratolí ha sortit.");
                }
            }, 100);
        };

        // Afegeix `mouseenter` i `mouseleave` als elements
        dropdown.addEventListener('mouseenter', handleMouseEnter);
        dropdown.addEventListener('mouseleave', handleMouseLeave);
        mainTitle.addEventListener('mouseenter', handleMouseEnter);
        mainTitle.addEventListener('mouseleave', handleMouseLeave);
        content.addEventListener('mouseenter', handleMouseEnter);
        content.addEventListener('mouseleave', handleMouseLeave);

        // Opcionalment, netejar el sessionStorage al sortir de la pàgina o refrescar
        window.addEventListener('beforeunload', () => {
            sessionStorage.removeItem('type');
        });
    </script>


</body>
</html>