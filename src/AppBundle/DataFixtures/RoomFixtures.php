<?php
/**
 * Created by PhpStorm.
 * User: kris
 * Date: 14/12/17
 * Time: 14:58
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\PieceOfFurniture;
use AppBundle\Entity\Room;
use AppBundle\Entity\typeFurniture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class RoomFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // ajout de rooms
        $rooms = [
            "cuisine",
            "salon",
            "salle à manger",
            "salle de bain",
            "wc",
            "chambre 1",
            "chambre 2",
            "chambre 3",
            "garage",
            "entrée",
            "chambre 4",
        ];

        foreach ($rooms as $name) {
            $room = new Room();
            $room->setName($name);
            $manager->persist($room);
        }

        // ajout de types
        $typeFurnitures =
            ["Cartons",
            "Canapé",
            "Siège",
            "Tables",
            "Luminaires",
            "Décoration",
            "Meubles",
            "High Tech",
            "Electroménager",
            "Extérieur",
            "Loisirs",
            "Rangements",
            "Literie",
            "Autres",];

        $types = [];
        foreach ($typeFurnitures as $key => $name) {
            $typeFurniture = new TypeFurniture();
            $typeFurniture->setName($name);
            $manager->persist($typeFurniture);
            $types[] = $typeFurniture;
        }

        // ajout de pieces
        $pieceOfFurnitureCategories = [
            ["Grand carton (55 x 35 x 30 cm)", "Petit carton (35 x 27,5 x 30 cm)"],
            ["Canapé 2 places", "Canapé 3 places", "Canapé d'angle"],
            ["Chaise", "Pouf", "Tabouret", "Fauteuil"],
            ["Guéridon / Table d'appoint", "Table 2-4 personnes", "Table 6-8 personnes", "Table monastère en chêne", "Table Pliante", "Table Ronde"],
            ["Halogène", "Lampe à abat-jour", "Lustre"],
            ["Aquarium", "Miroir", "Tableau / Cadre", "Tapis"],
            ["Armoire 1 porte", "Armoire 2 Portes", "Armoire 3 Portes", "Armoire 4 portes / dressing", "Bar", "Bibliothèque", "Bibliothèque Lourde", "Buffet 2 corps", "Buffet bas"],
            ["Chaine Hi-Fi / Home cinema", "Enceinte HI/FI", "Ordinateur", "Petite imprimante", "Photocopieur bureau", "TV"],
            ["Aspirateur", "Cave à vin", "Climatiseur", "Congélateur", "Cuisinière", "Four", "Four micro-onde", "Frigo Américain", "Hotte"],
            ["Barbecue", "Brouette", "Caisse à outils", "Chaise longue", "Chaise longue", "Chaise PVC/extérieur"],
            ["Arbre à chats", "Babyfoot", "Balancelle", "Banc/appareil musculation", "Billard", "Canne à pêche", "Flipper", "Guitare"],
            ["Bac de rangement (50 x 60 x 40 cm maximum)", "Coffre / Malle / Cantine", "Pack 10 bouteilles", "Penderie 50cm linéaire", "Poubelle"],
            ["Chauffeuse", "Lit 1 place", "Lit 2 places", "Lit bébé", "Lit Mezzanine"],
            ["Rat empaillé"],
        ];


        foreach ($pieceOfFurnitureCategories as $key => $pieceOfFurnitureCategory) {
            foreach ($pieceOfFurnitureCategory as $furniture) {
                $pieceOfFurniture = new PieceOfFurniture();
                $pieceOfFurniture->setName($furniture);
                $pieceOfFurniture->setTypeFurniture($types[$key]);
                $manager->persist($pieceOfFurniture);
            }
        }

        $manager->flush();
    }

}
