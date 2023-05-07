<?php

namespace App\Form;

use App\Entity\LessonNote;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessonNoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('my_lesson')
            ->add('my_lesson_part')
            ->add('my_lesson_memo',TextareaType::class, [
        'attr' => array('style' => 'width: 100%','rows' => '15','placeholder' => 'Write here')])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LessonNote::class,
        ]);
    }
}
