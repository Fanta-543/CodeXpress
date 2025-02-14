<?php

namespace App\Form;

use App\Entity\Note;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Choose a title',
                'label_attr' => ['class' => 'text-violet-950 font-semibold'],
                'attr' => ['class' => 'border-2 border-violet-950 rounded-md p-2 w-full focus:border-violet-600'],
                'help' => 'This is the title of your note',
                'help_attr' => ['class' => 'text-sm text-violet-600'],
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Write your code',
                'label_attr' => ['class' => 'text-violet-950 font-semibold'],
                'attr' => ['class' => 'border-2 border-violet-950 rounded-md p-2 w-full focus:border-violet-600'],
                'help' => 'What do you want to share on CodeXpress?',
                'help_attr' => ['class' => 'text-sm text-violet-600'],
            ])
            ->add('is_public', CheckboxType::class, [
                'label' => 'Public or private',
                'label_attr' => ['class' => 'text-violet-950 font-semibold'],
                'attr' => ['class' => 'border-2 border-violet-950 rounded-md p-2 w-full focus:border-violet-600'],
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'label' => 'In which category?',
                'label_attr' => ['class' => 'text-violet-950 font-semibold'],
                'attr' => ['class' => 'border-2 border-violet-950 rounded-md p-2 w-full focus:border-violet-600'],
                'placeholder' => 'Choose a category',
                'help' => 'It will be used to sort your notes',
                'help_attr' => ['class' => 'text-sm text-violet-600'],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Create Note',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
