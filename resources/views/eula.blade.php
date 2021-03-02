@extends('layouts.app')

@section('title' , 'CGU')

@section('content')
<div class="ui main container">
    <div class="ui center aligned vertical segment">
        <h1 class="ui header">Conditions Générales d'Utilisation</h1>
    </div>
    <div class="ui vertical segments">

        <div id="eula" class="ui segment">
            <h2 class="ui header">
                <div class="content">
                    Conditions Générales d'Utilisation Foacs
                    <div class="sub header">Mis à jour: 1 mars 2021</div>
                </div>
            </h2>
            <p>
                Conditions Générales d'Utilisation du site web Foacs. <br>
                Veuillez lire attentivement les présentes conditions d'Utilisation.<br>
                Les présentes conditions d'utilisation ("Conditions") régissent l'accès au site web de Foacs ("Site web") et constituent le contrat
                entre Foacs et l'Utilisateur. L'accès au Site web de Foacs signifie l'acceptation des présentes Conditions.
            </p>
        </div>
        <div id="legal" class="ui segment">
            <h3 class="ui header">1. Mentions légales</h3>
            <p>
                Le site web de Foacs est mis à disposition par l'association de droit Foacs. <br>
                L'hébergement du site web est assuré par la société OVH, sise au 2 rue Kellermann - 59100 Roubaix - France.
            </p>
        </div>
        <div id="register" class="ui segment">
            <h3 class="ui header">2. Inscription des Utilisateurs</h3>
            <p>
                L'Utilisateur peut créer un compte individuel avec mot de passe dans les modalités définies au point <a href="#data">8</a>. Ce compte permet notamment à l'utilisateur de renseigner un profil
                public et d'indiquer sa contribution aux projets de Foacs.
                <br>
                Foacs se réserve le droit de suspendre ou résilier le compte d'un Utilisateur en cas d'utilisation frauduleuse ou contraire aux présentes conditions d'utilisation. 
            </p>
        </div>
        <div id="unregister" class="ui segment">
            <h3 class="ui header">3. Suppression de compte Utilisateur</h3>
            <p>
                L'Utilisateur peut demander la suppression de son compte Utilisateur via le <a href="{{ route('contact') }}">formulaire de contact.</a> Cette suppression est effective à
                compter de l'envoi à l'Utilisateur d'une confirmation de suppression de son compte Utilisateur. Elle entraîne la suppression de toutes les données associées au compte Utilisateur.
            </p>
        </div>
        <div id="condition" class="ui segment">
            <h3 class="ui header">4. Conditions d'utilisation</h3>
            <p>
                L'Utilisateur est réputé avoir pris connaissance des présentes Conditions. L'Utilisateur garantit qu'il n'utilisera pas le site web à des fins illicites ou immorales ou 
                contraires à leur utilisation initiale.<br>
                Conformément à la loi, l'Utilisateur s'engage à ne pas partager et/ou publier, par tout moyen, tout contenu (textes, propos, images) ayant, entre autres, un caractère agressif,
                malveillant, diffamatoire, pornographique, raciste, xénophobe ou incitant à la haine. L'Utilisateur garantit que les informations postées sur le site web ne violent pas les droits
                de tiers et sont conformes à toutes les lois applicables.
            </p>
        </div>
        <div id="license" class="ui segment">
            <h3 class="ui header">5. Logiciels utilisés</h3>
            <p>
                Le site web utilise <a href="https://laravel.com" target="_blank">Laravel</a> sous licence open source MIT, et est lui-même sous licence open source <a href="http://cecill.info/licences/Licence_CeCILL_V2.1-fr.html" target="_blank">CeCILL.</a><br>
                Le code source du site web est disponible sur <a href="https://github.com/Foacs/foacs-website" target="_blank">GitHub</a>.<br>
            </p>
        </div>
        <div id="link" class="ui segment">
            <h3 class="ui header">6. Liens hypertextes</h3>
            <p>
                Tout site public ou privé est autorisé à établir, sans autorisation préalable, un lien (y compris profond) vers les informations diffusées par le site web. <br><br>
                De nombreux liens vers d'autres sites, privés ou officiels, français ou étrangers, sont proposés. Leur présence ne saurait engager Foacs quant à leur contenue et ne vise qu'à
                permettre à l'internaute de trouver plus facilement d'autres ressources documentaires sur le sujet consulté.
            </p>
        </div>
        <div id="liability" class="ui segment">
            <h3 class="ui header">7. Responsabilité</h3>
            <p>
                Foacs met tout en oeuvre pour offrir aux Utilisateurs des informations et/ou des outils disponibles et mis à jour. Pour autant, elle ne saurait être tenue pour responsable en cas d'erreurs,
                d'absence de disponibilité des fonctionnalités et/ou de la présence de virus sur le site web. <br>
                Foacs ne saurait garantir l'exactitude, la complétude, l'actualité et l'exhaustivité des informations diffusées sur le site web. Chaque Utilisateur contribuant au contenu s'engage à vérifier 
                la véracité des informations obtenues auprès des personnes concernées. <br>
                Foacs ne saurait être engagée en cas de force majeure.
            </p>
        </div>
        <div id="data" class="ui segment">
            <h3 class="ui header">8. Données personnelles</h3>
            <p>
                Foacs est susceptible de recueillir, conserver et utiliser les informations concernant les Utilisateurs, leurs activités sur le site web et/ou leurs informations de connexion.<br>
                <h4 class="ui header">8.1 Traitement des données</h4>
                <p>
                    Finalité: le traitement a pour objet la gestion des Utilisateurs du Site. Il permet à Foacs: 
                    <ul>
                        <li>de permettre à l'Utilisateur de renseigner un profil public;</li>
                        <li>de permettre à l'Utilisateur d'indiqué sa contribution aux projets de Foacs;</li>
                    </ul>
                    <br>
                    Catégories des données traitées:
                    <ul>
                        <li>données d'identifications;</li>
                        <li>coordonnées de contact;</li>
                        <li>données de connexion au compte (adresses IP, noms d'utilisateurs);</li>
                    </ul>
                    <br>
                    Base légale du traitement : le e) du 1. de l’article 6 du Règlement Général sur la Protection des Données – 
                    RGPD (traitement nécessaire à l'exécution d'une mission d'intérêt public ou relevant de l'exercice de l'autorité publique dont est investi le responsable de traitement).
                    <br>
                    <br>
                    Source des données : ces informations sont recueillies auprès des Utilisateurs lors de leur inscription et de l’utilisation du Site.
                    <br>
                    <br>
                    Prise de décision automatisée : le traitement ne prévoit pas de prise de décision automatisée.
                    <br>
                    <br>
                    Personnes concernées : le traitement de données concerne les personnes qui créent un compte sur le Site.
                    <br>
                    <br>
                    Destinataire des données : Foacs est l'unique destinataire de tout ou partie des données.
                    <br>
                    <br>
                    Transferts des données hors Union Européenne : aucun transfert de données hors de l'Union européenne n'est réalisé.
                    <br>
                    <br>
                    Durée de conservation des données d’inscription : les données sont conservées en base active jusqu’à 3 ans après la clôture du compte utilisateur.        
                </p>
                <h4 class="ui header">8.2 Cookies</h4>
                <p>
                    Un « cookie » est un fichier de taille limitée, généralement constitué de lettres et de chiffres, envoyé par le serveur internet au fichier cookie du navigateur situé sur le disque dur de votre ordinateur.
                    Il a pour but de collecter des informations relatives à la navigation de l’Utilisateur et de lui dresser des services adaptés à son terminal (ordinateur, mobile ou tablette).
                </p>
            </p>
        </div>
        <div class="ui segment">
            <h3 class="ui header">Modifications - Mises à jour</h3>
            <p>
                Foacs peut être amenée à effectuer des modifications et/ou mises à jour susceptible d'affecter le site web pour des raisons liées notamment à des évolutions techniques et/ou juridiques.
            </p>
        </div>
        <div class="ui segment">
            <h3 class="ui header">Droit applicable et litiges</h3>
            <p>
                Les présentes Conditions sont soumises au droit français. Pour toute réclamation relative à l’utilisation et à l’acceptation, l’exécution ou l’interprétation des Conditions générales d’utilisation du Site, 
                les Utilisateurs peuvent saisir Foacs :
                <br><br>
                via le formulaire de contact à l'adresse suivante : <a href="{{ route('contact') }}">{{ route('contact') }}</a> ;
                <br><br>
                En cas de non résolution du litige à l'amiable, les Parties soumettront ledit litige à l'appréciation des tribunaux français compétents.
            </p>
        </div>
    </div>
    <i>Publié le 01/03/2021 - Mis à jour le 02/03/2021</i>
</div>
@endsection