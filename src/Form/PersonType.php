<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Person;

class PersonType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add("Name", TextType::Class, [
                "label"=>"Person Name"
            ])
            ->add("Phone", TextType::Class, [
                "label"=>"Phone Number"
            ])
            ->add("submit", SubmitType::Class, [
                'label'=>"Full Send",
                'attr'=>[
                    "data-example"=>"asdf12345",
                    "class"=>"button"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(['data_class'=>Person::Class]);
    }
}
 ?>
