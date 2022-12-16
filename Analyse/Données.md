# Offre
id
date_reception
nom_donateur
prenom_donateur
telephone_donateur *15 caractères imposés par la norme E.164. VARCHAR pour accomoder le +. Aucun traitement réalisé sur ces numéros donc nous pouvons nous permettre un format souple.*
mail_donateur *RF 3696*
description **Quelle longueur pour la description ?**
etat **Comment le gérer ? Entité état avec 3 entrées "Oui / Non / En cours" ? Si nous utilisons l'héritage (offre -> don) ?**

# Objet
reference **Il s'agit d'un id, mais le terme métier employé est référence. Nous partons du principe qu'il n'est pas renseigné à la main. Aucune contrainte particulière n'est donnée pour les référence, donc int auto_increment**
description *Pas dans la demande, mais pourrait être utile pour donner des détails sur un objet* **Quel longueur pour la description ?**


# type_materiel
**Comment gérer les sous-catégories ? Literie -> Sommier**

# caracteristique
libelle
**Comment gérer les valeurs et leur différent type ? Leur unité ?**
**IMPORTANT : Relier caracteristique a type_materiel ? Des couverts n'ont pas besoin de dimensions ou de poids, contrairement à des meubles**
**Solution facile : un objet peut avoir n'importe-quelle caractéristique qui peuvent être laissé vide. Ce qui nous permet de coder en dur ce formulaire, voire de créer une entité par caractéristique**

# don
date_acceptation

# membre
nom
prenom

# transport
date_previsionnelle
date_transport *Si renseigné, le transport à eu lieu*

# vehicule
libelle
*Possibilité d'évolution : plus de données sur les véhicules et les transports, comme le kilométrage, le niveau de carburant...*

# destination
**Il est peut-être trop difficile de gérer les stocks avec les transports**

# type_destination
type *bénéficiaire, garde meubles, dépôt-vente*