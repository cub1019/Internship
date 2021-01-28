<?php
    namespace App\Form;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Bridge\Doctrine\Form\Type\EntityType;
    use App\Entity\Task;
    use App\Entity\Person;
    use App\Entity\Category;


    class TaskType extends AbstractType {
        public function buildForm(FormBuilderInterface $builder, array $options){
            $builder
                ->add("title", TextType::Class, [
                    'label'=>"Title",
                    'attr' => [ 'style' => 'width: 500px;']
                ])
                ->add("description", TextType::Class, [
                    'label'=>"Description",
                    'attr' => [ 'style' => 'width: 500px;']
                ])
                ->add("due", DateTimeType::Class, [
                    'label'=>"Due Date",
                    'attr' => [ 'style' => 'width: 500px;']
                ])
                ->add("category", EntityType::Class, [
                  'label'=>'Submit',
                  'class'=>Category::Class,
                  'choice_label'=>"name",
                  'multiple'=>true,
                  'required'=>false
                ])
                ->add("people", EntityType::Class, [
                  'label'=>"Assigned",
                  'class'=>Person::Class,
                  'choice_label'=>'name',
                  'multiple'=>true
                ])
                ->add("submit", SubmitType::Class, [
                    'label'=>'Submit',
                    'attr'=>[
                        'class'=>'button'
                    ]
                ]);
        }

        public function configureOptions(OptionsResolver $resolver){
            $resolver->setDefaults(['data_class'=>Task::Class]);
        }
    }


?>
