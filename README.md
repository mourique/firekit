# 🔥firekit - a pagebuilder framework for kirbyCMS

> ⚠️ I created this plugin for my own use, so it might not be the best solution for your project. it is subject to many changes as i learn and apply more. Use at your own risk.

extending the getkirby/composerkit, firekit is a set of plugins to simplify creating websites in a specific way. This is not standalone software, it needs the Content Management System [Kirby](https://getkirby.com) to work. KirbyCMS is not free and requires a license to operate.

## Features

- automatic loading of css for blocks
- Hooks System for adding custom css and js to the head
- custom panel css
- alt text and size restriction (width & height) for files

## Creating a New Project with 🔥firekit

```bash
# use the composerkit as a base
composer create-project felixf/firekit PROJECTNAME
```

## layout-sections

firekit provides a customised layout field to be used for the sections of the website. It ships with a simple css grid system.

## Add Blocks

Firekit comes with a set of preinstalled blocks, that you can use in your project. To add more , you need to require the plugin in your `composer.json`:

```bash
# Image Block
composer require felixf/fireblock-image
```