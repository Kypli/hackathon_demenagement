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
            'attr' => array('class' => 'selector'),
            'label' => 'Mon déménagement se fait via : ',
            'choices' => array(
                'Choisir une option' => '0',
                'Appartement' => array(
                    'Studio' => '1',
                    '2 pièces' => '1',
                    '3 pièces' => '1',
                    '4 pièces' => '1',
                ),
                'Maison' => array(
                    '3 pièces' => '2',
                    '4 pièces' => '2',
                    '5 pièces' => '2',
                ),
                'Inventaire libre' => array(
                    'A faire soi-même' => '3',
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