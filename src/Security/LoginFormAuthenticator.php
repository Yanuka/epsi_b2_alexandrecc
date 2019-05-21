<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class LoginFormAuthenticator extends AbstractGuardAuthenticator
{
    public function supports(Request $request)
    {
        // Bon en fait cet authentificator sert à rien parce que je l'ai pas rempli, donc j'en ai fait un autre
    }

    public function getCredentials(Request $request)
    {
        // Et je peux pas le supprimer parce que ça fait tout planter sinon
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // Du coup vu qu'il est vide, je me permets de le remplir
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // Et je suis sur que ces commentaires passeront inaperçus, ou peut-etre pas ???
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        // Sérieux tu continues de me lire ? C'est gentil mais bon tu perds ton temps quoi...
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // En vrai tes cours étaient vachement bien, tu m'as fait apprécier le fait de bosser sur du web, donc bien joué !
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        // Nan sérieux ! C'etait vachement sympa de bosser sur tes cours, tu as bien géré  malgré le fait que tu penses l'inverse :'(
    }

    public function supportsRememberMe()
    {
        // Si tu as lu, envoies moi un MP sur slack :D
    }
}
