<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EstateType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('estate', ChoiceType::class, array(
            'label_attr' => array('class' => 'selector_label'),
            'attr' => array('class' => 'selector'),
            'label' => ' ',
            'choices' => array(
                'Choisir une option' => '0',
                'Appartement' => array(
                    'Studio' => '1',
                    '2 pièces' => '2',
                    '3 pièces' => '3',
                    '4 pièces' => '4',
                ),
                'Maison' => array(
                    '3 pièces' => '5',
                    '4 pièces' => '6',
                    '5 pièces' => '7',
                ),
                'Inventaire libre' => array(
                    'A faire soi-même' => '8',
                ),
            ),
        ));
    }
}
