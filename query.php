<?php

// Intro
echo "\n--- Mistfel RaiderIO Query ---\n";
echo "1: Character Profile\n";
echo "2: Guild Profile\n";
echo "3: Guild Boss Kill Information\n";
echo "4: M+ Affixes\n";
echo "5: Return last search results\n";
$query_type = readline('Please select your query type from above: ');

// Query type map
$query_type_map = [
	1 => "getCharacterProfile",
	2 => "getGuildProfile",
	3 => "getGuildBossKillInfo",
	4 => "getMythicPlusAffixes",
	5 => "getLastSearchResults"
];

echo "\n";

// Run the search and save whatever was done last time
$query_type_map[$query_type]();
exit;

function getCharacterProfile()
{
	// Set your character details
	$region = readline('Please enter your region shortcode (e.g us, eu, tw, kr, cn): ');
	$realm = readline('Please enter your region realm: ');
	$name = readline('Please enter your character name: ');

	$request_data = [
		'region' => $region,
		'realm' => $realm,
		'name' => $name,
		'fields' => 'raid_progression,mythic_plus_ranks,mythic_plus_recent_runs,mythic_plus_best_runs,mythic_plus_alternate_runs,mythic_plus_highest_level_runs,mythic_plus_weekly_highest_level_runs,mythic_plus_previous_weekly_highest_level_runs,previous_mythic_plus_ranks'
 	];

	$request = sendRequest("characters/profile", http_build_query($request_data));

	$display_data = [
		'General Character Information' => '',
		'Character Name' => $request['name'],
		'Class Data' => $request['class'] . " - " . $request['active_spec_name'] . " - " . $request['active_spec_role'],
		'Race Data' => $request['race'] . " - " . ucfirst($request['gender']) . " - " . ucfirst($request['faction']),
		'Profile URL' => $request['profile_url'],
		'Mythic Plus Information' => '',
		'Mythic Plus - Rank - Overall (World / Region / Realm)' => $request['mythic_plus_ranks']['overall']['world'] . " / " . $request['mythic_plus_ranks']['overall']['region'] . " / " . $request['mythic_plus_ranks']['overall']['realm'],
		'Mythic Plus - Rank - Class DPS (World / Region / Realm)' => $request['mythic_plus_ranks']['class_dps']['world'] . " / " . $request['mythic_plus_ranks']['class_dps']['region'] . " / " . $request['mythic_plus_ranks']['class_dps']['realm']
 	];

 	if ($request['mythic_plus_ranks']['class_tank']) {
 		$display_data['Mythic Plus - Rank - Class Tank (World / Region / Realm)'] = $request['mythic_plus_ranks']['class_tank']['world'] . " / " . $request['mythic_plus_ranks']['class_tank']['region'] . " / " . $request['mythic_plus_ranks']['class_tank']['realm'];
 	}

 	if ($request['mythic_plus_ranks']['class_healer']) {
 		$display_data['Mythic Plus - Rank - Class Healer (World / Region / Realm)'] = $request['mythic_plus_ranks']['class_healer']['world'] . " / " . $request['mythic_plus_ranks']['class_healer']['region'] . " / " . $request['mythic_plus_ranks']['class_healer']['realm'];
 	}

 	return display($display_data);
}

function getGuildProfile()
{
	// Set your character details
	$region = readline('Please enter your region shortcode (e.g us, eu, tw, kr, cn): ');
	$realm = readline('Please enter your region realm: ');
	$guild = readline('Please enter your guild name: ');

	$request_data = [
		'region' => $region,
		'realm' => $realm,
		'name' => $guild,
 	];

	$request = sendRequest("guilds/profile", http_build_query($request_data));

	$display_data = [
		'Guild Name' => $request['name'],
		'Faction' => $request['faction'],
		'Realm' => $request['realm'],
		'Profile URL' => $request['profile_url'],
 	];

 	return display($display_data);
}

function getGuildBossKillInfo()
{
	$region = readline('Please enter your region shortcode (e.g us, eu, tw, kr, cn): ');
	$realm = readline('Please enter your region realm: ');
	$guild = readline('Please enter your guild name: ');
	$raid = readline('Please enter your raid name: ');
	$boss = readline('Please enter your boss name: ');
	$difficulty = readline('Please enter your raid difficulty: ');

	$request_data = [
		'region' => $region,
		'realm' => $realm,
		'guild' => $guild,
		'raid' => $raid,
		'boss' => $boss,
		'difficulty' => $difficulty
 	];

	$request = sendRequest("guilds/boss-kill", http_build_query($request_data));

	$display_data = [
		'First Kill Information' => '',
		'First Kill Date' => $request['kill']['defeatedAt'],
		'First Kill Average Ilvl' => $request['kill']['itemLevelEquippedAvg'],
		'First Kill Player Count' => count($request['roster']),
		'Roster Information' => '',
 	];

 	foreach ($request['roster'] as $roster_no => $roster_member) {
 		$roster_member_name = $roster_member['character']['name'];
 		$roster_member_race = $roster_member['character']['race']['name'];
 		$roster_member_class = $roster_member['character']['class']['name'];
 		$roster_member_spec = $roster_member['character']['spec']['name'];
 		$roster_member_role = $roster_member['character']['spec']['role'];
 		$roster_member_ilvl = $roster_member['character']['itemLevelEquipped'];

 		$display_data["Player " . $roster_no + 1 . ":"] = $roster_member_name . " - " . $roster_member_race . " - " . $roster_member_class . " - " . $roster_member_spec . " - " . $roster_member_role . " - " . $roster_member_ilvl . " ilvl";
  	}

  	return display($display_data);
}

function getMythicPlusAffixes()
{
	$region = readline('Please enter your region shortcode (e.g us, eu, tw, kr, cn): ');

	$request = sendRequest("mythic-plus/affixes", http_build_query(['region' => $region]));

	$display_data = [
		'Affixes' => $request['title']
 	];

 	foreach ($request['affix_details'] as $affix) {
 		$display_data[$affix['name']] = $affix['description'];
 	}

 	return display($display_data);
}

function getLastSearchResults()
{
	echo file_get_contents(getcwd() . "/saved_search.txt");
}

function sendRequest($endpoint = "", $url_string = "")
{	
	// API endpoint for character profile
	$apiUrl = "https://raider.io/api/v1/";

	// Construct the API request URL
	$requestUrl = $apiUrl . $endpoint . "?" . $url_string;

	// Make the API request
	$response = file_get_contents($requestUrl);

	// Decode the JSON response
	$data = json_decode($response, true);

	return $data;
}

function display($display_data = [])
{
	$data_string = "";

	foreach ($display_data as $key => $value) {
		if (!$value) {
			$data_string .= "\n";
		}
		$data_string .= $key . " - " . $value . "\n";
	}

	$display_string = "\n" . $data_string . "\n";
	
	saveSearch($display_string);
	echo $display_string;

	if ($display_data['Profile URL']) {
		if (strtolower(readline('Open profile in browser(Y/N)? :')) == "y") {
			exec("open " . $display_data['Profile URL']);
		}
	}
}

function saveSearch($display_string = "")
{
	$save_file = getcwd() . "/saved_search.txt";
	file_put_contents($save_file, $display_string);
}

?>