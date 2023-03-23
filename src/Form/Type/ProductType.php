<?php
namespace App\Form\Type;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Validator\Constraints\File;


class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => 'Type : ',
                'choices' => [
                    '' => '',
                    'e-liquide' => 'eliquid',
                    'ecig' => 'ecig',
                    'ato' => 'ato',
                    'accessory' => 'accessoire',
                    'diy' => 'diy',
                    'fullKit' => 'fullKit'
                ]
            ])   
            ->add('price', TextType::class, [
                'label' => 'Prix : ',
            ])
            ->add('brand', TextType::class, [
                'label' => 'Marque : '
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom : '
            ])
            ->add('image', FileType::class, [
                'label' => 'Image : ',
                'attr' => array('placeholder' => 'Choisissez un fichier'),
                'multiple' => true,
                'mapped' => false,
                'data_class' => null 
            ])
            ->add('description', TextType::class, [
                'label' => 'Description :'
            ])
            ->add('shortDescription', TextType::class, [
                'label' => 'Description courte :'
            ])
            ->add('nouveau', CheckboxType::class, [
                'label' => 'Nouveauté',
                'required' => false
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            
        ]);
    }
}