<?php

// Set your character details
$region = "us";  // Replace with your region (e.g., "us" for United States)
$realm = "YourRealm";  // Replace with your character's realm
$characterName = "YourCharacter";  // Replace with your character's name

// API endpoint for character profile
$apiUrl = "https://raider.io/api/v1/characters/profile";

// Construct the API request URL
$requestUrl = "$apiUrl?region=$region&realm=$realm&name=$characterName";

// Make the API request
$response = file_get_contents($requestUrl);

// Decode the JSON response
$data = json_decode($response, true);

// Extract relevant information (e.g., character name, guild, etc.)
$characterName = $data['name'];
$guildName = $data['guild']['name'];

// Print the results
echo "Character Name: $characterName\n";
echo "Guild Name: $guildName\n";
// Add more fields as needed

?>