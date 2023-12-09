# 🔥 Firekit for KirbyCMS 

This is my boilerplate for KirbyCMS based on plainkit with everything i need for creating websites. You can learn more about Kirby at [getkirby.com](https://getkirby.com).

What is added: 
- /assets folder with scripts.js and styles.css
- /partials for header and footer
- HTML Skeleton
- sticky footer css
- webfont css
- tachyons preloader

## Create a new Project ➕ 

`composer create-project mourique/firekit PROJECTNAME`



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

