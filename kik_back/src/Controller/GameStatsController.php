<?php

namespace App\Controller;

use App\Entity\GameStats;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class GameStatsController extends AbstractController
{
    public function handleGame(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        if(isset($request->toArray()['id'])){
            
            $id = $request->toArray()['id'];
            $gameStats = $entityManager
                ->getRepository(GameStats::class)
                ->find($id);
                
            $clicked = $request->toArray()['clicked'];
            if($clicked ==='a1'){
                $currentValue = $gameStats->getA1();
                if($currentValue===NULL){
                $gameStats->setA1(true);
                $entityManager->flush();
                }
            }
            if($clicked ==='a2'){
                $currentValue = $gameStats->getA2();
                if($currentValue===NULL){
                $gameStats->setA2(true);
                $entityManager->flush();
                }
            }
            if($clicked ==='a3'){
                $currentValue = $gameStats->getA3();
                if($currentValue===NULL){
                $gameStats->setA3(true);
                $entityManager->flush();
                }
            }
            if($clicked ==='b1'){
                $currentValue = $gameStats->getB1();
                if($currentValue===NULL){
                $gameStats->setB1(true);
                $entityManager->flush();
                }
            }
            if($clicked ==='b2'){
                $currentValue = $gameStats->getB2();
                if($currentValue===NULL){
                $gameStats->setB2(true);
                $entityManager->flush();
                }
            }
            if($clicked ==='b3'){
                $currentValue = $gameStats->getB3();
                if($currentValue===NULL){
                $gameStats->setB3(true);
                $entityManager->flush();
                }
            }
            if($clicked ==='c1'){
                $currentValue = $gameStats->getC1();
                if($currentValue===NULL){
                $gameStats->setC1(true);
                $entityManager->flush();
                }
            }
            if($clicked ==='c2'){
                $currentValue = $gameStats->getC2();
                if($currentValue===NULL){
                $gameStats->setC2(true);
                $entityManager->flush();
                }
            }
            if($clicked ==='c3'){
                $currentValue = $gameStats->getC3();
                if($currentValue===NULL){
                $gameStats->setC3(true);
                $entityManager->flush();
                }
            }
            

            return $this->json([
                'message'=>'updated',
                 'clicked'=>$clicked,
                 'game'=>$gameStats->getGame(),
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
        return  $this->json($request->toArray());
    }
}