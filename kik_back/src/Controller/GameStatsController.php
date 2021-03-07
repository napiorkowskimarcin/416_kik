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
            $clicked = $request->toArray()['clicked'];
            $id = $request->toArray()['id'];
            $value = $request->toArray()['value'];

            $gameStats = $entityManager
                ->getRepository(GameStats::class)
                ->find($id);
                
            
            if($clicked ==='a1'){
                $currentValue = $gameStats->getA1();
                if($currentValue===NULL){
                $gameStats->setA1($value);
                }
            }
            if($clicked ==='a2'){
                $currentValue = $gameStats->getA2();
                if($currentValue===NULL){
                $gameStats->setA2($value);
                }
            }
            if($clicked ==='a3'){
                $currentValue = $gameStats->getA3();
                if($currentValue===NULL){
                $gameStats->setA3($value);
                }
            }
            if($clicked ==='b1'){
                $currentValue = $gameStats->getB1();
                if($currentValue===NULL){
                $gameStats->setB1($value);
                }
            }
            if($clicked ==='b2'){
                $currentValue = $gameStats->getB2();
                if($currentValue===NULL){
                $gameStats->setB2($value);
                }
            }
            if($clicked ==='b3'){
                $currentValue = $gameStats->getB3();
                if($currentValue===NULL){
                $gameStats->setB3($value);
                }
            }
            if($clicked ==='c1'){
                $currentValue = $gameStats->getC1();
                if($currentValue===NULL){
                $gameStats->setC1($value);
                }
            }
            if($clicked ==='c2'){
                $currentValue = $gameStats->getC2();
                if($currentValue===NULL){
                $gameStats->setC2($value);
                }
            }
            if($clicked ==='c3'){
                $currentValue = $gameStats->getC3();
                if($currentValue===NULL){
                $gameStats->setC3($value);
                } 
            } 
            $entityManager->flush();
            return $this->json([
                'message'=>'updated',
                 'clicked'=>$clicked,
                 'game'=>$gameStats->getGame(),
            ]);
        }
        return  $this->json($request->toArray());
    }
     public function startGame(Request $request): Response{
        $name = $request->toArray()['name'];
        $entityManager = $this->getDoctrine()->getManager();
        $gameStats = new GameStats($name);
        $entityManager->persist($gameStats);
        $entityManager->flush();
            
        return $this->json([
            'name'=> $name,
            'id' =>$gameStats->getId(),
             ]);
     }
     public function saveGameResult(Request $request): Response{
        $result = $request->toArray()['result'];
        $id = $request->toArray()['id'];
        $entityManager = $this->getDoctrine()->getManager();
        $gameStats = $entityManager
                ->getRepository(GameStats::class)
                ->find($id);
        $gameStats->setIsWin($result);
        $entityManager->flush();

        return $this->json([
            'name'=> $gameStats->getName(),
            'result' =>$gameStats->getIsWin(),
        ]);
     }
}