<?php
function Vue_Connexion($msg = "")
{
    echo "
    <form>
            <H1>Cafe.com : se connecter</H1>
             <table>
                 <tr>
                    <td>Pseudo</td><td><input type='email' name='email'></td>
                 </tr>
                 <tr>
                    <td>Mot de passe</td><td><input type='password' name='motDePasse'></td>
                 </tr>
                 <tr>
                     <td>
                        <button type='submit' name='action' value='demandeReinitialisation'>Réinitialiser MDP</button>
                     </td>
                     <td>
                        <button type='submit' name='action' value='login'>Me connecter</button>
                    </td>
                </tr>
             
            </table>
           <br>
            <p>$msg</p>
               </form>
   ";


}