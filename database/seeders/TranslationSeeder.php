<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationSeeder extends Seeder
{
    public function run()
    {
        DB::table('translations')->insert([
            'tagName' => 'flag',
            'es'      => 'https://flagcdn.com/h40/uy.png',
            'en'      => 'https://flagcdn.com/h20/gb.png',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'splashScreenTextSup',
            'es'      => 'Arma tu tour',
            'en'      => 'Build your tour',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'splashScreenTextInf',
            'es'      => 'o descubri los del momento',
            'en'      => 'or discover the ones of the moment',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'wellcomeMessage',
            'es'      => 'Bienvenido/a',
            'en'      => 'Welcome',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'wellcomeMessageUser',
            'es'      => 'Invitado',
            'en'      => 'Guest',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'searchPlaceholder',
            'es'      => 'Buscá tu proximo destino',
            'en'      => 'Find your next destiny',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'lenguageFlagLabel',
            'es'      => 'Lenguaje',
            'en'      => 'Lenguage',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'registerLabel',
            'es'      => 'Registrarse',
            'en'      => 'Register',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'loginLabel',
            'es'      => 'Iniciar Sesion',
            'en'      => 'Login',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'changeLanguageLabel',
            'es'      => 'Cambiar Idioma',
            'en'      => 'Change Lenguage',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'predefinedToursLabel',
            'es'      => 'Tours Predefinidos',
            'en'      => 'Predefined Tours',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'buildMyTourLabel',
            'es'      => 'Armar Mi Tour',
            'en'      => 'Build My Tour',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'lodginLabel',
            'es'      => 'Alojamiento',
            'en'      => 'Lodgin',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'gastronomylabel',
            'es'      => 'Gastronomia',
            'en'      => 'Gastronomy',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'outingLabel',
            'es'      => 'Paseos',
            'en'      => 'Outing',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'transportLabel',
            'es'      => 'Transporte',
            'en'      => 'Transport',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'loginTitle',
            'es'      => 'Ingresar',
            'en'      => 'Login',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'needAnAccountText',
            'es'      => 'Necesitas una cuenta?',
            'en'      => 'Do you need an account?',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'closeButtonValue',
            'es'      => 'Cerrar',
            'en'      => 'Close',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'registerTitle',
            'es'      => 'Registrarse',
            'en'      => 'Register',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'registerEmailPlaceholder',
            'es'      => 'Correo electronico',
            'en'      => 'Email',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'registerPasswordConfirmationPlaceholder',
            'es'      => 'Confirmacion de Password',
            'en'      => 'Password Confirmation',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'registerNamePlaceholder',
            'es'      => 'Nombre',
            'en'      => 'Name',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'registerButtonValue',
            'es'      => 'Registro',
            'en'      => 'Register',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'backTologinText',
            'es'      => 'Volver al login',
            'en'      => 'Back to login',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'userNationalityText',
            'es'      => 'Nacionalidad',
            'en'      => 'Nationalty',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'userDateOfBirthText',
            'es'      => 'Fecha de nacimiento',
            'en'      => 'Date of Birth',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'myPreferencesTitle',
            'es'      => 'Mis Preferencias',
            'en'      => 'My Preferences',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'whithoutPreferencesText',
            'es'      => 'Sin preferencias registradas',
            'en'      => 'Whithout Preferences',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'changePreferencesButtonValue',
            'es'      => 'Cambiar Preferencias',
            'en'      => 'Change Preferences',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'enterPreferencesButtonValue',
            'es'      => 'Ingresar Preferencias',
            'en'      => 'Enter Preferences',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesTitleCreateProfile',
            'es'      => 'Crear Perfil',
            'en'      => 'Create Profile',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesTitleUpdateProfile',
            'es'      => 'Actualizar Perfil',
            'en'      => 'Update Profile',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesLodginLabel',
            'es'      => 'Alojamiento',
            'en'      => 'Lodgin',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesGastronomyLabel',
            'es'      => 'Gastronomia',
            'en'      => 'Gastronomy',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesShowsLabel',
            'es'      => 'Espectaculos',
            'en'      => 'Shows',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesOutdoorActivitiesLabel',
            'es'      => 'Paseos',
            'en'      => 'Outdoor Activities',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesNightActivitiesLabel',
            'es'      => 'Actividades Nocturnas',
            'en'      => 'Night Activities',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesTransportLabellabel',
            'es'      => 'Transporte',
            'en'      => 'Transport',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesChildrensActivitiesLabel',
            'es'      => 'Actividades Infantiles',
            'en'      => 'Childrens Activities',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesEssentialsServicesLabel',
            'es'      => 'Servicios Esenciales',
            'en'      => 'Essentials Services',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'prefrencesbtnSendValue',
            'es'      => 'Enviar',
            'en'      => 'Send',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesBackText',
            'es'      => 'Volver Atras',
            'en'      => 'Back',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'contactText',
            'es'      => 'Contactanos',
            'en'      => 'Contact Us.',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'showsLabel',
            'es'      => 'Espectaculos',
            'en'      => 'Shows',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'nightActivitiesLabel',
            'es'      => 'Actividades Nocturnas',
            'en'      => 'Evening activities',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'esentialsServicesLabel',
            'es'      => 'Servicios Esenciales',
            'en'      => 'Essential Services',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'childActivities',
            'es'      => 'Actividades Infantiles',
            'en'      => 'Children´s activities',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'category',
            'es'      => 'Categoria',
            'en'      => 'Category',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'registerPasswordPlaceholder',
            'es'      => 'Contraseña',
            'en'      => 'Password',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'userProfileLabel',
            'es'      => 'Perfil de Usuario',
            'en'      => 'User profile',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'logoutLabel',
            'es'      => 'Cerrar sesion',
            'en'      => 'Logout',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'emailPlaceholder',
            'es'      => 'Correo Electronico',
            'en'      => 'Email',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'passwordPlaceholder',
            'es'      => 'Contraseña',
            'en'      => 'Password',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'loginLabel',
            'es'      => 'Iniciar Sesion',
            'en'      => 'Login',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'emailUpdateTitle',
            'es'      => 'Actualizar email',
            'en'      => 'Email update',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'updateLabel',
            'es'      => 'Actualizar',
            'en'      => 'Update',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'backToUserProfile',
            'es'      => 'Volver a Perfil de Usuario',
            'en'      => 'Back to user profile',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'nameUpdateTitle',
            'es'      => 'Actualizar nombre',
            'en'      => 'Name update',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'passwordUpdateTitle',
            'es'      => 'Actualizar contraseña',
            'en'      => 'Password update',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'changePassword',
            'es'      => 'Cambiar Contraseña',
            'en'      => 'Change password',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'changename',
            'es'      => 'Cambiar Nombre',
            'en'      => 'Change name',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'changeEmail',
            'es'      => 'Cambiar email',
            'en'      => 'Change email',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'seeMoreCategories',
            'es'      => 'Ver mas Categorias',
            'en'      => 'See more categories',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'seeLessCategories',
            'es'      => 'Ver menos Categorias',
            'en'      => 'See less categories',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'noResults',
            'es'      => 'Sin resultados esta busqueda',
            'en'      => 'No results for this search',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'resultsFor',
            'es'      => 'resultados para',
            'en'      => 'results for',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'serachBtn',
            'es'      => 'Buscar',
            'en'      => 'Search',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'Slider1Title',
            'es'      => 'Descubre Uruguay',
            'en'      => 'Meet Uruguay',
        ]);
        DB::table('translations')->insert([
            'tagName' => 'Slider1Description',
            'es'      => 'Destino populares que eligieron nuestros usuarios',
            'en'      => 'Popular destinations chosen by our users',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'Slider2Title',
            'es'      => 'Next Events in ',
            'en'      => 'Proximos Eventos en  ',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'Slider2Description',
            'es'      => 'Conoce los mejores eventos de ',
            'en'      => 'Know the main events in ',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'Slider3Title',
            'es'      => 'Conoce nuestros tours',
            'en'      => 'Know our tours',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'Slider3Description',
            'es'      => 'Conoce los principales tours que tenemos preparados para ti',
            'en'      => 'Get to know the main tours we have prepared for you',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'loginWhithGoole',
            'es'      => 'Ingresar con Google',
            'en'      => 'Login whith Google',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'placeCity',
            'es'      => 'Ciudad',
            'en'      => 'City',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'placeState',
            'es'      => 'Departamento',
            'en'      => 'State',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'placeAddress',
            'es'      => 'Dirección',
            'en'      => 'Address',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'placeDescription',
            'es'      => 'Descripción',
            'en'      => 'Description',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'placeOpeningTime',
            'es'      => 'Hora de apertura',
            'en'      => 'Opening time',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'placeClosingTime',
            'es'      => 'Hora de cierre',
            'en'      => 'Closing time',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'placeMoreInformation',
            'es'      => 'Más información',
            'en'      => 'More information',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'localizationNotSupported',
            'es'      => 'Localizacion no admitida por el usuario',
            'en'      => 'Localization not supported by user',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'reloadApplication',
            'es'      => 'Recargue la aplicacion para volver a activarla',
            'en'      => 'Reload the application to reactivate it.',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'buildTour',
            'es'      => 'Armar tour',
            'en'      => 'Build tour',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'predefinedTour',
            'es'      => 'En esta seccion ud podra ver los tours que tenemos para ofrecerle.',
            'en'      => 'In this section you will be able to see the tours we have to offer.',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'predefinedPlaces',
            'es'      => 'Tenemos estos lugares para que visites',
            'en'      => 'We have these places for you to visit',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'tourName',
            'es'      => 'Elija un nombre para su tour',
            'en'      => 'Choose a name for your tour',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'welcomeTo',
            'es'      => 'Bienvenido/a a',
            'en'      => 'Welcome to',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'yourOwnTours',
            'es'      => 'En esta sección usted podrá crear sus propios tours.',
            'en'      => 'In this section you will be able to create your own tours.',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'createTour',
            'es'      => 'Crear tour',
            'en'      => 'Create tour',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'seeMyTours',
            'es'      => 'Ver mis tours',
            'en'      => 'See my tours',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'previouslyTours',
            'es'      => 'En esta sección usted podrá ver los tours que creo anteriormente.',
            'en'      => 'In this section you will be able to see the tours I created previously.',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'beginsAt',
            'es'      => 'Inicia a las',
            'en'      => 'Begins at',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'choosePreferences',
            'es'      => 'Elija preferencias para que le podamos sugerir lugares para armar su tour.',
            'en'      => 'Choose your preferences so we can suggest places to build your tour.',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'startTime',
            'es'      => 'Hora de comienzo',
            'en'      => 'Start time',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'chooseTime',
            'es'      => 'Elija un hora',
            'en'      => 'Choose a time',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'places',
            'es'      => 'Lugares',
            'en'      => 'Places',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'enclosedSpace',
            'es'      => 'Espacio cerrado',
            'en'      => 'Enclosed space',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'outdoor',
            'es'      => 'Al Aire libre',
            'en'      => 'Outdoor',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'both',
            'es'      => 'Ambos',
            'en'      => 'Both',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'ageRestrictions',
            'es'      => 'Restriciones de edad',
            'en'      => 'Age restrictions',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'allAges',
            'es'      => 'Todas las edades',
            'en'      => 'All ages',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'over18Years',
            'es'      => 'Mayores de 18',
            'en'      => 'Over 18 years of age',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'numberPeople',
            'es'      => 'Cantidad de personas',
            'en'      => 'Number of people',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'group',
            'es'      => 'Grupo',
            'en'      => 'Group',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'family',
            'es'      => 'Familia',
            'en'      => 'Family',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'couple',
            'es'      => 'Pareja',
            'en'      => 'Couple',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'only',
            'es'      => 'Solo',
            'en'      => 'Only',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'location',
            'es'      => 'Ubicacion',
            'en'      => 'Location',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'chooseDestination',
            'es'      => 'Elija destino',
            'en'      => 'Choose destination',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'preferencesForTour',
            'es'      => 'Preferencias para el Tour',
            'en'      => 'Preferences for the Tour',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'youtTourWillBeginAt',
            'es'      => 'Su tour comenzara a las',
            'en'      => 'Your tour will begin at',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'inEnclosed',
            'es'      => 'En espacios cerrados y/o techados',
            'en'      => 'In enclosed and/or roofed spaces',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'outdoorSpaces',
            'es'      => 'En espacios al aire libre',
            'en'      => 'In outdoor spaces',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'indoorsOutdoors',
            'es'      => 'En espacios cerrados y al aire libre',
            'en'      => 'Indoors and outdoors',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'forAllAges',
            'es'      => 'Para todas las edades',
            'en'      => 'For all ages',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'only18YearsOld',
            'es'      => 'Solo para mayores de 18 años',
            'en'      => 'Only for people over 18 years old',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'toGoinGroup',
            'es'      => 'Para ir en grupo',
            'en'      => 'To go in group',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'toAttendWithFamily',
            'es'      => 'Para concurrir en familia',
            'en'      => 'To attend with the family',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'toAttendWithPartner',
            'es'      => 'Para concurrir con su pareja',
            'en'      => 'To attend with your partner',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'thatPossibleAttendAlone',
            'es'      => 'Que se puede concurrir solo/a',
            'en'      => 'That it is possible to attend alone',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'locatedIn',
            'es'      => 'Y ubicados en',
            'en'      => 'And located in',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'goBackThePreviousStep',
            'es'      => 'Puede volver al paso anterior y cambiar alguna o todas las preferencias elegidas',
            'en'      => 'You can go back to the previous step and change any or all of the chosen preferences preferences you have chosen',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'dragPointsInterest',
            'es'      => 'Arrastre sus puntos de interes hacia la linea de tiempo para comenzar a armar su tour.',
            'en'      => 'Drag your points of interest onto the timeline to start building your tour. to start building your tour.',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'tourInfo',
            'es'      => 'Info Tour',
            'en'      => 'Tour Info',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'pointsInterest',
            'es'      => 'Puntos de Interes',
            'en'      => 'Points of Interest',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'predefinedTourTitle',
            'es'      => 'Tours Predefinidos',
            'en'      => 'Predefined Tours',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'weAreSorryModal',
            'es'      => 'Lo sentimos!',
            'en'      => 'We are sorry!',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'sorryExplanationModal',
            'es'      => 'Para poder armar su tour debe estar logueado',
            'en'      => 'To be able to set up your tour you must be logged in',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'loginBtnModal',
            'es'      => 'iniciar sesion',
            'en'      => 'Login',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'closeBtnModal',
            'es'      => 'Cerrar',
            'en'      => 'Close',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'stepPreferences',
            'es'      => 'Preferencias',
            'en'      => 'Preferences',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'stepSeePreferences',
            'es'      => 'Ver Preferencias',
            'en'      => 'See Preferences',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'stepChoose',
            'es'      => 'Elegir',
            'en'      => 'Choose',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'stepSeeTour',
            'es'      => 'Ver Tour',
            'en'      => 'See Tour',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'stepEnd',
            'es'      => 'Fin',
            'en'      => 'End',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'stepBtnNext',
            'es'      => 'Siguiente',
            'en'      => 'Next',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'stepBtnPrev',
            'es'      => 'Previo',
            'en'      => 'Previous',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'thisIsYourTour',
            'es'      => 'Asi quedo su tour, debe guradarlo para consultarlo cuando desee',
            'en'      => 'This is how your tour turned out, you should save it to refer to it whenever you wish.',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'succesModal',
            'es'      => 'Exelente!',
            'en'      => 'Succesful!',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'succesExplanationModal',
            'es'      => 'Su tour se creo correctamente',
            'en'      => 'Your tour was created successfully',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'seeToursBtnModal',
            'es'      => 'Ver sus tours',
            'en'      => 'See your tours',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'closeBtnSuccesModal',
            'es'      => 'Cerrar',
            'en'      => 'Close',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'atentionModal',
            'es'      => 'Atencion!',
            'en'      => 'Atention!',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'atentionExplanationModal',
            'es'      => 'Complete todos los campos para continuar',
            'en'      => 'Complete all fields to continue',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'atentionOkBtnModal',
            'es'      => 'Entendido',
            'en'      => 'Ok',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'atentionChooseExplanationModal',
            'es'      => 'Elija algun punto de interes para continuar',
            'en'      => 'Choose some point of interest to continue',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'atentionSaveTourExplanationModal',
            'es'      => 'El tour debe llevar un nombre para poder guardarlo',
            'en'      => 'The tour must have a name to be able to save it',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'saveTourBtn',
            'es'      => 'Guardar',
            'en'      => 'Save',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'filterBtn',
            'es'      => 'Filtrar',
            'en'      => 'Filter',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'distanceLbel',
            'es'      => 'Distancia',
            'en'      => 'Distance',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'hotelEspec',
            'es'      => 'Especificaciones del Hotel',
            'en'      => 'Hotel Specifications',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'rooms',
            'es'      => 'Habitaciones',
            'en'      => 'Rooms',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'ratings',
            'es'      => 'Calificaciones',
            'en'      => 'Ratings',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'privateBathroom',
            'es'      => 'Baño privado',
            'en'      => 'Private bathroom',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'restaurant',
            'es'      => 'Restaurante',
            'en'      => 'Restaurant',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'breakfast',
            'es'      => 'Desayuno',
            'en'      => 'Breakfast',
        ]);
        DB::table('translations')->insert([
            'tagName' => 'pet',
            'es'      => 'Mascota',
            'en'      => 'Pet Friendly',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'cableTv',
            'es'      => 'Tv Cable',
            'en'      => 'Cable TV',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'swimmingPool',
            'es'      => 'Piscina',
            'en'      => 'Swimming pool',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'airConditioner',
            'es'      => 'Aire Acondicionado',
            'en'      => 'Air conditioner',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'restaurantEspec',
            'es'      => 'Especificaciones del restaurante',
            'en'      => 'Restaurant Specifications',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'especiality',
            'es'      => 'Especialidad',
            'en'      => 'Especiality',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'veggieFood',
            'es'      => 'Comida Vegge',
            'en'      => 'Veggie food',
        ]);
        
        DB::table('translations')->insert([
            'tagName' => 'childrenMenu',
            'es'      => 'Menu infantil',
            'en'      => 'Children menu',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'yes',
            'es'      => 'Si',
            'en'      => 'Yes',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'notifications',
            'es'      => 'Notificaciones',
            'en'      => 'Notifications',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'new',
            'es'      => 'Nuevas',
            'en'      => 'New',
        ]);

        DB::table('translations')->insert([
            'tagName' => 'favourites',
            'es'      => 'Favoritos',
            'en'      => 'Favourites',
        ]);
    }
}