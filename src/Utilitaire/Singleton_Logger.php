<?php
namespace App\Utilitaire;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;



class Singleton_Logger extends Logger //On hérite de la classe “Logger”. La classe “Logger” fournit des fonctionnalités, et nous allons l’étendre (l’améliorer)
{
    private static $_instance = null; //private : la propriété n’est accessible que par du code de cette classe (éviter un détournement du code) // static : la propriété n’est pas liée à une instance mais au système (unique !!)

    public function __construct(string $name, array $handlers = [], array $processors = [], ?DateTimeZone $timezone = null) //__construct : sert à créer l’objet ; Ce constructeur existant dejà dans la classe mère (ici c’est “logger”), on le rédifinit ? Pour proposer un nouveau comportement !
    {
        parent::__construct($name, $handlers, $processors, $timezone); //Appel du constructeur de la classe mère
    }

    public static function getInstance(): Logger
    { //Fonction static : non dépendante d’une instance
        if (is_null(self::$_instance)) { //si l’instance unique n’existe pas encore
            self::$_instance = new Singleton_Logger('cafe'); //on la crée !
            self::$_instance->pushHandler(new StreamHandler(__DIR__ . '/app.log', Logger::DEBUG)); //paramétrage du fichier de destination
        }

        return self::$_instance; //on retourne l’instance unique !
    }
}
