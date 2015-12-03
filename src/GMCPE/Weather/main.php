<?php

namespace GMCPE\Weather;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\entity\Entity;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\level\Position;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\event\level\ChunkLoadEvent;
use pocketmine\level\generator\biome\Biome;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\protocol\LevelEventPacket;
use GMCPE\Weather\Snow;
use GMCPE\Weather\Rain;

class main extends PluginBase implements Listener {
	
	public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
	}
}

?>
