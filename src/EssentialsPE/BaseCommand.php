<?php
namespace EssentialsPE;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\event\Listener;
use pocketmine\Server;

abstract class BaseCommand extends Command implements PluginIdentifiableCommand, Listener{
    /** @var Loader */
    public $plugin;

    public function __construct(Loader $plugin, $name, $description = "", $usageMessage = null, array $aliases = []){
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->plugin = $plugin;
    }

    public function getPlugin(){
        return $this->plugin;
    }

    public function getPlayer($player){
        $r = "";
        foreach(Server::getInstance()->getOnlinePlayers() as $p){
            if(strtolower($p->getDisplayName()) == strtolower($player) || strtolower($p->getName()) == strtolower($player)){
                $r = Server::getInstance()->getPlayerExact($p->getName());
            }
        }
        if($r == ""){
            return false;
        }else{
            return $r;
        }
    }
} 