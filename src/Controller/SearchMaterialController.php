<?php

namespace App\Controller;

use App\Entity\Materials;
use App\Form\SearchMaterialType;
use App\Repository\MaterialsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchMaterialController extends AbstractController
{
    /**
     * @Route("/search/material", name="search_material")
     */
    public function search(Request $request, MaterialsRepository $materialsRepository): Response
    {
        $materials = new Materials();
        $form = $this->createForm(SearchMaterialType::class, $materials);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $type = $materials->getType() ?? '';
            $trademark = $materials->getTrademark() ?? '';
            $model = $materials->getModel() ?? '';
            $year = $materials->getYear();
            $materials = $materialsRepository->search($type, $trademark, $model, $year);
        }
        return $this->render('search_material/index.html.twig', [
            'form' => $form->createView(),
            'materials' => $materials,
        ]);
    }
}
