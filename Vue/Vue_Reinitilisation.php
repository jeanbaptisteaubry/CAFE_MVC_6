<?php
function Vue_Reinitilisation($msg = "")
{
    echo "
    <form>
            <H1>Cafe.com : réinitialiser mon Mot de passe</H1>
             <table>
                 <tr>
                    <td>Email</td><td><input type='email' name='email'></td>
                 </tr>
                 <tr>
                     <td>
                        <button type='submit' name='action' value='validerDemandeReinitialisation'>Réinitialiser MDP</button>
                     </td>
                 
                     <td>
                        <button type='submit' name='action' value='validerDemandeReinitialisationParToken'>Réinitialiser MDP par token</button>
                     </td>
                </tr>
            </table>
           <br>
            <p>$msg</p>
               </form>
   ";


}