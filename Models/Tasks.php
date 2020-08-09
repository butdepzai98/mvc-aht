<?php
namespace AHT\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $timestamp = true;
    protected $fillable = ['title', 'description'];
}
?>