<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonType extends AbstractType
{
    
    private $_stateChoices;

    public function __construct($stateChoices){
        $this->_stateChoices = $stateChoices;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if(empty($this->_stateChoices))
        {
            throw new \Exception('person state array is empty');
        }
        
        $builder
            ->add('login')
            ->add('lName')
            ->add('fName')
            ->add('state','choice',array(
                'choices' => $this->_stateChoices,
            ))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Person'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_person';
    }
}
