<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EstateType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('estate', ChoiceType::class, array(
            'label' => 'Mon déménagement se fait via: ',
            'choices' => array(
                'Choisir une option' => '',
                'Appartement' => array(
                    'Studio' => '',
                    '2 pièces' => '',
                    '3 pièces' => '',
                    '4 pièces' => '',
                ),
                'Maison' => array(
                    '3 pièces' => '',
                    '4 pièces' => '',
                    '5 pièces' => '',
                ),
                'Inventaire libre' => array(
                    'A faire soi-même' => '',
                ),
            ),
        ));
    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function configureOptions(OptionsResolver $resolver)
//    {
//        $resolver->setDefaults(
//            array(
//                'data_class' => 'AppBundle\Entity\Specimen'
//            )
//        );
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function getBlockPrefix()
//    {
//        return 'appbundle_specimen';
//    }
}