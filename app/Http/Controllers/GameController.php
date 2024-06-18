<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function verifyOperatorPlayerSession() {
        return response($this->rJson());
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
        "geu": "https:\/\/api.empleita.com.br\/game-api\/fortune-tiger\/",
        "lau": "https:\/\/api.empleita.com.br\/game-api\/lobby\/",
        "bau": "https:\/\/api.empleita.com.br\/web-api\/game-proxy\/",
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
