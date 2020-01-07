<?php

function owt_simpleplugin_greeting_box()
{
    if( !OW::getUser()->isAuthenticated() )
    {
        return;
    }

    $userId = OW::getUser()->getId();
    $displayName = BOL_UserService::getInstance()->getDisplayName( $userId );
    $siteName = OW::getConfig()->getValue('base', 'site_name');

    echo "<div class='owt_simpleplugin_greeting_box'>
        Hello, {$displayName}! Welcome back to {$siteName}.
        <a href='#!' class='close'>X</a>
    </div>";

    OW::getDocument()->addOnloadScript("
        $('.close', '.owt_simpleplugin_greeting_box').click(function(){
            $('.owt_simpleplugin_greeting_box').remove();
        });
    ");

    OW::getDocument()->addStyleDeclaration("
        .owt_simpleplugin_greeting_box{
            border: solid 1px #aaddff;
            display:block;
            padding: 30px;
            margin: 10px 0px;
            color: #aaddee;
        }
        .owt_simpleplugin_greeting_box .close{
            float: right;
            color: #ff0000;
            font-weight:bold;
        }
    ");
}

OW::getEventManager()->bind('base.add_page_top_content', 'owt_simpleplugin_greeting_box');