<?php

namespace ApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use ApiBundle\Entity\Claim;

class ClaimType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add( "category" )
            ->add( "title" )
            ->add( "zip" )
            ->add( "city" )
            ->add( "description" )
            ->add( "due_date" );

        $builder->get( "due_date" )->addModelTransformer( new CallbackTransformer( function ( $date ) {
            return $date;
        }, function ( $date ){
            return new \DateTime($date);
        } ));
    }

    public function configureOptions( OptionsResolver $resolver )
    {
        $resolver->setDefaults( [
            'data_class'      => Claim::class,
            'csrf_protection' => false
        ] );
    }
}