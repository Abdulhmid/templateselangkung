<?php

namespace App\Increase\Forms;

use Kris\LaravelFormBuilder\Form;

class UsersForm extends Form
{
    public function buildForm()
    {
    	$roles = (new \App\Increase\Models\Roles);
        $this
            ->add('photo','file',[
                'attr' => [
                    'id' => 'file',
                    'onchange' => 'readUrl(this)'
                ]
            ])
        	->add("name", "text")
        	->add("username", "text")
        	->add("email", "email")
            ->add('password','password')
            ->add('password_confirmation','password')
        	->add("birth", "text")

            ->add('gender','choice',[
            'choices'       => ['male' => 'Laki-Laki', 'female' => 'Perempuan'],
            'label'         => "Jenis Kelamin",
            'expanded'      => true,
            'multiple'      => false,
            'choice_options' => [ 
                'wrapper' => [
                    'class' => 'choice-wrapper'
                ] 
                 ]
            ])
        	->add("phone", "text")
        	->add("telp", "text")

            ->add('role_id', 'select', [
                'choices' => $roles->pluck("name", "id")->toArray(),
                'empty_value' => '- Pilih Grup -',
                'label' => 'Grup'
            ])

            ->add('active','choice',[
            'choices'       => [1 => 'Active', 0 => 'Not Active'],
            'label'         => "Status",
            'expanded'      => true,
            'multiple'      => false,
            'choice_options' => [ 
                'wrapper' => [
                    'class' => 'choice-wrapper'
                ] 
                 ]
            ]);
    }
}
