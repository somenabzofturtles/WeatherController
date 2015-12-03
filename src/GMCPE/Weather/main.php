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
	$this->saveResource("Config.yml");	
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
	}
	public function onPlayerJoinEvent(PlayerJoinEvent $event) {
		$player = $event->getPlayer ();
		$pk = new LevelEventPacket ();
		$pk->evid = 3001;
		$pk->data = 10000;
		$player->dataPacket ( $pk );
	}

	public function onChunkLoadEvent(ChunkLoadEvent $event) {
			if ($this->getConfig()->get("Snow") === true) {
			for($x = 0; $x < 16; ++ $x)
			        for($z = 0; $z < 16; ++ $z)			
				        $event->getChunk ()->setBiomeId ( $x, $z, Biome::ICE_PLAINS );
			}
			elseif ($this->getConfig()->get("Rain") === true) {
			for($x = 0; $x < 16; ++ $x)
			        for($z = 0; $z < 16; ++ $z)			
			                $event->getChunk ()->setBiomeId ( $x, $z, Biome::TAIGA );	
			}	
	}
}	
