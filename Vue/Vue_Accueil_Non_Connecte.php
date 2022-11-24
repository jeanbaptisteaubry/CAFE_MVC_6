<?php

function Vue_Accueil_Non_Connecte()
{
    echo "
    <form>
            <H1>Bienvenue sur cafe.com !</H1>
            <p>blablablablbalba</p> 
            <P>Si vous ne disposez pas de compte : 
            
                <input type='hidden' name='case' value='Accueil'>
                <button type='submit' name='action' value='SInscrire'>S'inscrire</button>
            
            
           </P> 
            <P>Si vous disposez d'un compte 
                    <button type='submit' name='action' value='SeConnecter'>Se connecter</button>
           </P> 
   </form>
   ";


}