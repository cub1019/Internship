<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use App\Form\PersonType;
    use App\Entity\Person;

    /**
    * @Route("/person")
    */
    class PersonController extends AbstractController {
      /**
      * @Route("/modify/{id}", defaults={"id"=0})
      */
      public function ModifyAction(Request $request, $id) {
$person = ($id ? $this->getDoctrine()->getRepository("App:Person")->find($id) : new Person);
$em = $this->getDoctrine()->getManager();
$form = $this->createForm(PersonType::Class, $person);
$form->handleRequest($request);
if($form->isSubmitted() && $form->isValid()){
    $data = $form->getData();
    $this->getDoctrine()->getManager()->persist($data);
              $this->getDoctrine()->getManager()->flush();
    return $this->redirect("/tasks/");
}
return $this->render("person/add.html.twig", ["form"=>$form->createView()]);
}
    }


    ?>
