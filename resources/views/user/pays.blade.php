@extends('layouts.default')
@section('content')

    <style>#map-canvas { height: 500px; margin: 0; padding: 0;}</style>
    <script>

        var arr = {!! $places !!};

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min)) + min;
        }

        function CurrentPlaceControl(controlDiv, map, currentPlace) {

          var controlUI = document.createElement('div');
          controlUI.id = 'current-place-button';
          controlUI.className = 'btn-map';
          controlUI.innerHTML = 'Ma location';
          controlDiv.appendChild(controlUI);

          google.maps.event.addDomListener(controlUI, 'click', function() {
            map.setCenter(currentPlace.position);
            currentPlace.setAnimation(google.maps.Animation.BOUNCE);

          });
        }

        function initialize() {
            var centered = arr[getRandomInt(0, arr.length)];

            var mapOptions = {
                zoom: 5,
                minZoom: 3,
                center: new google.maps.LatLng(centered['lat'], centered['lng']),
                disableDefaultUI: true,
                streetViewControl: true,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.BOTTOM_CENTER
                }
            };

            var map = new google.maps.Map(document.getElementById('map-canvas'),
                    mapOptions);

            for(var i = 0 ; i < arr.length; i++) {
                var obj = arr[i];
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(obj['lat'], obj['lng']),
                    title:obj['formatted_address']
                });
                if (obj['current'] === '1') {
                    marker.setIcon(pinSymbol('rgba(239, 57, 55, 0.89)'));
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                    var centerControlDiv = document.createElement('div');
                    var centerControl = new CurrentPlaceControl(centerControlDiv, map, marker);

                    centerControlDiv.index = 1;
                    map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
                }
                marker.setMap(map);
            }
        }

        function pinSymbol(color) {
            return {
                path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z',
                fillColor: color,
                fillOpacity: 1,
                strokeColor: '#444',
                strokeWeight: 1.1,
                scale: 1,
           };
        }

        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' +
            '&signed_in=false&callback=initialize';
            document.body.appendChild(script);
        }

        window.onload = loadScript;
    </script>

    <div class="text-center separator">
        <div class="separator-text">Mes aventures</div>
    </div>

    <div class="container">
        <div class="dokobox">
            <div id="map-canvas"></div>
        </div>
    </div>

    <div class="text-center separator">
        <div class="separator-text">Le Japon</div>
    </div>

    <div class="container">
        <div class="dokobox pays">
            <div class="dokobox-title">
                Une grosse île de 128 millions d'habitants
            </div>
            {!! HTML::image('content/japan.jpg', null, array('class'=>'leftcountry')) !!}
            <div class="dokobox-intro">
                <div>
                Le Japon, ce morceau de terre à l'autre bout du monde, fascine et attire
                nos yeux occidentaux depuis longtemps. Mais au-delà nos clichés, comme
                les geishas, les Samurais, ou encore les Ninjas, qu'en est-il réellement ?
                <br><br>
                Pour commencer, le pays du soleil levant, c'est une histoire de chiffres mirobolants.
                Composé de pas moins de 6 852 îles, habitées par 128 millions d'habitants sur une surface
                presque deux fois inférieure à la France. Faut pas avoir peur de se serrer !
                L'archipel a en effet une densité de population très importante par endroits, puisque que celle-ci
                se concentre sur les rivages des îles japonaises.
                </div>
                <div style="clear: both;">
                    Fier de ses 2500 ans d'histoire, le Japon n'a clairement rien à envier à la France :
                    ses empereurs illustres ont traversé les âges, à tel point qu'aujourd'hui encore, la lignée
                    ne s'est pas encore éteinte. Un empereur est encore en activité aujourd'hui et on peut
                    trouver son palais au centre de Tokyo.
                    <br><br>
                    Mais le Japon, c'est aussi un géant, un adversaire redoutable sur le plan économique comme
                    sur le plan culturel. Troisième puissance mondiale derrière les monstres que sont la Chine
                    et les États-Unis, le Japon pèse dans l'économie mondiale. Du côté culturel, il est l'un
                    des rares pays à faire de l'ombre aux États-Unis. Saviez-vous que la deuxième langue
                    la plus traduite en France après l'Anglais est le japonais ? Entre les mangas, la très raffinée
                    gastronomie japonaise, les séries d'animations, la J-Pop et sa culture populaire en général, le
                    pays a clairement des arguments qui séduisent partout dans le monde.
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="dokobox pays">
            <div class="dokobox-title">
                Entre tradition et modernité
            </div>
            <div class="dokobox-intro">
                Ce qui frappe, quand on arrive au Japon pour la première fois, c'est la façon dont
                les Japonais sont arrivés à mélanger subtilement leurs traditions et culture ancestrale
                avec le perpétuel mouvement de la société moderne.
                <br><br>
                {!! HTML::image('content/modernityandtraditions.jpg', null, array('class'=>'rightcountry')) !!}
                Les deux religions ancestrales, le Bouddhisme et le Shintoisme, se mélangent aujourd'hui
                aux habitudes modernes des Japonais. Il n'y a en effet qu'au Japon que vous pourrez voir
                quelqu'un aller à la supérette du coin en Yukata avec les bonnes vieilles sandales en bois. Les
                temples, les sanctuaires, parsèment le
                paysage des plus grandes villes, sans jamais perdre de leur beauté et de leur calme ambiant.
                Cette "Harmonie", au centre de la philosophie japonaise, est visible partout,
                avec la culture du Zen, dans les parcs et espaces verts des villes Nippones. On se laisse très vite
                bercer par la sérénité de ces lieux. La ville de Kyoto est en ce sens une des villes les plus "Zen"
                du Japon, tant elle est restée traditionnelle et conservatrice, en opposition avec Tokyo, la
                mégalopôle
                ultra peuplée.
                <br><br>
                Mais ce pays possède également un tout autre visage : c'est le pays des nouvelles technologies, du
                jeu-vidéo avec Nitendo par exemple
                ou encore de la robotique, dont les Japonais sont de fervents adeptes. Cet aspect
                ultra-moderne du Japon est visible dans des quartiers comme Akihabara ou Shinjuku avec leur ambiance
                dynamique, leurs écrans géants, leurs magasins de mode
                et d'électronique. Bref, aller au Japon, c'est un peu comme avoir un pied dans un temple Bouddhiste
                en pleine prière
                et un autre dans un quartier qui ne dort jamais rempli de personnages de mangas sur fond de J-Pop.
                Une expérience unique
                et déroutante !
            </div>
        </div>
    </div>
    <div class="text-center separator">
        <div class="separator-text">L'indonésie</div>
    </div>
    <div class="container">
        <div class="dokobox pays">
            <div class="dokobox-title">
                Le plus grand archipel du monde
            </div>
            {!! HTML::image('content/indonesia.jpg', null, array('class'=>'leftcountry')) !!}
            <div class="dokobox-intro">
                <div>
                L'Indonésie ! Ou comment parler de plages paradisiaques, de temples ancestraux, ou encore de
                promenades à dos d'éléphants.
                Mais l'Indonésie, c'est tout un tas de choses à vrai dire ! Du volcan à la jungle, de la plage à la
                ville, des tribus
                guerrières aux jeunes avec leur téléphone portable. Tout un monde en somme.
                <br><br>
                Premier fait qu'on ne soupçonne pas lorsqu'on met les pieds en Indonésie : ce petit regroupement
                d'îles, au nombre ridicule de
                13 466, est en fait le quatrième pays le plus peuplé au monde.
                </div>
                <div style="clear: both;">
                    L'archipel, qui est soit dit en passant le plus grand du monde,
                    a pour religion dominante l'Islam ! Eh oui, tous les temples que l'on voit sur les photos ne
                    sonnent pas spécialement musulmans, alors ça
                    surprend.
                    <br><br>
                    Et ce n'est pas tout : ce hameau de 230 Millions de personnes, comporte environ 300 peuples
                    différents. Et pour simplifier la communication
                    entre tout ce monde, on compte environ 742 langages et dialectes ! Google traduction n'a qu'à
                    bien se tenir !
                    Mais l'Indonésie, malgré sa taille et son nombre d'habitants, est encore un pays en voie de
                    développement : la santé y est encore très
                    dépendante de l'aide internationale et presque la moitié des habitants vivent avec seulement 2$
                    par jour.
                </div>
            </div>
        </div>
    </div>

@stop
