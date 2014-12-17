<?php
/**
 * Balloon.php
 *
 * @author    Andrea Passaglia <gurghet@gmail.com>
 */

class Balloon extends Eloquent
{
    public function strip() {
        return $this->belongsTo('Strip');
    }
}
