<?php

/** Rechercher les tokens ayant plus de 10 minutes
 * Full SQL (optimisé) : delete pour les tokens ayant plus de 10 Minutes (juste un appel au modèle)
 * Hybride PHP : demander la liste des tokens, la parcourir 1 par 1, puis supprimer les trop vieux.
 */
