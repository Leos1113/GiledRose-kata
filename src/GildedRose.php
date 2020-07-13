<?php

namespace App;

final class GildedRose {


    public function updateQuality(Array $items) {
        forEach($items as $item) {
            $item->update();
        }
    }
}
