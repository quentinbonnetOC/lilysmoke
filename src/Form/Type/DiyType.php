<?php
namespace App\Form\Type;

use App\Entity\Diy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class DiyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('collection', TextType::class, [
                'label' => 'Collection : '
            ])
            ->add('Dominant_notes', TextType::class, [
                'label' => 'Notes dominantes : '
            ])
            ->add('Flavour', ChoiceType::class, [
                'label' => "Saveur: ",
                'choices' => [
                    'classique' => 'classique',
                    'classique gourmand' => 'classique_gourmand',
                    'gourmand' => 'gourmand',
                    'fruité' => 'fruite',
                    'fruité frais' => 'fruite_frais',
                    'mentholé' => 'menthol',
                    'classique mentholé' => 'classique_menthol'
                ]
            ])
            ->add('TypeOfAroma', TextType::class, [
                'label' => "Type d'arome"
            ])
            ->add('PG', TextType::class, [
                "label" => "PG : ",
            ])
            ->add('VG', TextType::class, [
                "label" => "VG : "
            ])
            ->add('TypeOfNicotine', ChoiceType::class, [
                'label' => 'Type de nicotine : ',
                'choices' => [
                    'classique' => 'classique',
                    'sel' => 'sel',
                    'CBD' => 'CBD',
                    'Base' => 'Base'
                ],
                'expanded' => true
            ])
            ->add('water', TextType::class, [
                'label' => "présence d'eau"
            ])
            ->add('addedAlcohol', TextType::class, [
                'label' => "présence d'alcool ajouté"
            ])
            ->add('recommendedDosage', TextType::class, [
                'label' => "dosage recommandé"
            ])
            ->add('maturationTime', TextType::class, [
                'label' => "temps de maturation"
            ])
            ->add('Nicotine', TextType::class, [
                'label' => 'Taux de nicotine'
            ])
            ->add('Capacity', TextType::class, [
                'label' => 'Contenance : ',
            ])
            ->add('Origin', TextType::class, [
                'label' => 'Origine :    ',
            ])
            ->add('product', HiddenType::class, [
                
                ])
            ->add('submit', SubmitType::class, [
                'label' => 'Create Task'
            ])
            
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Diy::class,
            'attr' => ['id' => 'diyForm'],

            
        ]);
    }
}