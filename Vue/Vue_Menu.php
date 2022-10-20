<?php
function Vue_Menu(){
    echo "

    <ul>
        <li>
            <form>
                <input type='hidden' name='case' value='Catalogue'>
                <button type='submit' name='action' value='VoirListe'>Gérer le catalogue</button>
            </form> 
        </li>
        <li>
            <form>
                <input type='hidden' name='case' value='Salarie'>
                <button type='submit' name='action' value='VoirListe'>Gérer les salariés</button>
            </form> 
        </li>
    </ul>
  
    ";
}