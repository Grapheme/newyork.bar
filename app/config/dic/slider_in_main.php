<?php

return array(

    'fields' => function () {

        return array(
            'slide' => array(
                'title' => 'Слайд',
                'type' => 'image',
            ),
            'link' => array(
                'title' => 'Ссылка',
                'type' => 'text',
            ),
        );

    },


    'menus' => function ($dic, $dicval = NULL) {
        $menus = array();
        return $menus;
    },

    'actions' => function ($dic, $dicval) {
    },

    'hooks' => array(),

    'seo' => false,
);
