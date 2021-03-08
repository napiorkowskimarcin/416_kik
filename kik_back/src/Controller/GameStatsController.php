<?php

namespace App\Controller;


use App\Entity\GameStats;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GameStatsController extends AbstractController
{
    public function startGame(Request $request): Response{
        $name = $request->toArray()['name'];
        
        try{
            $entityManager = $this->getDoctrine()->getManager();
        $gameStats = new GameStats($name);
        $entityManager->persist($gameStats);
        $entityManager->flush();
            
        return $this->json([
            'name'=> $name,
            'id' =>$gameStats->getId(),
             ]);
             
        } catch(\Exception $e) {
            error_log($e->getMessage());
        }
        
     }

    public function handleGame(Request $request): Response
    {
        
        if(isset($request->toArray()['id'])){
            $entityManager = $this->getDoctrine()->getManager();

            $clicked = $request->toArray()['clicked'];
            $id = $request->toArray()['id'];
            $value = $request->toArray()['value'];
            try{
                 $gameStats = $entityManager
                ->getRepository(GameStats::class)
                ->find($id);
            
            switch($clicked){
                case 'a1':
                     $gameStats->setA1($value);
                     break;
                case 'a2':
                     $gameStats->setA2($value);
                     break;
                case 'a3':
                     $gameStats->setA3($value);
                     break;
                case 'b1':
                     $gameStats->setB1($value);
                     break;
                case 'b2':
                     $gameStats->setB2($value);
                     break;
                case 'b3':
                     $gameStats->setB3($value);
                     break;
                case 'c1':
                     $gameStats->setC1($value);
                     break;
                case 'c2':
                     $gameStats->setC2($value);
                     break;
                case 'c3':
                     $gameStats->setC3($value);
                     break;
            }
            
            $entityManager->flush();
            return $this->json([
                'message'=>'updated',
                 'clicked'=>$clicked,
                 'game'=>$gameStats->getGame(),
            ]);

            }catch(\Exception $e){
                error_log($e->getMessage());
            }
           
        }
    }
     
     public function saveGameResult(Request $request): Response{
        $result = $request->toArray()['result'];
        $id = $request->toArray()['id'];
        try{
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
        } catch(\Exception $e){
                error_log($e->getMessage());
        }
       
     }
}