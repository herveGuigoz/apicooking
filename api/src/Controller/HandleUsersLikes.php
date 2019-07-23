<?php


namespace App\Controller;

use App\Entity\Users;
use App\Repository\RecipeRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class HandleUsersLikes extends AbstractController
{
    private $recipeRepository;
    private $tokenStorage;
    private $manager;

    public function __construct(RecipeRepository $recipeRepository, TokenStorageInterface $tokenStorage, ObjectManager $manager)
    {
        $this->recipeRepository = $recipeRepository;
        $this->tokenStorage = $tokenStorage;
        $this->manager = $manager;
    }

    public function favourites(Request $request)
    {
        if (!$token = $this->tokenStorage->getToken()) {
            $response = new JsonResponse(['error' => 'Vous devez être connecté pour liker une recette']);
            return $response;
        }

        $user = $token->getUser();

        if (!$user instanceof Users) {
            $response = new JsonResponse(['error' => 'Un problème est survenu, veuillez réessayer plus tard']);
            return $response;
        }

        $recipeId = $request->get('recipe');

        if(!$recipe = $this->recipeRepository->find($recipeId)){
            $response = new JsonResponse(['error' => 'Un problème est survenu, veuillez réessayer plus tard']);
            return $response;
        }

        if (!$user->isFavorite($recipe)) {
            $recipe->addLiker($user);
            $this->manager->flush();
            $response = new JsonResponse(['added' => $recipe->getTitle()]);
            return $response;
        }

        $recipe->removeLiker($user);
        $this->manager->flush();
        $response = new JsonResponse(['removed' => $recipe->getTitle()]);
        return $response;
    }

}
