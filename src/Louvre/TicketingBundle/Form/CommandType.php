<?php

namespace Louvre\TicketingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Louvre\TicketingBundle\Form\UserType;
use Louvre\TicketingBundle\Form\TicketType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommandType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user',       UserType::class)
            ->add('dateVisit',      DateType::class, array(
                'widget'        => 'single_text',
                'html5'         => 'false',
                'attr'          => ['class' => 'js-datepicker'], 
                'label'         => 'Date de la visite',
                'format'        => 'yyyy/MM/dd'
            ))
            ->add('quantity',    IntegerType::class)
            ->add('tickets',     Collectiontype::class, array(
                'entry_type'    => TicketType::class,
                'allow_add'     => true,
                'allow_delete'  => true,
                'label'         => false
            ))
            ->add('Valider',    SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvre\TicketingBundle\Entity\Command'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'louvre_ticketingbundle_command';
    }


}
