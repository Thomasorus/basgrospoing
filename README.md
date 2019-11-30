# BGP V3

Still a lot to do...


# Compile SASS for BGP 

Utiliser Parcel

- `yarn install`
- `yarn run watch`
- `yarn run build`

# Compile SASS for Livid

`yarn run build-livid`


# Migration du contenu de V2 à V3

Migration V2 to V3, ce qu'il faut clean dans les fichiers du dossier content :

1. Virer tous les `tabs` des fichiers
2. Convetir les `url-key` en slug si existe en anglais, le virer en français
3. Convertir les `Mytranslations` en `isTranslated`, convertir les 1 et 0 en true et false
4. Ajouter le champ Currentlang: en/fr dans les articles ayant une traduction
5. Clean les dates mal formatées 
6. Supprimer les champs `seo` et le champ `keywordmap`


## Regex pour virer les champs SEO

Virer le bloc SEO jusqu'au Guillemet et ajouter seotitle:

```
----\n\n\bSeo:\s\n\s-\n\s\sseo-title:\s"
----\n\nseotitle:
```

Idem avec seo-description :

```
"\n\s\s\bseo-description:\s"
\n----\n\nseodescription:
```

Enlever le conteneur SEO qui était au début :

```
----\n\n\bSeo:\s\n\n
```

Remplacer les " à la fin de la seodescription

```
"\n\n----\n\nKeywordmap:
```

par :

```
\n\n----\n\nKeywordmap: 
```