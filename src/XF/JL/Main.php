<?php

namespace XF\JL;

use pocketmine\plugin\Plugin;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\block\Block;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\block\BlockBreakEvent;
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase implements Listener
{
	public function onEnable()
	{
			$this->getServer()->getPluginManager()->registerEvents($this,$this);

  $this->getLogger()->info("\n[挖矿奖励插件已更新]\n1.0.1 修复了在创造模式刷钱的Bug\n1.0.2 更新了生存模式经济插件报错的Bug\n1.0.3 削弱了给予的经济 降低生存节奏\n作者:MagicBloodFly 来自FancyTeam");
      	}
      	
	 	public function onJoin(PlayerJoinEvent $e){
	 	$p=$e->getPlayer();
	 	$p->sendMessage("§b[挖掘奖励]§a本服装了挖掘奖励,只限挖石头哦~");
	 	return;
	 	}
	public function onB(BlockBreakEvent $e ){
	$p=$e->getPlayer();
	
	if($p->getgamemode()==1)
	{
		return;
	}
	$id=$e->getBlock()->getId();
	
	$mt=mt_rand(1,250);
	
	$name=$e->getPlayer()->getName();
	
	if($e->isCancelled())
	{
	return;
	
	}
	if($id==1){
	if($mt==73){
	$mt2= mt_rand(7,10);
	EconomyAPI::getInstance()->addMoney($p,$mt2);
	$this->getServer()->broadcastMessage("§b[挖掘奖励]§e玩家".$name."在挖石头中幸运地获得了随机金币".$mt2."§d此奖励为大奖励");
	}

	if($mt==43){
	 $mt3= mt_rand(3,5);
	 EconomyAPI::getInstance()->addMoney($p,$mt3);
	$this->getServer()->broadcastMessage("§b[挖掘奖励]§e玩家".$name."在挖石头中幸运地获得了随机金币".$mt3."§d此奖励为小奖励");
	
	
	}}
	
return;
}}
