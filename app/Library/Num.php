<?php

namespace App\Library;

use Auth;


class Num
{
    static public function numCount($user)
    {
        $num = 0;
        foreach ($user->folders()->get() as $i) {
            $num += $i->tasks()->count();
        }
        echo $num;
    }

    static public function compNum($user){
        $num = 0;
        foreach($user->folders()->get() as $folders){
            $num += $folders->tasks()->where('status', 3)->count();
        }
        echo $num;
    }

    static public function noComp($user){
        $num = 0;
        foreach ($user->folders()->get() as $folders) {
            $num += $folders->tasks()->where('status', 1)->count();
            $num += $folders->tasks()->where('status', 2)->count();

        }
        echo $num;
    }

    static public function setNum($num){
        for($i=0; $i<=$num; $i++){
            echo "<option  value='$i'>$i</option>";
        }
    }

    static public function num($num){
        for($i=0; $i<=$num; $i++){
            echo "<option  value='$i'>$i</option>";
        }
    }

    static public function trainingSum($set,$num){
        echo $set * $num;
    }
}
