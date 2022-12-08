<?php
function Vue_Menu(){
    echo "
<nav>


    <ul>
        <li>
            <form>
                <input type='hidden' name='case' value='Catalogue'>
                <button type='submit' name='action' value='VoirListe'>Gérer le catalogue</button>
            </form> 
        </li>
        <li>
            <form>
                <input type='hidden' name='case' value='Categories'>
                <button type='submit' name='action' value='VoirListe'>Gérer les catégories</button>
            </form> 
        </li>
        <li>
            <form>
                <input type='hidden' name='case' value='Salarie'>
                <button type='submit' name='action' value='VoirListe'>Gérer les salariés</button>
            </form> 
        </li>
        <li>
            <form>
                <input type='hidden' name='case' value='Accueil'>
                <button type='submit' name='action' value='seDeconnecter'>Se déconnecter</button>
            </form> 
        </li>
        <li>
            <form>
                <input type='hidden' name='case' value='Accueil'>
                <button type='submit' name='action' value='demandeChangerMotDePasse'>Changer MDP</button>
            </form> 
        </li>
    </ul>
  </nav>
    ";
}