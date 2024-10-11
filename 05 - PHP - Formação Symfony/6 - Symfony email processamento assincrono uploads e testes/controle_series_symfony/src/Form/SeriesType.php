<?php

namespace App\Form;

use App\DTO\SeriesCreateFormInput;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class SeriesType extends AbstractType
{
    //tirando os submit o formulario funciona mais ou menos como mandar uma request usando o body do postman
    //os campos tem que ter o exato mesmo nome do atributo da classe!
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('seriesName', options: ['label' => 'Nome'])
            ->add('seasonsQuantity', type: NumberType::class, options: ['label' => 'Quantidade de temporadas'])
            ->add('episodesPerSeason', type: NumberType::class, options: ['label' => 'Quantidade de episódios por temporada'])
            ->add('coverImage', FileType::class, ['label' => 'Imagem de capa',
                'constraints' => [
                    new File([
                        'mimeTypes' => ['image/*'],
                    ])
                ],
                'required' => false,
            ])
            ->add('submit', SubmitType::class,
                $options['is_edit'] ? ['label' => 'Editar'] : ['label' => 'Adicionar'])
            ->setMethod($options['is_edit'] ? 'PUT' : 'POST');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SeriesCreateFormInput::class,
            'is_edit' => false,
        ]);
    }
}
