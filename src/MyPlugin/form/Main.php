<?php

namespace MyPlugin\forms;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\item\Item;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener {

	public function onEnable(){

	}

	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
		switch($cmd->getName()){
			case "form":
			 if($sender instanceof Player){
			 	if($sender->hasPermission("form.ui")){
			 		$this->openMyForm($sender);
			 	} else {
			 		$sender->sendMessage("You Dont Permission to Use this command");
			 	}
			 } else {
			 	$sender->sendMessage("Use this command in-game!");
			 }
		}
	return true;
	}

	public function openMyForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			$result = $data;
			if($result === null){
				return true;
			}
			switch($result){
				case 0: 
					$this->openMyIron($player);
				break;

				case 1:
					$this->openMyDiamond($player);
				break;
			}
		});
		$form->setTitle("Packs");
		$form->setContent("Buy A Packs");
		$form->addButton("Iron Packs", 0, "textures/items/iron_ingot"); //if you want to add Picture on the form follow me
		$form->addButton("Diamond Packs", 0, "textures/items/diamond"); //okay its done, how to find the name item? click the link on description!
		$form->sendToPlayer($player);
		return $form;
	} //now create new form!

	public function openMyIron($player){ //change the openMy[text] with different text, example : openMyIron.
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			$result = $data;
			if($result === null){
				return true;
			}
			switch($result){
				case 0: 
					$item = Item::get(306, 0, 1);
					$item->setCustomName("My Iron Helmet");
					$player->getInventory()->addItem($item);

					$item = Item::get(307, 0, 1);
					$item->setCustomName("My Iron Chestplate");
					$player->getInventory()->addItem($item);

					$item = Item::get(308, 0, 1);
					$item->setCustomName("My Iron Leggings");
					$player->getInventory()->addItem($item);

					$item = Item::get(309, 0, 1);
					$item->setCustomName("My Iron Boots");
					$player->getInventory()->addItem($item);

					$player->sendMessage("You Just Bought an Iron Packs!");
				break;

				case 1:
					$this->openMyForm($player);
				break;
			}
		});
		$form->setTitle("Packs");
		$form->setContent("Buy Iron Packs");
		$form->addButton("Buy Iron Packs", 0, "textures/items/iron_ingot"); 
		$form->addButton("Back", 0, "textures/ui/op"); //lets create "Back" to Main Form
		$form->sendToPlayer($player);
		return $form;
	} 

	public function openMyDiamond($player){ //change the openMy[text] with different text, example : openMyIron.
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			$result = $data;
			if($result === null){
				return true;
			}
			switch($result){
				case 0: 
					$item = Item::get(310, 0, 1);
					$item->setCustomName("My Diamond Helmet");
					$player->getInventory()->addItem($item);

					$item = Item::get(311, 0, 1);
					$item->setCustomName("My Diamond Chestplate");
					$player->getInventory()->addItem($item);

					$item = Item::get(312, 0, 1);
					$item->setCustomName("My Diamond Leggings");
					$player->getInventory()->addItem($item);

					$item = Item::get(313, 0, 1);
					$item->setCustomName("My Diamond Boots");
					$player->getInventory()->addItem($item);

					$player->sendMessage("You Just Bought an Diamond Packs!");
				break;

				case 1:
					$this->openMyForm($player);
				break;
			}
		});
		$form->setTitle("Packs");
		$form->setContent("Buy Diamond Packs");
		$form->addButton("Buy Diamond Packs", 0, "textures/items/diamond"); 
		$form->addButton("Back", 0, "textures/ui/op"); //lets create "Back" to Main Form
		$form->sendToPlayer($player);
		return $form;
	} //ok now the plugin done lets try it
}
