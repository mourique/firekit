# 🔥 Firekit for KirbyCMS 

This is my boilerplate for KirbyCMS based on plainkit with everything i need for creating websites. You can learn more about Kirby at [getkirby.com](https://getkirby.com).

What is added: 
- 📁 /assets folder with scripts.js and styles.css
- 📁 /data folder with /runtime and /storage to separate persistent and non-persisten content from the code (from tobimori/kirby-baukasten)
- 🗃️ /partials for header and footer
- 💀 HTML Skeleton
- 🦶 sticky footer css
- 🔠 webfont css
- 🏃‍♀️tachyons preloader
- 🔒 conditional BASIC AUTH and https://www
- 🖌️ predefined layouts with common functions
- 🗳️ custom blocks with mourique/kirby-blocks-factory
- 🖼️ lazyloading images with srcset and sizes
- 🔤 typographic scale based on utopia.fyi
- 🎨 programmatically defined themecolors and containersizes
- 📱 simple mobile navigation (with checkbox hack)

## To Do
- [ ] put variables in own css file
- [ ] find out if `overflow:hidden;` on `<section>` is a problem

## Create a new Project ➕
`composer create-project mourique/firekit PROJECTNAME`
> this does not work correctly yet because there is no stable release?

## Deployments 🔼

- uses **git-ftp** 
- use plain ftp with `git ftp push -P`
  - this prompts for a password everytime
- or use with SSH keys setup (RSA, no ED!!)
- ❗️this currently does not do `composer install` on livehost
- setup in `.git/config`

### git-ftp configuration 

```yml
[git-ftp]
  user = USERNAME
  # for sftp/ssh (with keys)
  url = sftp://HOST:22/~/public_html/DOMAINNAME
  # for ftp (with passwort prompt)
  url = ftp://HOST:21/public_html/DOMAINNAME
```

## Content Backups 🔒

- uses **cronjobs**
- duplicates the `/content` folder every night and keeps the last 10 copies
- setup in `/content_backup/content_backups.sh` 
- activate on livehost

## Pull Content To Local ⏬

- uses **rsync**
- setup in `composer.json`
- run `composer run-scripts pull-content`
  - or `dry-pull-content`

## Configure Branding with $themecolors and $containersizes

this code will be used in kirby panel and generate the css (`header.php`, `default.php`)

```php
<?php
return [
    /* define the brand colors here, lowercase letters */
    'themecolors' => [
        ['name' => 'bordeaux',  'background' => '#CFDBD5',  'foreground' => '#333533' ],
        ['name' => 'magnolia',  'background' => '#E8EDDF',  'foreground' => '#444444' ],
        ['name' => 'sparrow',  'background' => '#242423',  'foreground' => '#E8EDDF' ],
        ['name' => 'carbon',    'background' => '#F5CB5C',  'foreground' => '#242423' ]
    ],
    /* define the width of content here, well be used in kirby panel and in css */
    'containersizes' => [
        ['name' => 'Standard',      'slug' => 'regular',    'width' => '90vw',  'max-width' => 'max(60vw, 1500px)' ],
        ['name' => 'Randlos',       'slug' => 'full',       'width' => '100%',  'max-width' => '100%' ],
        ['name' => 'Volle Breite',  'slug' => 'max',        'width' => '98vw',  'max-width' => '2200px' ],
        ['name' => 'Schmal',        'slug' => 'small',      'width' => '90vw',  'max-width' => 'max(50vw, 1000px)' ],
        ['name' => 'Breit',         'slug' => 'large',      'width' => '98vw',  'max-width' => '1700px' ]
    ]
];
```
