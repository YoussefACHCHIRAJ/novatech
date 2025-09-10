<?php

// Flat icons
function vaximo_flaticons() {
    return [
        'flaticon-bug'                  => 'Bug',
        'flaticon-content'              => 'Content',
        'flaticon-support'              => 'Support',
        'flaticon-profile'              => 'Profile',
        'flaticon-website'              => 'Website',
        'flaticon-cyber'                => 'Cyber',
        'flaticon-cyber-security'       => 'Cyber security',
        'flaticon-cyber-security-1'     => 'Cyber security one',
        'flaticon-order'                => 'Order',
        'flaticon-scientist'            => 'Scientist',
        'flaticon-anti-virus-software'  => 'Anti virus software',
        'flaticon-technical-support'    => 'Technical support',
        'flaticon-medal'                => 'Medal',
        '' => '',
        '' => '',
    ];
}

function vaximo_include_flaticons() {
    return array_keys(vaximo_flaticons());
}