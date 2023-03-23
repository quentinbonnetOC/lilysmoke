<?php
namespace App\Form\Type;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class TriType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          
            ->add('option2', ChoiceType::class, [
                'attr'   =>  array(
                    'class'   => 'toto'),
                'label' => false,
                'mapped' => false,
                'required' => false,
                'placeholder' => 'Tri',
                'choices' => [
                    'Prix croissant' => 'a',
                    'Prix décroissant' => 'b',
                    'A-Z' => 'c',
                    'Z-A' => 'd',
                ]
            ])  
            ->setMethod('GET') 
        ;
    }
}