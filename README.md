# BGP V3

Bas Gros Poing uses Kirby CMS.

## How to install

```
git clone repo folder
cd folder
git submodule init
git submodule update --recursive --remote
git lfs fetch
git lfs checkout
chgrp -R www-data .
chown -R www-data .
```

## Quickly run

`php -S localhost:8000 kirby/router.php`

## Compile SASS for BGP

Utiliser Parcel

```
yarn install
yarn run watch
yarn run build
```

## Compile SASS for Livid

```
yarn run build-livid
```
