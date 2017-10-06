<?php
/**
* @package    MineQuery (Remastered)
* @author     IndieGuts (Remastered), vexsoftware (Original) 
* @license    GNU General Public License v3.0
* @version    1.0
* @link       http://pear.php.net/package/PackageName
*
* MineQuery (Remastered) created by IndieGuts, as the original was obsolete
* Authors » IndieGuts (Remastered), vexsoftware (Original)
* Documentation » https://github.com/IndieGuts/MineQuery-Remastered
* Walkthrough » You can find examples on the GitHub!
*
* Thanks to Andrewboy159 for helping fix and debug the functions!
*
*/

class MineQueryRemastered {

	// Player Skin & Head Features

	function playerSkin($player, $size, $helm) {
		$constructor = '<img src=https://mcapi.ca/skin/'.$player.'/'.$size.'/'.$helm.'>';
		return $constructor; 
	}

	function rawSkin($player) {
		$constructor = '<img src=https://mcapi.ca/rawskin/'.$player.'>';
		return $constructor; 
	}

	function playerHead($player, $size, $helm) {
		$constructor = '<img src=https://mcapi.ca/avatar/'.$player.'/'.$size.'/'.$helm.'>';
		return $constructor; 
	}

	// Minecraft & Mojang Server Status

	function statusMinecraft() {
		$constructor = 'https://mcapi.ca/mcstatus';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['minecraft.net']['status'];	
	}

	function statusMinecraftSessions() {
		$constructor = 'https://mcapi.ca/mcstatus';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['session.minecraft.net']['status'];	
	}

	function statusAccountAuth() {
		$constructor = 'https://mcapi.ca/mcstatus';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['account.mojang.com']['status'];	
	}

	function statusAuthServer() {
		$constructor = 'https://mcapi.ca/mcstatus';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['authserver.mojang.com']['status'];	
	}

	function statusMojangSession() {
		$constructor = 'https://mcapi.ca/mcstatus';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['sessionserver.mojang.com']['status'];	
	}

	function statusAPI() {
		$constructor = 'https://mcapi.ca/mcstatus';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['api.mojang.com']['status'];	
	}

	function statusMojang() {
		$constructor = 'https://mcapi.ca/mcstatus';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['mojang.com']['status'];	
	}

	// Is It Up (You can use a domain, or an IP address)

	function isItUp($domain) {
		$constructor = 'https://mcapi.ca/isup/'.$domain;
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['status'];	
	}


	// Minecraft Server Features:

	function favicon($server) {
		$constructor = '<img src=https://mcapi.ca/query/'.$server.'/icon>';
		return $constructor; 
	}


	function status($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/status';
		$json = json_decode(file_get_contents($constructor), true);
		return $json['status'];
	}

	function ping($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/status';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['ping'];
	}

	function online($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/players';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['players']['online'];	
	}

	function maxplayers($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/players';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['players']['max'];
	}

	function version($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/info';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['version'];
	}

	function protocol($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/info';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['protocol'];
	}


	function motd($server, $raw) {
		if ($raw == true) {
			$constructor = 'https://mcapi.ca/query/'.$server.'/motd';
			$raw = file_get_contents($constructor);
			$json = json_decode($raw, true);
			return $json['motd'];					
		} else if ($raw == false) {
			$constructor = 'https://mcapi.ca/query/'.$server.'/motd';
			$raw = file_get_contents($constructor);
			$json = json_decode($raw, true);
			return $json['htmlmotd'];
		}
	}

	function port($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/info';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['port'];
	}

	function hostname($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/info';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['hostname'];
	}

	// Query Features: (The server query must be enabled on the targed server to work)
	// enable-query must be set to true in the requested server's server.properties file for this API to work

	function map($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/extensive';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['map'];
	}

	function gametype($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/extensive';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['game_type'];
	}

	function software($server) {
		$constructor = 'https://mcapi.ca/query/'.$server.'/extensive';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json['software'];
	}

	// BuyCraft API Features:
	function bc_payments($key) {
		$constructor = 'https://mcapi.ca/buycraft/'.$key.'/payments';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json;
	}

	function bc_packages($key) {
		$constructor = 'https://mcapi.ca/buycraft/'.$key.'/packages';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json;
	}

	function bc_info($key) {
		$constructor = 'https://mcapi.ca/buycraft/'.$key.'/payments';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);

		$array = array(
			"plugin_latest_version" => $json['payload']['latestVersion'],
			"plugin_download_url" => $json['payload']['latestDownload'],
			"server_id" => $json['payload']['serverId'],
			"server_currency" => $json['payload']['serverCurrency'],
			"server_name" => $json['payload']['serverName'],
			"server_store_url" => $json['payload']['serverStore'],
			"username_update_interval" => $json['payload']['updateUsernameInterval'],
			"server_online_mode" => $json['payload']['onlineMode']
			);

		return $array;
	}

	// MinecraftMarket API Features:
	function mm_payments($key) {
		$constructor = 'https://mcapi.ca/minecraftmarket/'.$key.'/payments';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json;		
	}

	function mm_ingame_cats($key) {
		$constructor = 'https://mcapi.ca/minecraftmarket/'.$key.'/ingame';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json;
	}

	// Mojang Blacklisted Servers Features:
	function blockedservers() {
		$constructor = 'https://mcapi.ca/blockedservers';
		$raw = file_get_contents($constructor);
		$json = json_decode($raw, true);
		return $json;		
	}

}
