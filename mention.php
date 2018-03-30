<?php
	require 'inc/bootstrap.php';
	App::getAuth()->restrict();
	$db = App::getDatabase();
	require 'inc/header.php';
?>
<header class="header">
	<?php if(isset($_SESSION['auth'])): ?>
	<div class="divimg"><a href="main.php"><img class="imggen" src="img/accueil/fleet2.png" alt="logoFleet"/></a></div>
		<div class="nav">
			<div class="nav-items"><a href="main.php">Accueil</a></div>
			<div class="nav-items"><a href="allprojets.php">Projets</a></div>
			<div class="nav-items"><a href="allrevu.php">Revues</a></div>
			<div class="nav-items"><a href="allparcours.php">Parcours</a></div>
			<div class="nav-items"><a href="profil.php">Profil</a></div>
			<div class="nav-items"><a href="logout.php">Déconnexion</a></div>
		</div>
	<?php endif; ?>
</header>
<div class="global" id="global">
	<div class="blocM">
		<center><h1 class="titr">Mentions Légales</h1></center>
		<div class="ali">
			<p class="deff">
				<h1>I - Informations légales</h1>
				<li>Informations Éditeur</li><br/>
				<p>
				Fleet<br/>
				Société anonyme au capital de 1000 euros<br/>
				Siège social : 1 rue de Chablis<br/>
				93330 Bobigny<br/>
				France<br/>
				<br>
				Directeur de la publication : Christophe matthieu<br/>
				Contact par courrier électronique : Formulaire de contact : http:fleet.ovh<br/>
				</p>
				<li>Informations Hébergeurs</li><br/>
				<p>
				OVH<br/>
				</p>
				<h1>II – Conditions Générales d’Utilisation</h1>
				<b><h2>1 - Objet :</b></h2><br/>
				<p>
				Les présentes conditions générales d’utilisation (ci-après dénommées « CGU ») ont pour objet<br/>
				de définir et de fixer les modalités dans lesquelles Ovh met à votre disposition le site Internet de <br/>
				sa plateforme Fleet, accessible à l’adresse Fleet (ci-après dénommé le « Site »), ainsi que les<br/> 
				conditions dans lesquelles vous accédez et consultez le Site.<br/>
				</p>
				<b><h2>2 - Définitions :</b></h2><br/>
				<p>
					Pour les besoins des présentes CGU :<br/>
					<br>
					« Conditions Générales d'Utilisation » ou « CGU » : renvoient aux dispositions prévues aux <br/>
					présentes, acceptées par les Utilisateurs, régissant l’accès et l’utilisation du Site.<br/>
					<br>
					« Commentaire(s) » : renvoie(nt) au(x) texte(s) que l’Utilisateur rédige afin de commenter les<br/>
					Contenus (cf. définition ci-dessous). Les Commentaires des Utilisateurs seront visibles par tout<br/>
					internaute se rendant sur le Site.<br/>
					<br>
					« Contenus » : renvoient de manière large aux contenus et éléments présents sur le Site, <br/>
					notamment photographies, images, textes, articles, illustrations, sons, vidéos ainsi que le <br/>
					Player-Vidéo et le Player-Audio (cf. définitions ci-dessous).<br/>
					<br>
					« Contenus Utilisateurs » : renvoient aux textes, illustrations, photos, images, sons, vidéos, de <br/>
					quelque nature que ce soit, mis à disposition par les Utilisateurs dans le cadre des <br/>
					Espaces Contributifs.<br/>
					<br>
					« Espaces Contributifs » : renvoient à toutes les pages mises à disposition des Utilisateurs sur le<br/> 
					Site permettant à ces derniers de commenter les Contenus.<br/>
					<br>
					« Player-Vidéo » : désigne le logiciel permettant la lecture des Contenus vidéo. Le Player-Vidéo <br/>
					est exportable, et permet aux tiers préalablement autorisés par contrat d’afficher lesdits <br/>
					contenus sur leurs sites dans les conditions définies aux présentes CGU.<br/> 
					Il s’agit du Player-vidéo YouTube utilisé par Ancre<br/>
					<br>
					« Player-Audio » : désigne le logiciel permettant la lecture des Contenus audio. Le Player-Audio <br/>
					est exportable, et permet aux tiers préalablement autorisés par contrat d’afficher lesdits <br/>
					contenus sur leurs sites dans les conditions définies aux présentes CGU.<br/>
					<br>
					« Services » : renvoient aux services accessibles sur et/ou depuis le Site et édités par Ancre<br/>
					<br>
					« Services Partenaires » : renvoient aux services édités par des tiers partenaires accessibles sur <br/>
					et/ou depuis le Site, par le biais notamment de liens hypertextes placés dans différentes rubriques.<br/>
					<br>
					« Site » : renvoie au site de Fleet accessible à l’adresse www.fleet.ovh, ainsi qu’à l’ensemble <br/>
					de ses déclinaisons quel que soit le mode d’accessibilité (notamment site mobile et applications).<br/>
					<br>
				</p>
				<b><h2>3 - Acceptation des CGU :</b></h2><br/>
				<p>
					Toute utilisation du Site et/ou de toute application mobile et/ou tablette éditée et distribuée <br/>
					par Ancre pour sa chaîne Fleet(ci-après dénommés le(s) « Service(s) ») s’effectue dans le cadre des <br/>
					présentes CGU qui ont vocation à fixer les modalités d’utilisation des Services et Contenus <br/>
					proposés sur le Site.<br/>
					<br>
					Tout accès au Site implique l’application et l’acceptation des présentes CGU. <br/>
					Les CGU applicables sont celles en vigueur à la date de chaque connexion de l’Utilisateur au Site. <br/>
					Il est précisé que Ancre peut à tout moment faire évoluer les CGU afin de les adapter aux évolutions <br/>
					du Service et de la législation en vigueur. Ces modifications sont portées à la connaissance des <br/>
					Utilisateurs du simple fait de leur mise en ligne. Dès lors, elles sont réputées acceptées sans <br/>
					réserve par tout Utilisateur accédant au Site postérieurement à leurs mises en ligne. <br/>
					Par conséquent, l’Utilisateur est invité à s’y référer lors de chaque visite afin de <br/>
					prendre connaissance de leur dernière version disponible sur le Site.<br/>
					<br>
				</p>
				<b><h2>4 - Services Partenaires :</b></h2><br/>
				<p>
					Le Site permet également d’accéder à des Services Partenaires, par le biais de liens hypertextes <br/>
					intégrés dans différentes rubriques du Site renvoyant aux sites, contenus et services édités par <br/>
					lesdits partenaires. Les Services Partenaires peuvent notamment être accessibles via des <br/>
					éléments publicitaires (type bannières, vidéos…) à cliquer.<br/>
					<br>
					L’Utilisateur reconnaît que ces Services Partenaires sont totalement indépendants de Ancre. <br/>
					Dès lors, toute utilisation des Services Partenaires via le Site sera soumise exclusivement aux <br/>
					conditions d’utilisation et/ou de vente propres à chaque Service Partenaire ainsi qu’à leur <br/>
					politique de protection des données à caractère personnel.<br/>
					<br>
					La responsabilité de Ancre ne saurait être recherchée du fait du contenu accessible, <br/>
					de l’ensemble des offres, informations consultées ou transactions réalisées sur les Services Partenaires. <br/>
					De même Ancre n’offre aucune garantie quant au respect de la réglementation en <br/>
					vigueur par les éditeurs des Services Partenaires, qui en sont seuls responsables.<br/>
				</p>
				<b><h2>5 - Utilisateurs :</b></h2><br/>
				<b><h3 class="none">5.1 - Comptes Utilisateurs :</b></h3><br/>
				<p>
					L'accès au Site est gratuit et n'est pas soumis à une inscription préalable.<br/>
					<br>
					Néanmoins, certains services proposés sur le Site (comme l’envoi de newsletters) peuvent être <br/>
					soumis à une inscription préalable de l’Utilisateur, son identification et <br/>
					l’utilisation d’un Compte Utilisateur.<br/>
					<br>
					Lors de la création de son Compte Utilisateur, l’Utilisateur sera amené à choisir son identifiant <br/>
					personnel et un mot de passe associé, qui sont strictement personnels et confidentiels. <br/>
					Un formulaire d’inscription sera soumis à l’Utilisateur afin qu’il communique à Ancre certaines <br/>
					informations à caractère personnel obligatoires ou facultatives selon les mentions figurant sur le formulaire. <br/>
					A défaut de communication par l’Utilisateur des informations mentionnées comme obligatoires, la validation <br/>
					de la création du Compte Utilisateur ne pourra avoir lieu.<br/>
					<br>
					Ces données personnelles sont collectées et conservées avec le consentement de l’Utilisateur et feront l’objet d’un <br/>
					traitement tel que défini à l’article 10 des présentes CGU.<br/>
					<br>
				</p>
				<b><h4 class="none">5.1.1 - Protection des mineurs :</b></h4><br/>
				<p>
					Dans l'hypothèse où l’Utilisateur est une personne physique mineure, il déclare et reconnaît avoir <br/>
					recueilli l'autorisation préalable de ses parents ou du (des) titulaire(s) de l'autorité parentale le <br/>
					concernant pour naviguer sur le Site. Le(s) titulaire(s) de l'autorité parentale a (ont) accepté d'être <br/>
					garant(s) du respect de l'ensemble des dispositions des présentes CGU lors de l’utilisation du Site <br/>
					par l’Utilisateur mineur.<br/>
					<br>
					Les parents (ou titulaires de l'autorité parentale) sont invités à surveiller l'Utilisation faite par leurs <br/>
					enfants du Service et à garder présent à l'esprit que le Service est destiné à toucher un large public et qu'en <br/>
					leur qualité de tuteur légal, il est de la responsabilité des parents de déterminer quel site Web est ou non <br/>
					approprié pour leur(s) enfant(s) et de surveiller l'utilisation qu'ils en font.<br/>
					Pour plus d’informations sur le filtrage, notamment en vue de la protection des mineurs, Ancre recommande aux <br/>
					parents de se rapprocher de leur fournisseur d’accès à Internet et de <br/>
					consulter la page suivante : <a href="http://www.education.gouv.fr/cid141/la-protection-des-mineurs-sur-internet.html" target="_blank">http://www.education.gouv.fr/cid141/la-protection-des-mineurs-sur-internet.html</a><br/>
					Il est précisé que les mineurs âgés de moins 16 ans ne sont pas autorisés à créer un Compte Utilisateur.<br/>
					<br>
				</p>
				<b><h4 class="none">5.1.2 - Identifiants de services tiers :</b></h4><br/>
				<p>
					L’accès à certaines fonctionnalités ou services peut être conditionné à l’utilisation d’identifiants de services <br/>
					tiers tels que Facebook, Twitter, Google +, LinkedIn.<br/>
					Une connexion de l’Utilisateur avec les identifiants propres à ces différents services tiers sera nécessaire pour <br/>
					toutes les fonctionnalités communautaires impliquant une interaction avec lesdits services tiers.<br/>
					La création et l’utilisation de ces comptes et les données à caractère personnel communiquées par l’Utilisateur <br/>
					auprès de ces services tiers sont régies par les conditions d’utilisation et la politique de protection des <br/>
					données à caractère personnel propres à chaque service tiers, excluant toute responsabilité d'Ancre à ce titre.<br/>
					<br>
				</p>
				<b><h3 class="none">5.2 - Espaces Contributifs :</b></h3><br/>
				<b><h4 class="none">5.2.1</b></h4><br/>
				<p>
					Les Utilisateurs ont la possibilité de commenter les Contenus mis en ligne sur le Site (ci-après « les Commentaires »), <br/>
					et/ou mettre en ligne des textes, vidéos, sons, images et/ou photographies (ci-après les « Contenus Utilisateurs »). <br/>
					Ces Commentaires et Contenus Utilisateurs sont visualisables par tout internaute se rendant sur le Site Ancre n’effectue <br/>
					aucun contrôle a priori des Contenus Utilisateurs et/ou Commentaires mis en ligne par les Utilisateurs, qui restent <br/>
					ainsi responsable de la teneur des Commentaires et/ou Contenus Utilisateurs dont ils sont auteurs.<br/>
					En aucun cas, la responsabilité de Ancre ne pourra être engagée sur le fondement de Commentaires et/ou <br/>
					Contenus Utilisateurs qui auraient été mis en ligne par un Utilisateur, non détenteur des droits nécessaires <br/>
					à une telle mise en ligne.<br/>
					Tout Utilisateur qui met en ligne des Commentaires et/ou Contenus Utilisateurs sur le Site autorise expressément Ancre, <br/>
					à titre gratuit et non exclusif, à conserver, reproduire et représenter lesdits Commentaires et/ou Contenus Utilisateurs <br/>
					pour toute la durée des droits de propriété intellectuelle à compter de leur publication.<br/>
					Il est précisé que pour des raisons techniques, certains Contenus Utilisateurs pourront être reformatés conformément aux <br/>
					dispositions de l’article 7.3 des présentes CGU (notamment police, taille, orthographe). <br/>
					Aucune modification de fond ne sera apportée aux Commentaires et/ou Contenus Utilisateur, sans l’accord préalable <br/>
					exprès et écrit de l’Utilisateur auteur dudit Contenu Utilisateur.<br/>
					<br>
				</p>
				<b><h4 class="none">5.2.2</b></h4><br/>
				<p>
					L’Utilisateur s’engage à ne pas mettre en ligne sur le Site des Contenus Utilisateurs et Commentaires qui ne seraient <br/>
					pas conformes à la législation en vigueur en France, et notamment qui :<br/>
					<br>
					- seraient contraires à l’ordre public et aux bonnes mœurs ;<br/>
					<br>
					- porteraient atteinte à la vie privée d’autrui ;<br/>
					<br>
					- constitueraient une atteinte au secret des sources des journalistes ;<br/>
					<br>
					- violeraient le secret professionnel ;<br/>
					<br>
					- feraient allusion à l’origine raciale, religieuse, ethnique, aux caractéristiques physiques, au handicap d’un individu, <br/>
					à moins que ces mentions ne soient pertinentes pour la compréhension de l’information ;<br/>
					<br>
					- contribueraient à la diffusion d’une œuvre protégée par le Code de la Propriété Intellectuelle sans disposer des <br/>
					autorisations préalables nécessaires ;<br/>
					<br>
					- constitueraient une injure, une diffamation, un dénigrement, une atteinte à l’honneur et à la réputation, à la dignité <br/>
					de la personne, une incitation à la haine raciale, un acte de concurrence déloyale ;<br/>
					<br>
					- constitueraient une atteinte à la dignité d’une victime ;<br/>
					<br>
					- porteraient atteinte à l’identité des victimes d’agressions ou d’atteintes sexuelles, sauf si la personne a donné <br/>
					son accord écrit ;<br/>
					<br>
					- permettraient la diffusion d’informations relatives à l’identité ou permettant l’identification d’un mineur ;<br/>
					<br>
					- encourageraient la commission de crimes et/ou délits incitant à la consommation de substances interdites ou <br/>
					incitant au suicide ;<br/>
					<br>
					- feraient l’apologie de certains crimes, notamment meurtre, viol, crimes de guerre et crimes contre l’humanité ;<br/>
					<br>
					- auraient un caractère raciste, antisémite, xénophobe, révisionniste, obscène ou pornographique, pédophile.<br/>
					<br>
					<br>
					Par ailleurs, les Utilisateurs s’engagent à rédiger des Commentaires et/ou Contenus Utilisateurs qui :<br/>
					<br>
					- sont pertinents et en lien avec le sujet commenté ou concerné ;<br/>
					<br>
					- sont lisibles et compréhensibles par tous, en évitant d’abuser des abréviations ou du « langage SMS » ;<br/>
					<br>
					- évitent l’utilisation abusive de majuscules qui pourrait être ressentie comme agressive ;<br/>
					<br>
					- ne constituent pas des spams, ni des « flood » (poster le même message à plusieurs reprises).<br/>
					<br>
				</p>
				<b><h3 class="none">5.3 - Modération des Espaces Contributifs :</b></h3><br/>
				<p>
					Ancre peut, à sa seule discrétion, décider de supprimer tout Commentaire et/ou Contenu Utilisateur après <br/>
					sa mise en ligne sur le Site, dans l’hypothèse où ledit Commentaire et/ou Contenu Utilisateur ne respecterait <br/>
					pas les dispositions de l’article 5.2.2, et plus généralement contreviendrait aux dispositions de la <br/>
					législation française en vigueur.<br/>
					<br>
				</p>
				<b><h2>6 - Propriété Intellectuelle :</b></h2><br/>
				<b><h3 class="none">6.1 - Eléments du Site et Contenus :</b></h3><br/>
				<p>
					Les éléments contenus sur le Site tels que notamment les textes, sons, images, vidéos, musique, logiciels, bases de données, <br/>
					logos, marques et autres éléments reproduits, sont réservés et protégés par le droit de la propriété intellectuelle <br/>
					(notamment droit d’auteur, droits voisins, droit des marques). Ces éléments protégés sont la propriété de Ancre <br/>
					et/ou de ses partenaires.<br/>
					En vertu des règles relatives à la propriété intellectuelle, toute reproduction (y compris par téléchargement, impression etc.) <br/>
					ou représentation partielle ou intégrale, adaptation, traduction, transformation et/ou transfert vers un autre site d'un ou <br/>
					de plusieurs des éléments précités est interdite sans l'autorisation préalable et écrite de Ancre et/ou des titulaires des droits.<br/>
					Toute utilisation non autorisée de l’un de ces éléments constitue un délit de contrefaçon et peut donner lieu à des poursuites <br/>
					judiciaires civiles et/ou pénales et au paiement de dommages et intérêts.<br/>
					<br>
					Ancre accorde à l’Utilisateur l’autorisation incessible, gratuite, non exclusive, personnelle et privée d’utiliser les <br/>
					Services et le Site pour un usage uniquement personnel et privé, et dans le strict respect des conditions d'utilisation établies <br/>
					par les présentes CGU.<br/>
					<br>
				</p>
				<b><h3 class="none">6.2 - Marques :</b></h3><br/>
				<p>
					Les marques de Ancre et de ses partenaires, y compris les logos figurant sur le Site sont des marques déposées et protégées <br/>
					à ce titre par le droit de la propriété industrielle (article L 713-2 du Code de la Propriété Intellectuelle et suivants). <br/>
					Sauf autorisation expresse et préalable de leurs propriétaires, l'utilisation de ces marques ou logos est prohibée. <br/>
					Toute utilisation non autorisée d'une marque ou d'un logo protégé constitue un délit de contrefaçon et peut être poursuivi <br/>
					devant les autorités judiciaires.<br/>
					<br>
				</p>
				<b><h3 class="none">6.3 - Contributions des Utilisateurs :</b></h3><br/>
				<p>
					Chaque Utilisateur garantit à Ancre qu’il dispose des droits d’utilisation nécessaires à la mise en ligne des Commentaires <br/>
					et/ou Contenus utilisateurs sur le Site.<br/>
					A ce titre, tout Utilisateur cède à Ancre, à titre gracieux et non exclusif, pour toute la durée de protection légale <br/>
					des droits de propriété intellectuelle portant éventuellement sur ses Commentaires et/ou Contenus utilisateurs, le droit <br/>
					de reproduire, représenter, copier, modifier, reformater, rééditer, communiquer, distribuer, adapter et plus généralement <br/>
					d'exploiter tout ou partie des Commentaires et/ou Contenus Utilisateurs sur le Site, ainsi que sur ses déclinaisons quel que <br/>
					soit le mode d’accessibilité.<br/>
					Ces droits sont cédés pour le monde entier pour toutes exploitations sur tous supports et par tous procédés de diffusion <br/>
					connus ou inconnus à ce jour.<br/>
					Dans le cadre de l’application de l’article 5.2.1, par lequel l’Utilisateur reconnaît et accepte expressément que certains <br/>
					Commentaires et/ou Contenus Utilisateurs pourront être reformatés pour des besoins exclusivement techniques, l’Utilisateur <br/>
					cède ainsi les droits d’adaptation nécessaires. Aucune modification tenant au fond ne sera apportée aux Commentaires et/ou <br/>
					Contenus Utilisateurs sans l’accord préalable et exprès de l’Utilisateur.<br/>
					L’Utilisateur reconnaît et accepte expressément qu’aucune exploitation des Commentaires et/ou Contenus Utilisateurs par Ancre, <br/>
					dans le cadre des présentes ne pourra donner lieu à une quelconque compensation financière.<br/>
					<br>
				</p>
				<b><h2>7 - Liens hypertextes :</b></h2><br/>
				<b><h3 class="none">7.1 - Contributions des Utilisateurs :</b></h3><br/>
				<p>
					Le lien hypertexte simple se définit comme un lien donnant seulement accès à la page d'accueil du Site<br/>
					A l'exception des cas où le lien simple vient d’un site Internet diffusant des informations et/ou contenus <br/>
					ayant un caractère illégal et/ ou à caractère politique, religieux, pornographique ou xénophobe, il est possible <br/>
					de créer un lien simple d'un site licite.<br/>
					<br>
				</p>
				<b><h3 class="none">7.2 - Contributions des Utilisateurs :</b></h3><br/>
				<p>
					Le lien hypertexte profond se définit comme un lien donnant accès à une page précise du Site sans passer par sa page d'accueil.<br/>
					Le Player-Vidéo et/ou Player-audio embarqué sur un site tiers permet d'accéder à un Contenu vidéo et/ou audio du Site <br/>
					en le faisant apparaître dans un cadre dudit site tiers, ou en donnant un accès direct à un ou plusieurs Contenu(s).<br/>
					Tout établissement de lien hypertexte profond ainsi que tout Player-Vidéo et/ou Player-Audio embarqué sont interdits <br/>
					à moins que Ancre ne l’ait préalablement autorisé expressément par contrat.<br/>
				</p>
				<b><h3 class="none">7.3 - Contributions des Utilisateurs :</b></h3><br/>
				<p>
					Des liens hypertextes contenus sur le Site peuvent renvoyer vers d'autres sites tiers.<br/>
					La visite de l’Utilisateur sur ces sites tiers s'effectue sous sa seule responsabilité. <br/>
					Ancre ne peut être tenue pour responsable d’avoir proposé à l’Utilisateur ce lien hypertexte et des <br/>
					contenus figurant sur ces sites tiers. L’Utilisateur ne peut en aucun cas engager la responsabilité <br/>
					de Ancre pour des dommages directs ou indirects subis du fait de l'utilisation d'un site tiers accessible à partir du Site.<br/>
					<br>
				</p>
				<b><h2>8 - Recommandation particulière aux Utilisateurs internationaux :</b></h2><br/>
				<p>
					Ancre permet l’accès au Site depuis tout pays, sous réserve de la législation locale en vigueur et des éventuelles <br/>
					restrictions applicables qu’elle impose. Tout Utilisateur accédant au Site depuis un poste informatique situé hors du <br/>
					territoire français reconnaît expressément avoir pris connaissance, compris et accepté sans réserve les termes des présentes <br/>
					CGU générales et s’engage à respecter la législation locale et toutes les restrictions applicables au pays concerné.<br/>
					Certains Contenus présents sur le Site ne sont pas accessibles depuis certains pays, en raison notamment des restrictions <br/>
					territoriales imposées par les ayants droit ou de droits de diffusion limités. En conséquence, les Utilisateurs qui accèdent <br/>
					au Site depuis des postes informatiques situés sur ces territoires exclus s'interdisent d'utiliser tout système de contournement <br/>
					des mesures de localisation destiné à permettre un accès à ces contenus depuis ces territoires.<br/>
					<br>
				</p>
				<b><h2>9 - Responsabilité :</b></h2><br/>
				<b><h3 class="none">9.1 - Accessibilité du Site et des Services :</b></h3><br/>
				<p>
					Le Site et les Services sont accessibles 24 heures sur 24 et 7 jours sur 7. Ancre fera ses meilleurs efforts pour garantir <br/>
					l’accessibilité du Site et des Services. Toutefois, Ancre ne pourra voir sa responsabilité engagée en raison de risques <br/>
					d’interruption ou de dysfonctionnement liés à la connexion, à une opération de maintenance, à une mise à jour éditoriale, <br/>
					à l’encombrement des réseaux et/ou des systèmes informatiques, à l’intrusion de tiers non autorisés et à la contamination <br/>
					par d’éventuels virus circulant sur lesdits réseaux et services, à une grève interne ou externe, à une mauvaise configuration <br/>
					ou utilisation de l’ordinateur de l’Utilisateur ou à toute autre cause dépendant ou non de sa volonté.<br/>
					Ancre ne sera pas tenue responsable au cas où l’interruption ou l’altération de la qualité du Site et des Services serait due <br/>
					à la survenance d’un cas de force majeure. Est considéré comme un cas de force majeure, tout événement de force majeure ou cas <br/>
					fortuit, tels que définis par la législation française en vigueur et la jurisprudence de la Cour de Cassation.<br/>
					<br>
				</p>
				<b><h3 class="none">9.2 - Contenu éditorial :</b></h3><br/>
				<p>
					Ancre s’engage à faire tout son possible pour garantir la véracité et l’exactitude des informations disponibles sur l’ensemble <br/>
					du Site mais ne saurait être tenue responsable de l’inexactitude de celles-ci, ni de l’utilisation ou de l’interprétation qui en <br/>
					est faite par les Utilisateurs.<br/>
					Aussi, la responsabilité de Ancre ne saurait être retenue en raison d'un dommage direct ou indirect, incident ou accessoire, <br/>
					résultant de l'utilisation du Site ou d'une quelconque information obtenue sur le Site. Ancre se réserve à tout moment et sans <br/>
					préavis le droit d'apporter des améliorations et/ou des modifications sur le Site et ses Services. De manière générale, <br/>
					l’Utilisateur garantit Ancre contre tout recours ou action, de toute personne, et leurs conséquences pécuniaires éventuelles, <br/>
					fondé(e) sur ou résultant directement ou indirectement de ses agissements, ou découlant de l’utilisation par l’Utilisateur du Site <br/>
					ainsi que de toute violation supposée des CGU ou des dispositions réglementaires en vigueur et tient Ancre quittes et indemnes de <br/>
					tout recours y compris contentieux qui pourrait en résulter.<br/>
					<br>
				</p>
				<b><h2>10 - Politique de confidentialité :</b></h2><br/>
				<b><h3 class="none">10.1 - Données personnelles :</b></h3><br/>
				<p>
					Conformément aux dispositions de la loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés, <br/>
					le Site a été déclaré auprès de la Commission nationale de l'informatique et des libertés.<br/>
					<br>
					Ancre effectue des traitements des données à caractère personnel collectées auprès des Utilisateurs sur le Site dans le cadre <br/>
					de l’utilisation du Site pour :<br/>
					<br>
					1) la création de Compte Utilisateur : les données personnelles recueillies à cette occasion sont nécessaires à l’envoie, <br/>
					de newsletters et alertes information par Ancre aux Utilisateurs intéressés.<br/>
					2) La rubrique « Contactez-nous » : les données personnelles recueillies à cette occasion sont nécessaires d’une part, à <br/>
					l’utilisation et la navigation sur le Site et d’autre part, pour travailler et/ou entrer en relations commerciales avec FMM (Ancre).<br/>
					<br>
					Les données à caractère personnel collectées dans ce cadre sont les suivantes :<br/>
					<br>
					- Nom, prénom ;<br/>
					- Adresse mail ;<br/>
					- Numéro de téléphone ;<br/>
					- Pays ;<br/>
					- Langue ;<br/>
					- Adresse IP ;<br/>
					- Navigateur et version ;<br/>
					- Operateur du téléphone ;<br/>
					- Identifiant publicitaire mobile (IDFA/GAID) ;<br/>
					- Photo de profil ;<br/>
					- CV.<br/>
					<br>
					La finalité des traitements de données à caractère personnel est la suivante :<br/>
					<br>
					<li>Créer et gérer le Compte Utilisateur.</li><br/>
					<li>Personnaliser l’expérience utilisateurs éditoriale et/ou publicitaire sur nos environnements.</li><br/>
					<li>Permettre à l’Utilisateur de recevoir des newsletters, des informations et alertes (push).</li><br/>
					<li>Répondre aux demandes de l’Utilisateur.</li><br/>
					<li>Etablir des statistiques sur la fréquentation des différentes rubriques de la Plateforme numérique.</li><br/>
					<li>Permettre aux Utilisateurs de contribuer au Site par la publication de Commentaires et/ou Contenus Utilisateurs.</li><br/>
					<li>Permettre l’identification des Utilisateurs en cas d’utilisations abusives du Site concernant la publication de Commentaires et/ou Contenus Utilisateurs.</li><br/>
					<br>
					Lors de la création ou de la gestion de son Compte Utilisateur, l’Utilisateur peut choisir de s’abonner aux newsletters du Site. <br/>
					L’Utilisateur peut se désabonner à tout moment en cliquant sur le lien prévu à cet effet dans les emails qui lui sont envoyés dans ce cadre.<br/>
					Conformément à la loi n° 78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés, l’Utilisateur dispose des droits <br/>
					suivants :<br/>
					<br>
					<li>du droit de s’opposer, pour des motifs légitimes, à ce que les données personnelles le concernant fassent l’objet d’un traitement ;</li><br/>
					<li>du droit d’accéder à ses données personnelles faisant l’objet d’un traitement ;</li><br/>
					<li>du droit de demander que ses données soient rectifiées, complétées, mises à jour, verrouillées ou effacées lorsqu’elles sont inexactes, incomplètes, équivoques ou périmées, ou dont la collecte, l’utilisation, la communication ou la conservation est interdite.</li><br/>
					<br>
					Ces demandes doivent être adressées par le biais du formulaire « Contactez-nous / J’ai une autre question ou remarque » prévu <br/>
					à cet effet sur le Site.<br/>
					<br>
					Si des modifications sont apportées aux règles de traitement des données, l’Utilisateur ayant créé un Compte Utilisateur en sera <br/>
					informé et son consentement sera demandé.<br/>
					<br>
				</p>
				<b><h3 class="none">10.2 - Cookies :</b></h3><br/>
				<b><h4 class="none">10.2.1</b></h4><br/>
				<p>
					L’Utilisateur est informé que, lors de ses visites sur le Site, des cookies peuvent être installés automatiquement sur son logiciel <br/>
					de navigation. Un cookie est un fichier, souvent anonyme, contenant des données, notamment un identifiant unique, transmis par le <br/>
					serveur du Site au navigateur de l’Utilisateur et stocké sur son disque dur. Ces cookies permettent lors de chaque visite par un <br/>
					Utilisateur sur le Site, de réaliser des études statistiques globales sur l’audience du Site, d’identifier le cas échéant l’Utilisateur, <br/>
					d’étudier le comportement des Utilisateurs au sein des différentes rubriques du Site et ce, afin d’améliorer notamment l’organisation <br/>
					du Site et des Services ainsi que la navigation des Utilisateurs.<br/>
					Les cookies eux – mêmes ne permettent pas d’identifier un Utilisateur, mais uniquement l’ordinateur qu’il utilise. Les cookies identifient <br/>
					les pages du Site que l’Utilisateur de l’ordinateur a visité, ainsi que la durée de consultation de celles-ci.<br/>
					<br>
				</p>
				<b><h4 class="none">10.2.2</b></h4><br/>
				<p>
					L'Utilisateur est libre de s’opposer au dépôt des cookies en configurant son navigateur via ses paramètres (article 10.2.4) ; <br/>
					cependant en refusant l’installation des cookies, certaines fonctionnalités du Site ne pourront pas être proposées.<br/>
					<br>
				</p>
				<b><h4 class="none">10.2.3</b></h4><br/>
				<p>
					Il convient de distinguer deux types de cookies :<br/>
					<br>
					- les cookies Ancre : il s’agit des cookies déposés par Ancre sur le logiciel de navigation de l’ordinateur pour répondre <br/>
					aux besoins de navigation, d’optimisation et de personnalisation des Services du Site par les Utilisateurs : cookies analytics <br/>
					(@ Internet) ; cookies techniques utiles au Site pour fonctionner (Enseighten) et cookies de personnalisation de la navigation.<br/>
					- les cookies publicitaires : Il s'agit des cookies utilisés pour présenter aux Utilisateurs des publicités et/ou adresser des <br/>
					informations adaptées à leurs centres d'intérêts sur le Site lors de la navigation. Ils sont notamment utilisés pour la gestion des <br/>
					publicités et/ou informations.<br/>
					Le refus de ces cookies publicitaires n'a pas d'impact sur l'utilisation du Site. Le fait de refuser les cookies publicitaires <br/>
					n'entraînera pas l'arrêt de la publicité sur le Site mais aura pour effet d'afficher une publicité qui ne tiendra pas compte des <br/>
					centres d'intérêt, de la géolocalisation ou des préférences des Utilisateurs.<br/>
					<br>
					Ces cookies publicitaires sont principalement des cookies tiers qui émanent des régies publicitaires et/ou de partenaires <br/>
					(ex. : Google, Teads, Outbrain, Facebook etc.), et qui à ce titre ne peuvent pas être contrôlés de manière exhaustive par Ancre.<br/>
					<br>
				</p>
				<b><h4 class="none">10.2.4</b></h4><br/>
				<p>
					L’Utilisateur peut à tout moment décider de désinstaller ces cookies. Le navigateur peut également être paramétré afin de <br/>
					signaler l’installation de nouveaux cookies à laquelle l’Utilisateur peut décider de s’opposer ou non.<br/>
					L’Utilisateur peut accepter ou refuser les cookies, soit de manière individuelle, soit de manière systématique.<br/>
					L’Utilisateur peut gérer, désactiver ou autoriser les cookies en modifiant les paramètres de son navigateur Internet de la manière suivante :<br/>
					<br>
					Edge / Internet Explorer :<br/>
					<li>Dans Edge ou Internet Explorer, cliquez sur le bouton Outils, puis sur Options Internet.</li><br/>
					<li>Sous l'onglet Général, sous Historique de navigation, cliquez sur Paramètres.</li><br/>
					<li>Cliquez sur le bouton Afficher les fichiers.</li><br/>
					<br>
					Firefox :<br/>
					<li>Allez dans l'onglet Outils du navigateur puis sélectionnez le menu Options.</li><br/>
					<li>Dans la fenêtre qui s'affiche, choisissez Vie privée et cliquez sur Affichez les cookies.</li><br/>
					<br>
					Safari :<br/>
					<li>Dans votre navigateur, choisissez le menu Édition > Préférences.</li><br/>
					<li>Cliquez sur Sécurité.</li><br/>
					<li>Cliquez sur Afficher les cookies.</li><br/>
					<br>
					Google Chrome : <br/>
					<li>Cliquez sur l'icône du menu Outils.</li><br/>
					<li>Sélectionnez Paramètres.</li><br/>
					<li>Cliquez sur l'onglet Paramètresavancées et accédez à la section Confidentialité et Sécurité.</li><br/>
					<li>Cliquez sur le bouton Paramètres du contenu puis sur Cookies.</li><br/>
					<li>Dispositions finales</li><br/>
					<br>
					Les présentes CGU sont soumises et interprétées conformément au droit français. Tout litige persistant relatif à l’interprétation, <br/>
					l’application ou l’exécution des présentes CGU qui ne serait pas réglé de manière transactionnelle dans un délai de 30 (trente) <br/>
					jours suivant la notification du litige par lettre recommandée avec accusé de réception, sera soumis à la compétence exclusive des <br/>
					tribunaux de Nanterre (France).Si une partie quelconque des dispositions des présentes CGU devait s'avérer illégale, invalide ou <br/>
					inapplicable pour quelque raison que ce soit, le terme ou les termes en question seraient déclarés nuls et les termes restants <br/>
					garderaient toute leur force et leur portée et continueraient à être applicables.<br/>
					La non-application ou l'absence de revendication de l'application par Ancre de l'une quelconque des dispositions des présentes <br/>
					CGU ne saurait en aucun cas être interprétée comme une renonciation par Ancre à une telle disposition ou un tel droit, à moins que <br/>
					Ancre n'en convienne autrement par écrit.<br/>
				</p>
			</p>
			<p class="deff">
			L’équipe fleet vous souhaite une bonne navigation sur le site <span style="color:#FF5260">FLEET</span>
			</p>
		</div>
	</div>
</div>

<footer class="footer">
	<div class="footer-content">
		<div class="footer-socials">
			<ul>
				<li class="foot-item"><a href="https://www.facebook.com/Fleet-change-your-world-177344952913438/?hc_ref=ARS6ZUejbmzCW9VHWZKC062UwGJEfvBM9DbdQtFk7oLbycEvxORS708jI82fldH3alo&fref=nf" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a></li>
				<li class="foot-item"><a href="" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a></li>
				<li class="foot-item"><a href="https://twitter.com/fleetcyw" target="_blank"><i class="fab fa-twitter fa-2x"></i></a></li>
			</ul>
		</div>
		<div class="footer-links">
			<ul>
				<li class="foot-item"><a href="apropos.php">A propos </a></li>
				<li class="foot-item"><a href="faq.php">FAQ</a></li>
				<li class="foot-item"><a href="mention.php">Mentions légales</a></li>
			</ul>
		</div>
	</div>
</footer>