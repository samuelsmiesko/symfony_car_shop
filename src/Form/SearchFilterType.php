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


            ->add('Price',RangeType::class,[
                'mapped' => true,  
                'attr' => [
                    
                    'class' => 'form-range',
                    'type' => 'range',
                    'id' => 'customRange',
                    
                    'min'=> "100",
                    'max'=> "100000",
                    'step'=> "100",
                    
                    
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
