<?php

namespace App\Form;

use App\Entity\Minecraft;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MinecraftType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

//        var_dump($options['blocksRepo']);
        $Minecraft = new Minecraft();
        $builder
            ->add('Name')
            ->add('Age')
            ->add('comment')
//            ->add('blocks', ChoiceType::class, [
//                       'choices' => $options['blocksRepo'],
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'blocksRepo'=>1,
            'data_class' => Minecraft::class,
        ]);
    }
}
