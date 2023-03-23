<?php
namespace App\Form\Type;

use App\Entity\Fullkit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FullkitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dimension', TextType::class, [
                'label' => 'Dimension : ',
                // 'mapped' => false,
            ])
            ->add('power', TextType::class, [
                'label' => 'Puissance: ',
                // 'mapped' => false,
            ])
            ->add('battery', TextType::class, [
                'label' => 'Battery: ',
                // 'mapped' => false,
            ])
            ->add('autonomy', TextType::class, [
                'label' => 'Autonomie : ',
                // 'mapped' => false,
            ])
            ->add('length', TextType::class, [
                'label' => 'Longueur : ',
                // 'mapped' => false,
            ])
            ->add('diameter', TextType::class, [
                'label' => 'Diamètre :',
                // 'mapped' => false,
            ])
            ->add('capacity', TextType::class, [
                'label' => 'Capacité : ',
                // 'mapped' => false,
            ])
            ->add('resistance', TextType::class, [
                'label' => 'Résistance : ',
                // 'mapped' => false,
            ])
            ->add('filling', TextType::class, [
                'label' => 'Remplissage : ',
                // 'mapped' => false,
            ])
            ->add('airflow', CheckboxType::class, [
                'label' => 'Airflow : ',
                'required' => false,
                // 'mapped' => false,

            ])
            ->add('product', HiddenType::class, [
                'mapped' => false,
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