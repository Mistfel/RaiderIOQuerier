# RaiderIOQuerier

## Usage
Clone the repo and run query.php in the folder installed.

## 1. Character Profile Search

Provide the prompt the server region, realm name and character name. Below is an example output.

>General Character Information - 
>Character Name - %%%%
>Class Data - Shaman - Elemental - DPS
>Race Data - Dwarf - Female - Alliance
>Profile URL - https://raider.io/characters/eu/silvermoon/%%%%
>
>Mythic Plus Information - 
>Mythic Plus - Rank - Overall (World / Region / Realm) - 1475786 / 681514 / 35223
>Mythic Plus - Rank - Class DPS (World / Region / Realm) - 56374 / 27841 / 1307
>Mythic Plus - Rank - Class Healer (World / Region / Realm) - 73641 / 36246 / 1686
>
>Best Mythic Plus Runs - 
>Best Run - 1 - DOTI: Galakrond's Fall / 18 / 2024/04/06 13:10:50 / +3 / Fortified, Incorporeal, Sanguine
>Best Run - 2 - Atal'Dazar / 18 / 2024/04/06 13:46:44 / +1 / Fortified, Incorporeal, Sanguine
>Best Run - 3 - Waycrest Manor / 18 / 2024/01/23 20:16:57 / +1 / Tyrannical, Afflicted, Bolstering
>Best Run - 4 - Darkheart Thicket / 17 / 2024/04/06 14:17:04 / +2 / Fortified, Incorporeal, Sanguine
>Best Run - 5 - Throne of the Tides / 16 / 2024/04/06 14:57:59 / +2 / Fortified, Incorporeal, Sanguine
>Best Run - 6 - The Everbloom / 16 / 2024/04/05 19:28:32 / +1 / Fortified, Incorporeal, Sanguine
>Best Run - 7 - Black Rook Hold / 13 / 2024/01/19 19:27:32 / +3 / Tyrannical, Afflicted
>Best Run - 8 - DOTI: Murozond's Rise / 12 / 2023/11/19 20:45:58 / +2 / Fortified, Incorporeal
>
>Recent Mythic Plus Runs - 
>Recent Run - 1 - DOTI: Murozond's Rise / 11 / 2024/04/07 21:42:33 / +3 / Fortified, Incorporeal, Sanguine
>Recent Run - 2 - Atal'Dazar / 11 / 2024/04/07 21:15:36 / +3 / Fortified, Incorporeal, Sanguine
>Recent Run - 3 - DOTI: Galakrond's Fall / 11 / 2024/04/07 20:58:36 / +3 / Fortified, Incorporeal, Sanguine
>Recent Run - 4 - Throne of the Tides / 16 / 2024/04/06 14:57:59 / +2 / Fortified, Incorporeal, Sanguine
>Recent Run - 5 - Darkheart Thicket / 17 / 2024/04/06 14:17:04 / +2 / Fortified, Incorporeal, Sanguine
>Recent Run - 6 - Atal'Dazar / 18 / 2024/04/06 13:46:44 / +1 / Fortified, Incorporeal, Sanguine
>Recent Run - 7 - DOTI: Galakrond's Fall / 18 / 2024/04/06 13:10:50 / +3 / Fortified, Incorporeal, Sanguine
>Recent Run - 8 - Throne of the Tides / 16 / 2024/04/05 20:02:08 / +2 / Fortified, Incorporeal, Sanguine
>Recent Run - 9 - The Everbloom / 16 / 2024/04/05 19:28:32 / +1 / Fortified, Incorporeal, Sanguine
>Recent Run - 10 - DOTI: Galakrond's Fall / 18 / 2024/03/30 15:24:29 / +2 / Tyrannical, Afflicted, Bolstering

After this has been displayed you will see 

>Open profile in browser(Y/N)?

Submitting "Y" to this will open the character profile in your browser within your browser.

## 2. Guild Profile Search

Provide the prompt the server region, realm name and guild name. Below is an example output.

>Guild Name - %%%%
>Faction - Alliance
>Realm - Silvermoon
>Profile URL - https://raider.io/guilds/eu/silvermoon/%%%%

After this has been displayed you will see 

>Open profile in browser(Y/N)?

Submitting "Y" to this will open the character profile in your browser within your browser.

## 3. Latest Boss Kill Information

Provide the prompt the server region, realm name, guild name, raid + boss slug and raid difficulty. Below is an example output.

>First Kill Information - 
>First Kill Date - 2023-05-23T19:11:32.183Z
>First Kill Average Ilvl - 426.788
>First Kill Player Count - 10
>
>Roster Information - 
>Player 1: - %%%% - Kul Tiran - Monk - Mistweaver - healer - 426.7 ilvl
>Player 2: - %%%% - Void Elf - Warlock - Demonology - dps - 419.3 ilvl
>Player 3: - %%%% - Worgen - Druid - Guardian - tank - 435.4 ilvl
>Player 4: - %%%% - Night Elf - Druid - Restoration - healer - 428.4 ilvl
>Player 5: - %%%% - Kul Tiran - Monk - Brewmaster - tank - 428.3 ilvl
>Player 6: - %%%% - Human - Paladin - Retribution - dps - 429 ilvl
>Player 7: - %%%% - Dracthyr - Evoker - Devastation - dps - 422.5 ilvl
>Player 8: - %%%% - Dark Iron Dwarf - Shaman - Enhancement - dps - 432.2 ilvl
>Player 9: - %%%% - Human - Mage - Frost - dps - 421.3 ilvl
>Player 10: - %%%% - Human - Rogue - Subtlety - dps - 424.8 ilvl

## 4. Current Mythic Plus Affix List

Provide the region shortcode. Below is an example output.

>Affixes - Fortified, Incorporeal, Sanguine
>Fortified - Non-boss enemies have 20% more health and inflict up to 30% increased damage.
>Incorporeal - While in combat, incorporeal beings periodically appear and attempt to weaken players.
>Sanguine - When slain, non-boss enemies leave behind a lingering pool of ichor that heals their allies and damages players.

## 5. Repeat Last Search

Returns the output of the last search. 