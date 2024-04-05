<?php
/**
 * Namespace pour les controllers
 */
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Classe Controller herité de BaseComtroller.
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
