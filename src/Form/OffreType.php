<?php

namespace App\Form;

use App\Entity\Etat;
use App\Entity\Offre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateReception')
            ->add('nomDonateur')
            ->add('prenomDonateur')
            ->add('telephoneDonateur')
            ->add('mailDonateur')
            ->add('description')
            ->add('etat', EntityType::class, [
                'class' => Etat::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
