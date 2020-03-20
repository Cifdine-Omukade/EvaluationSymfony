<?php

namespace App\Form;

use App\Entity\Stat;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contamined',NumberType::class)
            ->add('healed', NumberType::class)
            ->add('zombified', NumberType::class)
            ->add('stat_date',DateTime::class)
            ->add('country',TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stat::class,
        ]);
    }
}
