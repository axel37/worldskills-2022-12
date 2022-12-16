<?php

namespace App\Form;

use App\Entity\Etat;
use App\Entity\Objet;
use App\Entity\Offre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateReception', DateType::class, [
                'widget' => 'single_text',
                'input'  => 'datetime_immutable'
            ])
            ->add('nomDonateur')
            ->add('prenomDonateur')
            ->add('telephoneDonateur', TextType::class, [
                'help' => 'Entre 10 et 15 caractères.'
            ])
            ->add('mailDonateur')
            ->add('description')
            ->add('etat', EntityType::class, [
                'class' => Etat::class
            ])
            ->add('objets', LiveCollectionType::class, [
                'entry_type' => ObjetSimpleType::class,
                // 'entry_options' => [
                //     'class' => Objet::class
                // ],
                'allow_add' => true,
                'allow_delete' => true,
                'button_add_options' => [
                    'label' => 'Nouvel objet',
                    'attr' => ['class' => 'btn btn-primary']
                ],
                'button_delete_options' => [
                    'label' => 'Supprimer l\'objet',
                    'attr' => ['class' => 'btn btn-danger']
                ],
                // 'constraints' => [
                //     new Count(['min' => 1, 'minMessage' => 'Une offre de don doit proposer des objets.']),
                // ]
            ])
            ->add('enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
