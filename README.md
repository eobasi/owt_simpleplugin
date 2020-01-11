# OWT101: Beginner’s Guide to Oxwall Plugin Development

Simple Oxwall plugin example for tutorial on how to develop oxwall plugin. This is a short Oxwall plugin development crash course that is based on a simple Oxwall plugin developed for the purpose of this course. Let's see how it was created step by step.

## COURSE OUTLINE

* Setup Development Environment
  - IDE
  - Debug Mode
  - Development Mode
 * Setup Oxwall Developer Account                                         
 * Simple Oxwall “Hello World” Plugin
 
## WATCH VIDEO TUTORIAL
 
[![WATCH VIDEO TUTORIAL](https://img.youtube.com/vi/SBaM78CxxMY/maxresdefault.jpg)](https://www.youtube.com/watch?v=SBaM78CxxMY)

## Simple Oxwall “Hello World” Plugin

So we begin. We need to create a simple plugin that displays a greeting message to logged in users.

Create owt_simpleplugin folder (this is also our plugin key in this case) in the ow_plugins folder. This will be the plugin root folder where we will be performing all the work.

## Plugin File System
Example plugin to demostrate Oxwall plugin file structure. Items ending with `/` indicate a folder name.

### Plugin Root / _owt_simpleplugin_
- plugin.xml
- install.php
- activate.php
- init.php
- uninstall.php
- deactivate.php
- controllers /
- components /
- bol /
- classes /
- views /
- controllers
- components

Now we should install and activate our plugin but first, we should create the following files in the root folder of our plugin:

### plugin.xml
The plugin root folder should contain plugin.xml file - this file should contain our plugin information. The information is written in xml tags and includes:
- name
- key
- description
- author
- authorEmail
- authorUrl
- developerKey
- build
- copyright
- license
- licenseUrl

#### plugin.xml Example

```xml
<?xml version="1.0" encoding="utf-8" ?>

<plugin>
    <name>Simple Plugin</name>
    <key>owt_simpleplugin</key>
    <description>Simple Oxwall plugin example for tutorial on how to develop oxwall plugin</description>
    <author>Ebenezer Obasi</author>
    <authorEmail>info@eobasi.com</authorEmail>
    <authorUrl>https://www.eobasi.com</authorUrl>
	<developerKey>d7be028d4d1053345e0fd37184e5dadb</developerKey>
    <build>1</build>
    <copyright>(C) 2020 Ebenezer Obasi. All rights reserved.</copyright>
	<license>The BSD License</license>
    <licenseUrl>http://www.opensource.org/licenses/bsd-license.php</licenseUrl>
</plugin>
```
**Important**: Note these strings:

```xml
<key>owt_simpleplugin</key>
...
<developerKey>d7be028d4d1053345e0fd37184e5dadb</developerKey>
```

Those should be your `plugin key` and `developer key`, respectively. They should be correct, otherwise you may face problems upon submitting your plugin or auto-updating it in the admin area.

### init.php

Now let's create init.php file. Here we can add new routes and autoload class rules, bind events etc. Let's leave this file empty for now. This file will be executed every time your plugin is active.

### install.php
Code to execute during plugin installation.

### uninstall.php
Code to execute during plugin uninstallation.

### activate.php
Oxwall will execute this script during plugin activation.

### deactivate.php
Set of instructions to execute on plugin deactivation.

## Plugin installation

Yes, it's time to install your plugin before you actually started real development. Go to Admin area → Plugins → Available Plugins. Click Install on your new plugin.

Voila - our plugin has been successfully installed and activated. This should create necessary database records for the normal functioning of the new plugin.

## Add "Hello, Greeting" Box to plugin

Open the `init.php` file you have created earlier and copy the following code into it:

```php
//function to display greeting box
function owt_simpleplugin_greeting_box()
{
    //check if user is authenticated
    if( !OW::getUser()->isAuthenticated() )
    {
        //return function if user is not logged in
        return;
    }

    $userId = OW::getUser()->getId(); //get user Id
    $displayName = BOL_UserService::getInstance()->getDisplayName( $userId ); //get user display name
    $siteName = OW::getConfig()->getValue('base', 'site_name'); //get site name

    //echo html message box
    echo "<div class='owt_simpleplugin_greeting_box'>
        Hello, {$displayName}! Welcome back to {$siteName}.
        <a href='#!' class='close'>X</a>
    </div>";

    //onload javascript code
    OW::getDocument()->addOnloadScript("
        $('.close', '.owt_simpleplugin_greeting_box').click(function(){
            $('.owt_simpleplugin_greeting_box').remove();
        });
    ");

    //add css style declaration
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

//bind function to top page content event
OW::getEventManager()->bind('base.add_page_top_content', 'owt_simpleplugin_greeting_box');
```
What the above code does is to add a html greeting box at the top of your page when it loads. Let's see how it's done.
