<?php
function Vue_ChangerMotDePasse($msg = "")
{
    echo "
    <form>
            <H1>Changer son mot de passe</H1>
             <table>
                 <tr>
                    <td>Ancien mot de passe</td><td><input type='password' name='ancienMotDePasse'></td>
                 </tr>
                 <tr>
                    <td>Nouveau mot de passe</td><td><input type='password' name='motDePasse'></td>
                 </tr>
                 <tr>
                    <td>Confirmation nouveau mot de passe</td><td><input type='password' name='confirmationMotDePasse'></td>
                 </tr>
                 <tr>
                     <td>
                        <button type='submit' name='action' value='actionChangerMotDePasse'>Changer</button>
                    </td>
                </tr>
             
            </table>
            $msg
   </form>
   ";
}