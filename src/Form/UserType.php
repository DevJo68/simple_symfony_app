<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class UserType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options) : void
  {
      $builder
      ->add('name',TextType::class)
      ->add('email',EmailType::class)
      ->add('save', SubmitType::class)
      ->add('date', DateType::class)
      ;
  }
  
}