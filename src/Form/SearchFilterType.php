<?php

namespace App\Form;

use App\Entity\Cars;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SearchFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder


            ->add('From',RangeType::class,[
                'mapped' => false,  
                'attr' => [
                    
                    'class' => 'form-range',
                    'type' => 'range',
                    'id' => 'from',
                    'min'=> "100",
                    'max'=> "100000",
                    'step'=> "100",
                    'value' => "1000",
                ],
            ])

            ->add('To',RangeType::class,[
                'mapped' => false,  
                'attr' => [
                    
                    'class' => 'form-range',
                    'type' => 'range',
                    'id' => 'to',
                    'min'=> "100",
                    'max'=> "100000",
                    'step'=> "100",
                    'value' => "10000",
                ],
            ])        



            ->add('Used',CheckboxType::class,[
                'mapped' => false,  
                'attr' => [
                    
                    'class' => 'form-check-input ms-3',
                    'type' => 'checkbox',
                    'id' => 'flexCheckDefault',
                    
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cars::class,
        ]);
    }
}
