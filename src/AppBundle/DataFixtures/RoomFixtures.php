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
            $tabRooms[] = $room;
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

            ["Grand carton", "Petit carton"],
            ["Canapé 2 places", "Canapé 3 places", "Canapé d'angle"],
            ["Chaise", "Pouf", "Tabouret", "Fauteuil"],
            ["Guéridon", "Table 2-4 personnes", "Table 6-8 personnes", "Table monastère", "Table Pliante", "Table Ronde"],
            ["Halogène", "Lampe abat-jour", "Lustre"],
            ["Aquarium", "Miroir", "Tableau / Cadre", "Tapis"],
            ["Armoire 1 porte", "Armoire 2 Portes", "Armoire 3 Portes", "Armoire dressing", "Bar", "Bibliothèque", "Bibliothèque Lourde", "Buffet bas", "Buffet 2 corps"],
            ["Chaine Hi-Fi / Home cinema", "Enceinte HI/FI", "Ordinateur", "Petite imprimante", "Photocopieur", "TV"],
            ["Aspirateur", "Cave à vin", "Climatiseur", "Congélateur", "Cuisinière", "Four", "Four micro-onde", "Frigo Américain", "Hotte"],
            ["Barbecue", "Brouette", "Caisse à outils", "Chaise longue", "Chaise longue", "Chaise PVC/extérieur"],
            ["Arbre à chats", "Babyfoot", "Balancelle", "Banc de musculation", "Billard", "Canne à pêche", "Flipper", "Guitare"],
            ["Bac de rangement", "Coffre / Malle", "Pack 10 bouteilles", "Penderie 50cm", "Poubelle"],
            ["Chauffeuse", "Lit 1 place", "Lit 2 places", "Lit bébé", "Lit Mezzanine"],
            ["Rat empaillé"],
        ];


        foreach ($pieceOfFurnitureCategories as $key => $pieceOfFurnitureCategory) {
            foreach ($pieceOfFurnitureCategory as $furniture) {
                $pieceOfFurniture = new PieceOfFurniture();
                $pieceOfFurniture->setName($furniture);
                $pieceOfFurniture->setTypeFurniture($types[$key]);
                $random = rand(0,10);
                $pieceOfFurniture->setRoom($tabRooms[$random]);
                $manager->persist($pieceOfFurniture);
            }
        }

        $manager->flush();
    }

}
