<?php

namespace App\Form;

use App\Entity\Etat;
use App\Entity\TypeMateriel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', EntityType::class, [
                'help' => 'N\'afficher que le objets de ce type',
                'required' => false,
                'class' => TypeMateriel::class,
                'placeholder' => 'Indifférent',
            ])
            ->add('texte', TextType::class, [
                'label' => 'Description',
                'help' => 'Rechercher dans la description de l\'objet.',
                'required' => false,
            ])
            ->add('etat', EntityType::class, [
                'class' => Etat::class,
                'label' => 'État de l\'offre',
                'required' => false,
            ])
            ->add('rechercher', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
