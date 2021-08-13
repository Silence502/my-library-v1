# My Library

<em>(Nom provisoire)</em>

<h3>Présentation</h3>

<p>Quel passionné(e) de livre n'a pas un jour rêvé(e) d'avoir une grande bibliothèque avec des étagères
remplies de toutes sortes d'ouvrages ? Alors qu'à la maison seules quelques petites étagères se battent
en duel pour supporter le peu de livres qui lui sont déposés.</p>

<p>Ce projet d'application web consiste à donner la possibilité aux utilisateurs gérer leur propre
bibliothèque en ligne. Ce site n'aura pas pour vocation de pouvoir lire des livres en ligne mais seulement
à organiser sa propre bibliothèque, comme un ensemble d'étagères mais virtuelles.</p>
<p><strong>Les grandes et principales fonctionnalités seront les suivantes :</strong></p>

<ul>
<li>L'utilisateur inscrit pourra ajouter des ouvrages à sa bibliothèque en ligne. Roman, bande-dessinées,
mangas ou autres styles d'ouvrages pourront y être déposés.</li>
<li>Si l'ouvrage que souhaitera ajouter l'utilisateur ne se trouve pas dans la base de données,
un système d'ajout lui sera proposé de manière simple est rapide.</li>
<li>L'utilisateur pourra choisir l'état de l'ouvrage ajouté : <i>envie de lire, en cours de lecture, lu.</i></li>
<li>Si un livre est à létat <i>lu,</i> l'utilisateur pourra lui attribuer une note globale sur 10
ainsi qu'une critique personnelle.</li>
<li>Chaque ouvrage aura sa propre page avec ses caractéristiques. Tous les utilisateurs pourront
voir combien de personnes ont envie de le lire, sont en train de le lire ou l'ont déjà lu ainsi que les critiques.</li>
<li>Un utilisateur inscrit pourra voir en page d'accueil l'actualité de son agenda de contact et
les dernières critiques des autres utilisateurs.</li>
</ul>

<p>Ceci n'est qu'une simple liste non exhaustive de ce que proposera cette application. Elle sera
donc amené à évoluer au fil du développement. La branche <strong>main</strong> ne présentera que
la version fonctionnelle. Si vous voulez tester, placez vous sur la branche <strong>dev</strong>.</p>

<p><u>Ne prenez pas peur, le front-end n'est ici pour l'instant que pour les tests mais ne représente
aucunement le design du produit final.</u></p>

<hr><h3>Patch notes</h3><hr>

<em>Version 0.1.3</em>
<ul>
<li>Il est possible de s'inscrire sur l'application. Un email de confirmation est envoyé et la
connexion à son compte personnel est fonctionnelle. <em>(Pour changer le rôle à l'inscription,
il faut le changer directement dans le controller)</em></li>
<li>Il est possible d'ajouter :
<ul>
<li>Un auteur</li>
<li>Un illustrateur</li>
<li>Un éditeur</li>
<li>Une saga</li>
</ul>
</li>
<li>Il également possible d'ajouter un ouvrage. Ce dernier créé peut désormais être lié à chaque 
entité pouvant lui être attribué comme ci-dessus.</li>
<li>Un ouvrage pouvant combiner plusieurs genres, ces derniers sont désormais présentés
sous forme de checkbox.</li>
</ul>

<hr>