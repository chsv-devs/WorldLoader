<?php
namespace WorldLoader;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TE;
use pocketmine\utils\Config;

class WorldLoader extends PluginBase
{
    public $Worlds = array();

    public function onEnable()
    {
        $this->getLogger()->info(TE::YELLOW . "월드로더 로딩. 제작자: Hancho");

        @mkdir($this->getDataFolder());
        $config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
        if ($config->get("Worlds")!=null) {
            $this->Worlds = $config->get("Worlds");
        } else {
            $config->set("Worlds", ["test1","test2"]);
        }
        foreach ($this->Worlds as $lev) {
            $this->getServer()->loadLevel($lev);
        }
        $config->save();
    }
}
