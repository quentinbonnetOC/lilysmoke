<?php
namespace App\Form\Type;

use App\Entity\Ato;
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


class AtoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('length', TextType::class, [
                'label' => 'Longueur : '
            ])
            ->add('diameter', TextType::class, [
                'label' => 'Diamètre :'
            ])
            ->add('capacity', TextType::class, [
                'label' => 'Capacité : '
            ])
            ->add('resistance', TextType::class, [
                'label' => 'Résistance : '
            ])
            ->add('filling', TextType::class, [
                'label' => 'Remplissage : '
            ])
            ->add('airflow', TextType::class, [
                'label' => 'Airflow : ',
                'required' => false,
            ])
            ->add('product', HiddenType::class, [
                
                ])
            ->add('submit', SubmitType::class, [
                'label' => 'envoyer'
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ato::class,
            'attr' => ['id' => 'atoForm'],
            
        ]);
    }
}