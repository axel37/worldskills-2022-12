# Offre (proposition)
Les propositions sont étudiées puis acceptées ou refusées (Oui / Non / En cours de traitement).
Une proposition acceptée devient un don.

Une offre a une date de réception.
Une offre indique les coordonnées deu donateur potentiel : Nom, téléphone, adresse mail.
Une offre contient une description complémentaire.
Une offre acceptée l'est pour tous les objets. Il n'est pas possible de n'accepter qu'une partie des objets.

# Donateur
**Serait-il utile d'avoir une entité donnateur ? Notamment pour les statistiques. Plusieurs donnateurs pourraient avoir le même nom. Cela complique en revanche l'utilisation de l'application... Devoir d'abord ajouter un donnateur, plutôt que de simplement remplir un formulaire de don.**

# Don
**"gérer précisément la traçabilité de tous les dons acquis"**
Un don concerne un ou plusieurs objets
Tous les objets d'un don sont stockés.
Les dons ont un historique.

Une offre acceptée, devenue don, doit contenir des informations supplémentaires.
La date d'acceptation du don est indiquée.
Le don indique quel membre de l'association à accepté le don.
Un don peut nécessiter le transport des objets.
Un don nécessitant un transport indique les transporteurs. *Je considère que transporteur = membre*
Un don nécessitant un transport indique une date de transport.
Un don nécessitant un transport indique les véhicules utilisés. *Laisse à penser que le transporteur est un membre de l'association*

Un don renseigne un lieu de stockage prévu pour chaque objet. **Un objet peut donc être stocké ou en attente de stockage, avec une destination ?**


# Objet
Un objet a une référence unique.
Un objet est d'un type particulier. **Catégories / sous-catégories. Comment gérer ses dernières ?**
Un objet a des caractéristiques.
Un objet peut être transporté (plusieurs fois).
Un objet est en stock après acceptation d'une offre de don. **Sauf s'il s'agit d'un don direct ?**
Un objet sort du stock quand il est donné ou vendu.
Un objet est stocké dans une destination.
**Notions de mouvement de stock : réception, transport, sortie (don / vente). Le transport serait-il donc un type de mouvement ? Il s'agit là d'un élément d'historique / de traçabilité.**
Un objet peut avoir des photos.


# Transport *(une entité à part entière semble être pertinente)*
**Les transports semblent être réalisés par des membres de l'association. Il est souvent demandé les véhicules utilisés ainsi que le "transporteur"...**
**Un transport concerne-t-il un don ou des objets ??**


# Stock
**Serait-il utile d'avoir une entité stock ? Objet + emplacement... ou récupérer cette information directement depuis objet ?**

# Vente
**Serait-il utile d'avoir une entité vente ? Objet + date + vendeur + prix... Attention, une vente = sortie de stock (= mouvement ?)**

# Garde meubles
Un objet peut être stocké au garde meubles.
Un objet stocké au garde meubles a une date de dépôt.
Un objet stocké au garde meubles peut être récupéré par une personne. **Bénéficiaire  ?**

# Dépôt-vente
Un dépôt-vente est une entreprise partenaire.
L'application doit être en mesure de gérer plusieurs dépôts-ventes.
Un objet stocké au dépôt-vente voit sa valeur estimée.
Un objet stocké au dépôt-vente peut être vendu.
Un objet vendu conserve une date de vente.
Un objet vendu indique le montant reversé à l'association (10% du prix de vente).

# Don direct / Objet donné à une personne en difficulté
**Est-il possible pour un don d'être directement transféré d'un donateur à un bénéficiaire ? Doit-il forcément passer par un lieu de stockage ? Il semble que les deux cas sont possibles. VOIR QUESTION SUIVANTE**
Un don peut être fait directement à un bénéficiaire.
**Le sujet reprend les "informations générales sur le don" = il s'agirait d'un don fait spécifiquement à un bénéficiaire ? Pas seulement un transfert d'objets**
Un don direct est un don (objets, description, etc).
Un don direct prévoit un transport entre le donateur et le bénéficiaire (date, transporteurs, véhicules).
Un don direct indique un nom de demandeur (organisme ou particulier).
Un don direct indique un nom de bénéficiaire, un téléphone et une adresse.