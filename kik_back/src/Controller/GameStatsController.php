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

            return $this->json([
                'name'=>$gameStats->getName(),
                'isGame'=>$gameStats->getIsGame(),
                'a1'=>$gameStats->getA1(),
                'a2'=>$gameStats->getA2(),
                'a3'=>$gameStats->getA3(),
                // 'b1'=>$gameStats->getB1(),
                // 'b2'=>$gameStats->getB2(),
                // 'b3'=>$gameStats->getB3(),
                // 'c1'=>$gameStats->getC1(),
                // 'c2'=>$gameStats->getC2(),
                // 'c3'=>$gameStats->getC3(),

            ]);
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