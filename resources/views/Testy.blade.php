<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curtains</title>
</head>
<body>

    <!-- Tabel curtains bevat: name, location, percentage -->
        <!--[1] om deze aan te roepen gebruik je $curtains -->
            <!-- er zijn daarnaast verschillende functies die je kan aanroepen om verschillende data te krijgen: -->
            <!-- allSchedules (alle schedules voor die curtain) -->
            <!-- curtainLocation (de locatie van die curtain) -->


    <!-- Tabel lightsensor bevat: location, value -->
        <!--[1] om deze aan te roepen gebruik je $lightsensors -->
            <!-- er zijn daarnaast verschillende functies die je kan aanroepen om verschillende data te krijgen: -->
            <!-- lightsensorLocation (om de locatie van de lichtsensor op te halen) -->


    <!-- Tabel location bevat: name -->
        <!--[1] om deze aan te roepen gebruik je $locations -->
            <!-- er zijn daarnaast verschillende functies die je kan aanroepen om verschillende data te krijgen: -->
            <!-- allCurtains (alle curtains van die locatie) -->
            <!-- allLightSensors (de lightsensoren in de locatie) -->


    <!-- Tabel schedule bevat: id, name, time(deze werkt atm nog niet 😀 ), day, percentage -->
        <!--[1] om deze aan te roepen gebruik je $schedules -->
            <!-- er zijn daarnaast verschillende functies die je kan aanroepen om verschillende data te krijgen: -->
            <!-- scheduleCurtain (om de curtain van een schedule op te halen) -->


    <!-- ALS JE name NODIG HEBT UIT TABEL CURTAINS USE: -->
    @foreach ($curtains as $curtain)
        <p>{{$curtain->curtainLocation->name}}</p>
    @endforeach 
    <!-- hier vraag je dus van een curtain de locatie op, en van die locatie de naam. -->
    <!-- Dit geld voor elk tabel: $curtains is variable die wordt meegegeven uit controller, de [1]-->
    <!-- $curtain is een variabele die je hier in Testy.blade.php aanmaakt -->

</body>
</html>