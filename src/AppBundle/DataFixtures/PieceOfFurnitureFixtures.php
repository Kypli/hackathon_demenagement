<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\typeFurniture;
use AppBundle\Entity\PieceOfFurniture;

class PieceOfFurnitureFixtures
{
    public function load(ObjectManager $manager)
    {
        $pieceOfFurnitures = [
            0 => ["Grand carton", "Petit carton"],
            1 => ["Canapé 2 places", "Canapé 3 places", "Canapé d'angle"],
            2 => ["Chaise", "Pouf", "Tabouret", "Fauteuil"],
            3 => ["Guéridon", "Table 2-4 personnes", "Table 6-8 personnes", "Table monastère", "Table Pliante", "Table Ronde"],
            4 => ["Halogène", "Lampe à abat-jour", "Lustre"],
            5 => ["Aquarium", "Miroir", "Tableau / Cadre", "Tapis"],
            6 => ["Armoire 1 porte", "Armoire 2 Portes", "Armoire 3 Portes", "Dressing", "Bar", "Bibliothèque", "Bibliothèque Lourde", "Buffet 2 corps", "Buffet bas"],
            7 => ["Chaine Hi-Fi / Home cinema", "Enceinte HI/FI", "Ordinateur", "Petite imprimante", "Photocopieur bureau", "TV"],
            8 => ["Aspirateur", "Cave à vin", "Climatiseur", "Congélateur", "Cuisinière", "Four", "Four micro-onde", "Frigo Américain", "Hotte"],
            9 => ["Barbecue", "Brouette", "Caisse à outils", "Chaise longue", "Chaise longue", "Chaise PVC/extérieur"],
            10 => ["Arbre à chats", "Babyfoot", "Balancelle", "Appareil musculation", "Billard", "Canne à pêche", "Flipper", "Guitare"],
            11 => ["Bac de rangement", "Coffre / Malle / Cantine", "Pack 10 bouteilles", "Penderie", "Poubelle"],
            12 => ["Chauffeuse", "Lit 1 place", "Lit 2 places", "Lit bébé", "Lit Mezzanine"]
        ];
        $typeFurnitures = $manager->getRepository(typeFurniture::class)->findAll();

        foreach ($typeFurnitures as $typeFurnitureKey => $typeFurniture) {
            foreach ($pieceOfFurnitures[$typeFurnitureKey] as $pieceOfFurnitureName) {
                $pieceOfFurniture = new PieceOfFurniture();
                $pieceOfFurniture->setName($pieceOfFurnitureName);
                $pieceOfFurniture->setTypeFurniture($typeFurniture);
                $manager->persist($pieceOfFurniture);
                $manager->flush();

//                $this->addReference('pieceOfFurniture-news', $pieceOfFurniture);
            }
        }


    }

    public function getOrder()
    {
        return 3;
    }
}