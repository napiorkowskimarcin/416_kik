<?php

namespace App\Controller;

use App\Entity\GameStats;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GameStatsController extends AbstractController
{
    public function handleGame(Request $request): Response
    {
        if(isset($request->toArray()['id'])){
            $id = $request->toArray()['id'];

            $gameStats = $this->getDoctrine()
                ->getRepository(GameStats::class)
                ->find($id);

            return $this->json(['gameStats'=>$gameStats->getName()]);
        }
        else if(isset($request->toArray()['name'])){
            $name = $request->toArray()['name'];
            $entityManager = $this->getDoctrine()->getManager();
            $gameStats = new GameStats($name);
            $entityManager->persist($gameStats);
            $entityManager->flush();

        return $this->json(['message'=> 'created' ]);
        }
    }
}