<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class UserSearchForm extends Form
{
    public function buildForm()
    {
        $this
            ->add(
                'name',
                Field::TEXT,
                [
                    'label' => 'Full name',
                    'wrapper' => [
                        'class' => 'form-group col-md-8'
                    ]
                ]
            )
            ->add(
                'is_verified',
                Field::CHECKBOX,
                [
                    'label' => 'is verified',
                    'wrapper' => [
                        'class' => 'form-group col-md-2'
                    ]
                ]
            )
            ->add(
                'sumbit',
                Field::BUTTON_SUBMIT,
                [
                    'label' => 'Найти',
                    'wrapper' => [
                        'class' => 'form-group col-md-2'
                    ]
                ]
            );
    }
}
