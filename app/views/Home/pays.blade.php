@extends('Layouts.default')
@section('content')


<div class="page-container">
			<div class="text-center separator">
				<div class="separator-text">Le Japon</div>
				</div>

<div class="container">
	<div class="newsbox fullsize">
		<div class="boxtitle">
			<boxtitle>Une grosse île de 128 millions d'habitants</boxtitle>
		</div>
		<div class="left">
			{{ HTML::image('ressources/assets/japanmap.jpg', null, array('class'=>'img-responsive japan', 'style' => 'margin-right: 26px; margin-bottom: 26px;')) }}
		</div>
		<div class="boxintro">
			Le Japon, ce morceau de terre à l'autre bout du monde, fascine et attire
			nos yeux occidentaux depuis longtemps. Mais au-delà nos clichés, comme
			les geishas, les Samurais, ou encore les Ninjas, qu'en est-il réellement ?
			<br><br>
			Pour commencer, le pays du soleil levant, c'est une histoire de chiffres mirobolants.
			Composé de pas moins de 6 852 îles, habitées par 128 millions d'habitants sur une surface 
			presque deux fois inférieure à la France. Faut pas avoir peur de se serrer !
			L'archipel a en effet une densité de population très importante par endroits, puisque que celle-ci
			se concentre sur les rivages des îles japonaises.
			<br><br>
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
<div class="container">
	<div class="newsbox fullsize">
		<div class="boxtitle">
			<boxtitle>Entre tradition et modernité</boxtitle>
		</div>
		<div class="boxintro">
			Ce qui frappe, quand on arrive au Japon pour la première fois, c'est la façon dont
			les Japonais sont arrivés à mélanger subtilement leurs traditions et culture ancestrale 
			avec le perpétuel mouvement de la société moderne.
			<br><br>
			<div class="rightpays">
				{{ HTML::image('ressources/assets/modernityandtraditions.jpg', null, array('class'=>'img-responsive japan', 'style' => 'margin-left: 26px; margin-bottom: 26px;')) }}
			</div>
			Les deux religions ancestrales, le Bouddhisme et le Shintoisme, se mélangent aujourd'hui
			aux habitudes modernes des Japonais. Il n'y a en effet qu'au Japon que vous pourrez voir 
			quelqu'un aller à la supérette du coin en Yukata avec les bonnes vieilles sandales en bois. Les temples, les sanctuaires, parsèment le 
			paysage des plus grandes villes, sans jamais perdre de leur beauté et de leur calme ambiant. 
			Cette "Harmonie", au centre de la philosophie japonaise, est visible partout,
			avec la culture du Zen, dans les parcs et espaces verts des villes Nippones. On se laisse très vite
			bercer par la sérénité de ces lieux. La ville de Kyoto est en ce sens une des villes les plus "Zen" 
			du Japon, tant elle est restée traditionnelle et conservatrice, en opposition avec Tokyo, la mégalopôle 
			ultra peuplée.
			<br><br>
			Mais ce pays possède également un tout autre visage : c'est le pays des nouvelles technologies, du jeu-vidéo avec Nitendo par exemple
			ou encore de la robotique, dont les Japonais sont de fervents adeptes. Cet aspect
			ultra-moderne du Japon est visible dans des quartiers comme Akihabara ou Shinjuku avec leur ambiance dynamique, leurs écrans géants, leurs magasins de mode 
			et d'électronique. Bref, aller au Japon, c'est un peu comme avoir un pied dans un temple Bouddhiste en pleine prière
			et un autre dans un quartier qui ne dort jamais rempli de personnages de mangas sur fond de J-Pop. Une expérience unique 
			et déroutante !
		</div>
	</div>
</div>
<div class="text-center separator">
				<div class="separator-text">L'indonésie</div>
</div>
<div class="container">
	<div class="newsbox fullsize">
		<div class="boxtitle">
			<boxtitle>Le plus grand archipel du monde</boxtitle>
		</div>
		<div class="left">
			{{ HTML::image('ressources/assets/indonesieplage.jpg', null, array('class'=>'img-responsive japan','style'=>'margin-right: 26px; margin-bottom: 26px; max-width: 600px;')) }}
		</div>
		<div class="boxintro">
			L'Indonésie ! Ou comment parler de plages paradisiaques, de temples ancestraux, ou encore de promenades à dos d'éléphants.
			Mais l'Indonésie, c'est tout un tas de choses à vrai dire ! Du volcan à la jungle, de la plage à la ville, des tribus 
			guerrières aux jeunes avec leur téléphone portable. Tout un monde en somme.
			<br><br>
			Premier fait qu'on ne soupçonne pas lorsqu'on met les pieds en Indonésie : ce petit regroupement d'îles, au nombre ridicule de
			13 466, est en fait le quatrième pays le plus peuplé au monde. L'archipel, qui est soit dit en passant le plus grand du monde,
			a pour religion dominante l'Islam ! Eh oui, tous les temples que l'on voit sur les photos ne sonnent pas spécialement musulmans, alors ça 
			surprend.
			<br><br>
			Et ce n'est pas tout : ce hameau de 230 Millions de personnes, comporte environ 300 peuples différents. Et pour simplifier la communication 
			entre tout ce monde, on compte environ 742 langages et dialectes ! Google traduction n'a qu'à bien se tenir !
			Mais l'Indonésie, malgré sa taille et son nombre d'habitants, est encore un pays en voie de développement : la santé y est encore très 
			dépendante de l'aide internationale et presque la moitié des habitants vivent avec seulement 2$ par jour.
		</div>
	</div>
</div>
</div>

@stop