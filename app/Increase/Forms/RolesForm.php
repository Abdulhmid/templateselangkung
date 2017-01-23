<?php

namespace App\Increase\Forms;

use Kris\LaravelFormBuilder\Form;

class RolesForm extends Form
{
    public function buildForm()
    {
        $this->add("name", "text")
        	->add("label", "text")
        	->add("description", "textarea");
    }
}
