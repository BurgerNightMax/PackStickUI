<?php
namespace BurgerNightMax\PackStick;
use pocketmine\item\Item;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\utils\Config;
 
class Main extends PluginBase implements  Listener {
    public $cfg;

		  public $cooldown;

    public function onEnable(){

$this->getServer()->getPluginManager()->registerEvents($this, $this);
         @mkdir($this->getDataFolder());
        $this->cfg = $this->getConfig();
        $this->saveDefaultConfig();
    }
  
    public function onUse(PlayerInteractEvent $event){
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();

        if($item->getId() == $this->cfg->get("stickspeed")){ 
           $player->getInventory()->removeItem(Item::get($this->cfg->get("stickSremove"),0, 1) );         
           $effect = new
           EffectInstance(Effect::getEffect(1),
           5 * 20,
           $this->cfg->get("niveauxS"));
           $effect->setVisible(false);
           $player->addEffect($effect);
           $cooldown = 80;
        } 

        if($item->getId() == $this->cfg->get("stickforce")){ 
          0 $player->getInventory()->removeItem(Item::get($this->cfg->get("stickFremove"),0, 1) );
           $effect = new
           EffectInstance(Effect::getEffect(5),
           5 * 20,
           $this->cfg->get("niveauxF"));
           $effect->setVisible(false);
           $player->addEffect($effect);
        }

        if($item->getId() == $this->cfg->get("HealStick")){ 
           $player->getInventory()->removeItem(Item::get($this->cfg->get("healSremove"),0, 1) );
           $player->setHealth($player->getHealth()+$this->cfg->get("cœur"));
$this->cooldown->set($sender->getLowerCaseName(), microtime(true) + 35);
        $this->cooldown->save();
        } 
    }
}
