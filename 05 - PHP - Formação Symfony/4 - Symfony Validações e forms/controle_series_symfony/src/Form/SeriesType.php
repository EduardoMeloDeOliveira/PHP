<?php

namespace App\Form;

use App\Entity\Series;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeriesType extends AbstractType
{
    //tirando os submit o formulario funciona mais ou menos como mandar uma request usando o body do postman
    //os campos tem que ter o exato mesmo nome do atributo da classe!
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', options: ['label' => 'Nome'])
            ->add('submit', SubmitType::class, ['label' => 'Adicioanr'])
            ->setMethod($options['is_edit'] ? 'PUT' : 'POST' )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Series::class,
            'is_edit' => false,
        ]);
    }
}
