<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonLikeProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('person', 'autocomplete', array('class' => 'AppBundle:Person', 'required' => false))
            ->add('product', 'autocomplete', array('class' => 'AppBundle:Product', 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PersonLikeProduct'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_personlikeproduct';
    }
}
