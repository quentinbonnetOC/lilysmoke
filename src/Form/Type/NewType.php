<?php
namespace App\Form\Type;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class NewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          
            ->add('new', CheckboxType::class, [
                'label' => false,
                'mapped' => false,
                'required' => false,
            ])  
            ->setMethod('POST') 
        ;
    }
}