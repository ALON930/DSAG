@extends('layouts.app')

@section('content')
    <!-- Titre + paragraphe -->
    <h2>La Data Science Academy Group organise une formation </h2>
    <p>La  Data Science Academy Group organise sa première formation modulaire sur les cinq (05) Piliers pour réussir dans la Data Science et l'Intelligence Artificielle (IA)</p>

    <!-- Section des boutons -->
    <section>
        <!-- Bouton Qui sommes-nous ? -->
        <div class="dropdown">
            <button class="der">Qui sommes-nous ?</button>
            <div class="dropdown-content">
                <h2>Data Science Academy Group</h2>
                <p>Nous sommes une équipe interdisciplinaire de chercheurs en début de carrière, Docteurs, Doctorants, Electroniciens et de spécialistes en analyse des données...</p>
                <h2>📍Localisation</h2>
                <p>Nous sommes basés à <a href="https://maps.app.goo.gl/CaRe6bgLEeWS38FR9">SANGUERA</a> non loin du carrefour La Paix et à 100m de l'école "CS Les futuristes".</p><a href="https://maps.app.goo.gl/CaRe6bgLEeWS38FR9">cliquez ici</a>
                <h2>Nos domaines d'intervention :</h2>
                <ol>
                    <li>Formations modulaires en analyse de données 
                        <ul>
                            <li>Données Atmosphériques, Océaniques et Climatiques</li>
                            <li>Données Biomédicales</li>
                            <li>Données Géospatiales</li>
                            <li>Données Agropastorales</li>
                        </ul><br>
                    </li>
                    <li>Accompagnement des jeunes chercheurs 
                        <ul>
                            <li>Collecte des données</li>
                            <li>Traitement des données</li>
                        </ul><br>
                    </li>
                    <li>Electronique et Informatique 
                        <ul>
                            <li>Maintenance de systèmes électroniques</li>
                            <li>Conception de systèmes électroniques </li>
                            <li>Shématisation de shémas électroniques</li>
                            <li>Analyses et réparations de systèmes électroniques</li>
                            <li>Maintenance informatique</li>
                            <li>Installation de systèmes informatiques</li>
                            <li>Analyse et réparation de pannes informatiques</li>
                        </ul>
                    </li>
                   



                </ol>
            </div>
        </div>

        <!-- Conditions -->
        <div class="dropdown">
            <button class="der">Conditions de participation</button>
            <div class="dropdown-content">
                <h2>Voici les conditions à réunir pour suivre nos formations</h2>
                <ol>
                    <li>Être disponible pour suivre la formation</li>
                    <li>Avoir au minimum le Baccalauréat (BAC2)</li>
                    <li>Avoir un PC avec caractéristiques minimales :
                        <ul>
                            <li>Disque dur interne ≥ 500GB</li>
                            <li>RAM ≥ 16GB</li>
                            <li>Disque dur externe ≥ 500GB</li>
                        </ul>
                    </li>
                    <li>S’acquitter de ses droits de formation</li>
                </ol>
            </div>
        </div>

        <!-- Titre -->
        <h2>Nos formations sont structurées en neuf (09) modules :</h2>

        <!-- Module Fondations -->
        <div class="dropdown">
            <button class="der">Fondations en Data Science et IA</button>
            <div class="dropdown-content">
                <p>Ce module a une durée minimale de trois (03) mois avec un nombre de participants très restreint de 30 personnes.</p>
                <h2>Répartition du temps</h2>
                <ul>
                    <li>Six (06) semaines en cours du jour, six (06) semaines en cours du soir</li>
                    <li>Six (06) semaines en présentiel, six (06) semaines en ligne</li>
                </ul>
                <h2>Contenu de ce module</h2>
                <ol>
                    <li>Prise en main de Linux (Ubuntu)</li>
                    <li>Python et les environnements virtuels</li>
                    <li>SQL</li>
                    <li>GIT</li>
                    <li>Frameworks de Data Science et méthodologie de l’IA</li>
                </ol>
                    <h3>NB: Nombre maximal de participants : 30 personnes <br> - Frais de participation : 100 000 FCFA</h3>
                <!-- Bouton spécial vers le formulaire -->
                <section style="margin-top:2rem; text-align:center;">
                    <a href="{{ route('inscription') }}">
                        <button class="form-btn">
                           <h2>S'inscrire</h2> 
                        </button>
                    </a>
                </section>
            </div>
        </div>

        <!-- Autres modules -->
        <div class="dropdown"><button class="der">Mathématiques de l’IA</button><div class="dropdown-content"><h3> OUPS ! Ce module n'est pas encore disponible</h3></div></div>
        <div class="dropdown"><button class="der">Machine Learning</button><div class="dropdown-content"><h3>OUPS ! Ce module n'est pas encore disponible</h3></div></div>
        <div class="dropdown"><button class="der">Deep Learning</button><div class="dropdown-content"><h3>OUPS ! Ce module n'est pas encore disponible</h3></div></div>
        <div class="dropdown"><button class="der">Gestion des projets IA</button><div class="dropdown-content"><h3>OUPS ! Ce module n'est pas encore disponible</h2></div></div>
        <div class="dropdown"><button class="der">Cloud Engineering</button><div class="dropdown-content"><h3>OUPS ! Ce module n'est pas encore disponible</h3></div></div>
        <div class="dropdown"><button class="der">Data Engineering and Big Data</button><div class="dropdown-content"><h3>OUPS ! Ce module n'est pas encore disponible</h3></div></div>
        <div class="dropdown"><button class="der">Apprentissage par Renforcement</button><div class="dropdown-content"><h3>OUPS ! Ce module n'est pas encore disponible</h3></div></div>
        <div class="dropdown"><button class="der">IA Générative</button><div class="dropdown-content"><h3>OUPS ! Ce module n'est pas encore disponible</h3></div></div>
        </section>

    <style>
        /* Flèche ▼ uniquement pour les boutons déroulants */
        .der {
            position: relative;
        }
        .der::after {
            content: "▼";
            position: absolute;
            right: 1rem;
        }

        /* Bouton spécial formulaire (pas de flèche) */
        .form-btn {
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: bold;
            margin: 5px;
        }
        .form-btn:hover {
            background-color: darkorange;
        }
    </style>
@endsection