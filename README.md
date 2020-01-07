## OXWALL DEV TUTORIAL - COURSE 101: Beginner’s Guide to Oxwall Plugin Development

Simple Oxwall plugin example for tutorial on how to develop oxwall plugin. This is a short Oxwall plugin development crash course that is based on a simple Oxwall plugin developed for the purpose of this course. Let's see how it was created step by step.

## COURSE OUTLINE

* Setup Development Environment
  - IDE
  - Debug Mode
  - Development Mode
 * Setup Oxwall Developer Account                                         
 * Simple Oxwall “Hello World” Plugin
 
 ## WATCH VIDEO TUTORIAL
[![WATCH VIDEO TUTORIAL](https://img.youtube.com/vi/SBaM78CxxMY/0.jpg)](https://www.youtube.com/watch?v=SBaM78CxxMY)

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
```
<?xml version="1.0" encoding="utf-8" ?>

<plugin>
    <name>Simple Plugin</name>
    <key>owtsimpleplugin</key>
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

# init.php

Now let's create init.php file. Here we can add new routes and autoload class rules, bind events etc. Let's leave this file empty for now. This file will be executed every time your plugin is active.
