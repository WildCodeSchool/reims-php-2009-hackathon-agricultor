<?php

namespace App\Form;

use App\Entity\Materials;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MaterialsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => 'Type',
                'placeholder' => 'Type d\'engin',
                'required' => true,
                'choices' => [
                    'Tracteur' => 'Tracteur',
                    'Moissonneuse-batteuse' => 'Moissonneuse-batteuse',
                    'Epandeur' => 'Epandeur',
                ],
            ])
            ->add('trademark')
            ->add('model')
            ->add('year')
            ->add('kilometer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Materials::class,
        ]);
    }
}
