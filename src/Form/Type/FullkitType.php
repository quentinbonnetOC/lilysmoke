<?php
namespace App\Form\Type;

use App\Entity\Fullkit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FullkitType extends AbstractType
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
        ->add('power', TextType::class, [
            'label' => 'Puissance: '
        ])
        ->add('battery', TextType::class, [
            'label' => 'Battery: '
        ])
        ->add('autonomy', TextType::class, [
            'label' => 'Autonomie : '
        ])
        ->add('operation', TextType::class, [
            'label' => 'Fonctionnement : '
        ])
        ->add('height', TextType::class, [
            'label' => 'Hauteur : '
        ])
        ->add('width', TextType::class, [
            'label' => 'Largeur : '
        ])
        ->add('depth', TextType::class, [
            'label' => 'Profondeur : '
        ])
        ->add('matter', TextType::class, [
            'label' => 'Matière : '
        ])
        ->add('weight', TextType::class, [
            'label' => 'Poid : '
        ])
        ->add('typeOfBatteries', TextType::class, [
            'label' => 'Type de batterie : '
        ])
        ->add('numberOfBatteries', TextType::class, [
            'label' => "Nombre d'accu"
        ])
        ->add('rechargableByUsb', TextType::class, [
            'label' => 'Rechargeable par USB'
        ])
        ->add('rechargingConnectors', TextType::class, [
            'label' => 'Connectique de rechargement'
        ])
        ->add('maxPower', TextType::class, [
            'label' => 'Puissance maximum'
        ])
        ->add('inputVoltage', TextType::class, [
            'label' => "Tension d'entrée",
        ])
        ->add('outputVoltage', TextType::class, [
            'label' => "Tension de sortie"
        ])
        ->add('chargingVoltage', TextType::class, [
            'label' => "Tension de charge"
        ])
        ->add('chargingCurrent', TextType::class, [
            'label' => 'Courant de charge'
        ])
        ->add('compatibleResistance', TextType::class, [
            'label' => "Résistance compatible"
        ])
        ->add('product', HiddenType::class, [
            
        ])
        ->add('addIndividual', CheckboxType::class, [
            'label' => "Ajouté également l'ato et la ecig individuellement"
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'envoyer'
        ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fullkit::class,
            'attr' => ['id' => 'fullkitForm'],

        ]);
    }
}