<?php
/**
 * Strip.php
 *
 * @author    Andrea Passaglia <gurghet@gmail.com>
 */

class Strip extends \Eloquent
{
    protected $fillable = ['title', 'path', 'publish'];
    protected $hidden = ['id'];

    public function balloons() {
        return $this->hasMany('Balloon');
    }

    public function scopePublished($query) {

        $today = new Carbon\Carbon();
        
        return $query->where('publish', '<=', $today);
           
    }

    public function scopeLastPublished($query) {
        
        return $this->scopePublished($query)->orderBy('publish', 'desc')->limit(1);
        
    }

    public function getDates() {
        // TODO: controllare che publish non sia gia' trasformato automaticamente
        return array('created_at', 'updated_at', 'publish');
        
    }
}
