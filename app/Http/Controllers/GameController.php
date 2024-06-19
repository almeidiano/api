<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    private function getAllGames($game_id_code) {
        $filePath = storage_path('app/game-configs/allGames.json');

        if(!file_exists($filePath)) {
            return response()->json(['error' => 'Arquivo allGames não encontrado'], 404);
        }

        $jsonContent = file_get_contents($filePath);
        $gameConfig = json_decode($jsonContent);

        forEach($gameConfig as $game) {
            if(filter_var($game_id_code, FILTER_VALIDATE_INT) !== false) {
                if($game->gameId == $game_id_code) {
                    return $game;
                }
            } else {
                if($game->gameCode == $game_id_code) {
                    return $game;
                }
            }
        }

        return response()->json(['error' => "Jogo não encontrado"], 404);
    }
    
    public function verifySession(Request $request) {
        $update = $this->getAllGames($request['gi']);
        $data = json_decode($this->rSessionJson(), true);
        
        $data['dt']['geu'] = str_replace("game-name", $update->gameCode, $data['dt']['geu']);
        $data['dt']['tk'] = $request['tk'];
        // $data['dt']['nkn']);
        $data['dt']['gm'][0]["gid"] = $update->gameId;

        return response()->json($data);
    }
    
    public function getGameName() {
        return response($this->rGameNameJson());
    }
    
    public function getGameInfo($game, Request $request) {
        $game = $this->getAllGames($game);
        $filePath = storage_path('app/game/'.$game->gameCode . "/getGameInfo.json");

        if(!file_exists($filePath)) {
            return response()->json(['error' => 'Jogo não encontrado'], 404);
        }

        $jsonContent = file_get_contents($filePath);
        $getGameInfo = json_decode($jsonContent);
        
        return response()->json($getGameInfo);
    }
    
    public function spin() {
        return response($this->spinJson());
    }
    
    public function spinJson() {
        return '{
    "dt": {
        "si": {
            "wc": 9,
            "ist": false,
            "itw": true,
            "fws": 0,
            "wp": {
                "3": [
                    2,
                    5,
                    8
                ]
            },
            "orl": [
                7,
                7,
                2,
                7,
                5,
                2,
                3,
                6,
                0
            ],
            "lw": {
                "3": 8
            },
            "irs": false,
            "gwt": 2,
            "fb": null,
            "ctw": 8,
            "pmt": null,
            "cwc": 2,
            "fstc": null,
            "pcwc": 2,
            "rwsp": {
                "3": 100
            },
            "hashr": "0:7;7;3#7;5;6#2;2;0#R#2#021222#MV#0.40#MT#1#MG#8.00#",
            "ml": 1,
            "cs": 0.08,
            "rl": [
                7,
                7,
                2,
                7,
                5,
                2,
                3,
                6,
                0
            ],
            "sid": "1795522782306640896",
            "psid": "1795522782306640896",
            "st": 1,
            "nst": 1,
            "pf": 2,
            "aw": 8,
            "wid": 0,
            "wt": "C",
            "wk": "0_C",
            "wbn": null,
            "wfg": null,
            "blb": 125577.1,
            "blab": 125576.7,
            "bl": 125584.7,
            "tb": 0.4,
            "tbb": 0.4,
            "tw": 8,
            "np": 7.6,
            "ocr": null,
            "mr": null,
            "ge": [
                1,
                11
            ]
        }
    },
    "err": null
}';
    }
    
    public function rGameNameJson() {
        return '{
    "0": "Lobby",
    "1": "Honey Trap of Diao Chan",
    "2": "Gem Saviour",
    "3": "Fortune Gods",
    "6": "Medusa 2: The Quest of Perseus",
    "7": "Medusa 1: The Curse of Athena",
    "18": "Hood vs Wolf",
    "20": "Reel Love",
    "24": "Win Win Won",
    "25": "Plushie Frenzy",
    "26": "Tree of Fortune",
    "28": "Hotpot",
    "29": "Dragon Legend",
    "31": "Baccarat Deluxe",
    "33": "Hip Hop Panda",
    "34": "Legend of Hou Yi",
    "35": "Mr. Hallow-Win",
    "36": "Prosperity Lion",
    "37": "Santa\'s Gift Rush",
    "38": "Gem Saviour Sword",
    "39": "Piggy Gold",
    "40": "Jungle Delight",
    "41": "Symbols Of Egypt",
    "42": "Ganesha Gold",
    "44": "Emperor\'s Favour",
    "48": "Double Fortune",
    "50": "Journey to the Wealth",
    "53": "The Great Icescape",
    "54": "Captain\'s Bounty",
    "57": "Dragon Hatch",
    "58": "Vampire\'s Charm",
    "59": "Ninja vs Samurai",
    "60": "Leprechaun Riches",
    "61": "Flirting Scholar",
    "62": "Gem Saviour Conquest",
    "63": "Dragon Tiger Luck",
    "64": "Muay Thai Champion",
    "65": "Mahjong Ways",
    "67": "Shaolin Soccer",
    "68": "Fortune Mouse",
    "69": "Bikini Paradise",
    "70": "Candy Burst",
    "71": "Cai Shen Wins",
    "73": "Egypt\'s Book of Mystery",
    "74": "Mahjong Ways 2",
    "75": "Ganesha Fortune",
    "79": "Dreams of Macau",
    "80": "Circus Delight",
    "82": "Phoenix Rises",
    "83": "Wild Fireworks",
    "84": "Queen of Bounty",
    "85": "Genie\'s 3 Wishes",
    "86": "Galactic Gems",
    "87": "Treasures of Aztec",
    "88": "Jewels of Prosperity",
    "89": "Lucky Neko",
    "90": "Secrets of Cleopatra",
    "91": "Guardians of Ice & Fire",
    "92": "Thai River Wonders",
    "93": "Opera Dynasty",
    "94": "Bali Vacation",
    "95": "Majestic Treasures",
    "97": "Jack Frost\'s Winter",
    "98": "Fortune Ox",
    "100": "Candy Bonanza",
    "101": "Rise of Apollo",
    "102": "Mermaid Riches",
    "103": "Crypto Gold",
    "104": "Wild Bandito",
    "105": "Heist Stakes",
    "106": "Ways of the Qilin",
    "107": "Legendary Monkey King",
    "108": "Buffalo Win",
    "110": "Jurassic Kingdom",
    "112": "Oriental Prosperity",
    "113": "Raider Jane\'s Crypt of Fortune",
    "114": "Emoji Riches",
    "115": "Supermarket Spree",
    "117": "Cocktail Nights",
    "118": "Mask Carnival",
    "119": "Spirited Wonders",
    "120": "The Queen\'s Banquet",
    "121": "Destiny of Sun & Moon",
    "122": "Garuda Gems",
    "123": "Rooster Rumble",
    "124": "Battleground Royale",
    "125": "Butterfly Blossom",
    "126": "Fortune Tiger",
    "127": "Speed Winner",
    "128": "Legend of Perseus",
    "129": "Win Win Fish Prawn Crab",
    "130": "Lucky Piggy",
    "132": "Wild Coaster",
    "135": "Wild Bounty Showdown",
    "1312883": "Prosperity Fortune Tree",
    "1338274": "Totem Wonders",
    "1340277": "Asgardian Rising",
    "1368367": "Alchemy Gold",
    "1372643": "Diner Delights",
    "1381200": "Hawaiian Tiki",
    "1397455": "Fruity Candy",
    "1402846": "Midas Fortune",
    "1418544": "Bakery Bonanza",
    "1420892": "Rave Party Fever",
    "1432733": "Mystical Spirits",
    "1448762": "Songkran Splash",
    "1451122": "Dragon Hatch2",
    "1473388": "Cruise Royale",
    "1489936": "Ultimate Striker",
    "1492288": "Pinata Wins",
    "1508783": "Wild Ape #3258",
    "1513328": "Super Golf Drive",
    "1529867": "Ninja Raccoon Frenzy",
    "1543462": "Fortune Rabbit",
    "1555350": "Forge of Wealth",
    "1568554": "Wild Heist Cashout",
    "1572362": "Gladiator\'s Glory",
    "1580541": "Mafia Mayhem",
    "1594259": "Safari Wilds",
    "1601012": "Lucky Clover Lady",
    "1615454": "Werewolf\'s Hunt",
    "1623475": "Anubis Wrath",
    "1635221": "Zombie Outbreak",
    "1655268": "Tsar Treasures",
    "1671262": "Gemstones Gold",
    "1682240": "Cash Mania",
    "1695365": "Fortune Dragon",
    "1738001": "Chicky Run"
}';
    }
    
    public function rSessionJson() {
        return '{
    "dt": {
        "oj": {
            "jid": 1
        },
        "pid": "b5CqC7hzxX",
        "pcd": "demobrl00002456",
        "tk": "779A1DF5-DB0F-455B-8818-4FD4DCFC4788",
        "st": 1,
        "geu": "https:\/\/api.almeidiano.dev\/game-api\/game-name\/",
        "lau": "https:\/\/api.almeidiano.dev\/game-api\/lobby\/",
        "bau": "https:\/\/api.almeidiano.dev\/web-api\/game-proxy\/",
        "cc": "BRL",
        "cs": "R$",
        "nkn": "demobrl00002456",
        "gm": [
            {
                "gid": 126,
                "msdt": 1638432036000,
                "medt": 1638432036000,
                "st": 1,
                "amsg": ""
            }
        ],
        "uiogc": {
            "bb": 1,
            "grtp": 0,
            "gec": 1,
            "cbu": 0,
            "cl": 0,
            "bf": 0,
            "mr": 0,
            "phtr": 0,
            "vc": 0,
            "bfbsi": 0,
            "bfbli": 0,
            "il": 0,
            "rp": 0,
            "gc": 0,
            "ign": 0,
            "tsn": 0,
            "we": 0,
            "gsc": 1,
            "bu": 0,
            "pwr": 0,
            "hd": 0,
            "et": 0,
            "np": 0,
            "igv": 0,
            "as": 0,
            "asc": 0,
            "std": 0,
            "hnp": 0,
            "ts": 0,
            "smpo": 0,
            "grt": 0,
            "ivs": 0,
            "ir": 0,
            "gvs": 0,
            "hn": 1,
            "swf": 0,
            "swfbsi": 0,
            "swfbli": 0
        },
        "ec": [],
        "occ": {
            "rurl": "",
            "tcm": "You are playing Demo.",
            "tsc": 10,
            "ttp": 300,
            "tlb": "Continue",
            "trb": "Quit"
        },
        "ioph": "de8cebac3e1e"
    },
    "err": null
}';
    }

    public function rJson() {
        return '{
    "dt": {
        "oj": {
            "jid": 1
        },
        "pid": "b5CqC7hzxX",
        "pcd": "demobrl00002456",
        "tk": "80D92575-131A-4801-82F8-0E505A9D4598",
        "st": 1,
        "geu": "https:\/\/api.almeidiano.dev\/game-api\/fortune-tiger\/",
        "lau": "https:\/\/api.almeidiano.dev\/game-api\/lobby\/",
        "bau": "https:\/\/api.almeidiano.dev\/web-api\/game-proxy\/",
        "cc": "BRL",
        "cs": "R$",
        "nkn": "demobrl00002456",
        "gm": [
            {
                "gid": 126,
                "msdt": 1638432036000,
                "medt": 1638432036000,
                "st": 1,
                "amsg": ""
            }
        ],
        "uiogc": {
            "bb": 1,
            "grtp": 0,
            "gec": 1,
            "cbu": 0,
            "cl": 0,
            "bf": 0,
            "mr": 0,
            "phtr": 0,
            "vc": 0,
            "bfbsi": 0,
            "bfbli": 0,
            "il": 0,
            "rp": 0,
            "gc": 0,
            "ign": 0,
            "tsn": 0,
            "we": 0,
            "gsc": 1,
            "bu": 0,
            "pwr": 0,
            "hd": 0,
            "et": 0,
            "np": 0,
            "igv": 0,
            "as": 0,
            "asc": 0,
            "std": 0,
            "hnp": 0,
            "ts": 0,
            "smpo": 0,
            "grt": 0,
            "ivs": 0,
            "ir": 0,
            "gvs": 0,
            "hn": 1,
            "swf": 0,
            "swfbsi": 0,
            "swfbli": 0
        },
        "ec": [],
        "occ": {
            "rurl": "",
            "tcm": "You are playing Demo.",
            "tsc": 10,
            "ttp": 300,
            "tlb": "Continue",
            "trb": "Quit"
        },
        "ioph": "4a3cd39e5ed5"
    },
    "err": null
}';
    }
}
