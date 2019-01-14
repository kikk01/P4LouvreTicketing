<?php

namespace Louvre\TicketingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class VisitorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',       TextType::class, array(
                'label' => 'Prénom du visiteur'
            ))
            ->add('surename',   TextType::class, array(
                'label' => 'Nom du visiteur'
            ))
            ->add('country',    CountryType::class, array(
                'label' => 'pays'
            ))
            ->add('dateBirth',      DateType::class, array(
                'widget'        => 'single_text',
                'html5'         => 'false',
                'attr'          => ['class' => 'js-datepickerBirth'],
                'label'         => 'Date de naissance',
                'format'        => 'yyyy/MM/dd'
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvre\TicketingBundle\Entity\Visitor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'louvre_ticketingbundle_visitor';
    }


}
