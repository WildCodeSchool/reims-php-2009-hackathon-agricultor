<?php

namespace App\Form;

use App\Entity\Materials;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SearchMaterialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'tracteur' => 'tracteur',
                ]
            ])
            ->add('trademark', ChoiceType::class, [
                'choices' => [
                    'Lamborghini' => 'Lamborghini',
                ]
            ])
            ->add('model', ChoiceType::class, [
                'choices' => [
                    'Mach 230 VRT' => 'Mach 230 VRT',
                ]
            ])
            ->add('year', ChoiceType::class, [
                'choices' => [
                    2018 => 2018,
                ]
            ])
            ->add('kilometer', IntegerType::class, [
                'label' => 'Kilomètrage',
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Materials::class,
        ]);
    }
}
